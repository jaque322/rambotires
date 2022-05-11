<?php

namespace App\Controllers;

use App\Models\Tire;
use CodeIgniter\Controller;

class TireController extends BaseController
{


    public function index()
    {

        echo view('layout/header');
        echo view('layout/navigation');
        echo view('admin/tire/tire');
//        echo view('layout/masterclass');
//        echo view('layout/body');
//        echo view('layout/contact');

        echo view('layout/footer');
        echo view('layout/main');

    }



}