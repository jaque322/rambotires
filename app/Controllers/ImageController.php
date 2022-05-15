<?php

namespace App\Controllers;


use CodeIgniter\Controller;

class ImageController extends \CodeIgniter\Controller
{

    public function __construct()
    {
        $config['csrf_exclude_uris'] = array('admin/delete');
//        $this->load->helper(array('form', 'url'));
//        $this->load->library(array('session', 'form_validation'));
//        $this->load->model('crud_model');
        $crud_model = new \App\Models\Tire();

    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    /* -------------------------------------------------------------------------- */
    /*                               Insert Records                               */
    /* -------------------------------------------------------------------------- */

    public function insert()
    {
        $db = db_connect();
        $builder = $db->table('tire');
        if ($this->request->isAJAX()) {
            helper(['form', 'url']);
            $validation = \Config\Services::validation();
            $validation->setRule('brand', 'brand', 'required');
            $validation->setRule('category', 'category', 'required');
            $validation->setRule('sign', 'Sign.', 'required');
            $validation->setRule('img', 'Tire Picture', 'required');

            if ($validation->run()) {
                $data = array('res' => "error", 'message' => validation_errors(),"token"=>csrf_hash());
            } else {
//
                $img = $this->request->getFile('img');
                if ($img->hasMoved()) {
                    $data = array('res' => "error", 'message' => $this->upload->display_errors(),'token'=>csrf_hash());
                } else {
                    $randomName = $img->getRandomName();

                    if ($img->move('uploads', $randomName)) {
                        $data = array('res' => "error", 'message' => "Failed to add data",'token'=>csrf_hash());

                    }

                    $data = ['brand' => $this->request->getVar('brand'),
                        'dimensions' => $this->request->getVar('dimensions'),
                        'description' => $this->request->getVar('description'), '
                        category' => $this->request->getVar('category'),
                        'created_at' => '05/25/1988', 'image' => $randomName,
                        'sign' => $this->request->getVar('sign')
                    ];

                    if ($builder->insert($data)) {
                        $data = array('res' => "success", 'message' => "Data added successfully");
                    } else {
                        $data = array('res' => "error", 'message' => "Failed to add data");
                    };

//                    if ($this->crud_model->insert_entry($ajax_data)) {
//                        $data = array('res' => "success", 'message' => "Data added successfully");
//                    } else {
//                        $data = array('res' => "error", 'message' => "Failed to add data");
//                    }
                }
            }
            $data['token'] = csrf_hash();
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                                Fetch Records                               */
    /* -------------------------------------------------------------------------- */

    public function fetch()
    {
        $crud_model = new \App\Models\Tire();
        $posts = $crud_model->findAll();
        echo json_encode($posts);
    }

    /* -------------------------------------------------------------------------- */
    /*                               Delete Records                               */
    /* -------------------------------------------------------------------------- */

    public function delete()
    {
        $db = db_connect();
        $builder = $db->table('tire');
        if ($this->request->isAJAX()) {
            helper(['form', 'url']);

            $del_id = $this->request->getVar('del_id');
            $query = $builder->getWhere(['id' => $del_id]);
            $filename = "";
            foreach ($query->getResult('array') as $row) {
                $filename = $row['image'];
            }

            $path = 'uploads/' . "/" . $filename;
            if (unlink($path)) {
                $builder->delete(['id' => $del_id]);
                $data = array('res' => "success", 'message' => "Data delete successfully");
            } else {
                $data = array('res' => "error", 'message' => "Delete query errors");
            }
            $data['token'] = csrf_hash();
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                                Edit Records                                */
    /* -------------------------------------------------------------------------- */

    public function edit()
    {
        $db = db_connect();
        $builder = $db->table('tire');

        if ($this->request->isAJAX()) {

            $edit_id = $this->request->getVar('edit_id');

            if ($post = $builder->getWhere(['id' => $edit_id])) {
                $data = array('res' => "success", 'post' => $post->getResult());
            } else {
                $data = array('res' => "error", 'message' => "Failed to fetch data");
            }
            $data['token'] = csrf_hash();
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                               Update Records                               */
    /* -------------------------------------------------------------------------- */

    public function update()
    {
        $db = db_connect();
        $builder = $db->table('tire');
        $img = $this->request->getFile('edit_img');

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $validation->setRule('brand', 'Brand', 'required');
            $validation->setRule('dimensions', 'Dimensions', 'required');
            $validation->setRule('description', 'description', 'required');

            if ($validation->run()) {

            } else {

        if ($img!=null) {
//                    validating file

                    $validationRule = [
                        'userfile' => [
                            'label' => 'Image File',
                            'rules' => 'uploaded[userfile]'
                                . '|is_image[userfile]'
                                . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                                . '|max_size[userfile,100]'
                                . '|max_dims[userfile,1024,768]',
                        ],
                    ];
                    if ($this->validate($validationRule)) {
                        $data = ['errors' => $this->validator->getErrors(), 'token' => csrf_hash()];

                    } else {
                        $edit_id = $this->request->getVar('edit_id');
                        if ($post = $builder->getWhere(['id' => $edit_id])) {
                            foreach ($post->getResult('array') as $row) {
                                $filename = $row['image'];
                            }
                            $path = 'uploads/'."/".$filename;
                            unlink($path);
                            $randomName = $img->getRandomName();
                            $img->move('uploads', $randomName);

                            $ajax_data['image'] = $randomName;

                        }
                    }

                }
                $ajax_data['id'] = $this->request->getVar('edit_id');
                $ajax_data['brand'] = $this->request->getVar('brand');
                $ajax_data['dimensions'] = $this->request->getVar('dimensions');
                $ajax_data['description'] = $this->request->getVar('description');
                if ($builder->replace($ajax_data)) {
                    $data = array('res' => "success", 'message' => "Data update successfully", "token" => csrf_hash());
                } else {
                    $data = array('res' => "error", 'message' => "Failed to update data", "token" => csrf_hash());
                }
            }
            $data['token'] = csrf_hash();
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function updateToken()
    {
        if ($this->request->isAJAX()) {
            $data = array("token" => csrf_hash());
            echo json_encode($data);
        }
    }
}