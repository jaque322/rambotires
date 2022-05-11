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
                $data = array('res' => "error", 'message' => validation_errors());
            } else {
//                $config['upload_path'] = APPPATH . '../assets/uploads/';
//                $config['allowed_types'] = 'gif|jpg|png';
//                $config['max_size'] = '1000';
                // $config['max_width'] = '1024';
                // $config['max_height'] = '768';
//                $this->load->library('upload', $config);
                // Upload.php line - 1097 public function display_errors($open = '<p>', $close = '</p>')

//                if (!$this->upload->do_upload("img")) {
                $img = $this->request->getFile('img');
                if ($img->hasMoved()) {
                    $data = array('res' => "error", 'message' => $this->upload->display_errors());
                } else {
                    $randomName = $img->getRandomName();

                    if ($img->move('uploads', $randomName)) {
                        $data = array('res' => "error", 'message' => "Failed to add data");

                    }

//                    $ajax_data = $this->input->post();
//                    $ajax_data['img'] = $this->upload->data('file_name');
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

            $path ='uploads/'. "/" . $filename;
            if (unlink($path)) {
                $builder->delete(['id' => $del_id]);
                $data = array('res' => "success", 'message' => "Data delete successfully");
            } else {
                $data = array('res' => "error", 'message' => "Delete query errors");
            }
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
        if ($this->input->is_ajax_request()) {

            $edit_id = $this->input->get('edit_id');

            if ($post = $this->crud_model->single_entry($edit_id)) {
                $data = array('res' => "success", 'post' => $post);
            } else {
                $data = array('res' => "error", 'message' => "Failed to fetch data");
            }

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
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('mob', 'Mobile No.', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array('res' => "error", 'message' => validation_errors());
            } else {
                if (isset($_FILES["edit_img"]["name"])) {
                    $config['upload_path'] = APPPATH . '../assets/uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '1000';
                    // $config['max_width'] = '1024';
                    // $config['max_height'] = '768';
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload("edit_img")) {
                        $data = array('res' => "error", 'message' => $this->upload->display_errors());
                    } else {
                        $edit_id = $this->input->post('edit_id');
                        if ($post = $this->crud_model->single_entry($edit_id)) {
                            unlink(APPPATH . '../assets/uploads/' . $post->img);
                            $ajax_data['img'] = $this->upload->data('file_name');
                        }
                    }
                }
                $id = $this->input->post('edit_id');
                $ajax_data['name'] = $this->input->post('name');
                $ajax_data['email'] = $this->input->post('email');
                $ajax_data['mob'] = $this->input->post('mob');
                if ($this->crud_model->update_entry($id, $ajax_data)) {
                    $data = array('res' => "success", 'message' => "Data update successfully");
                } else {
                    $data = array('res' => "error", 'message' => "Failed to update data");
                }
            }
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }
}