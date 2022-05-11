<?php

namespace App\Controllers;


class Blog extends BaseController
{


    public function index()
    {

        echo view('layout/header');
        echo view('layout/navigation');
        echo view('layout/masterclass');
        echo view('layout/body');
        echo view('layout/contact');
        echo view('layout/footer');
        echo view('layout/main');
//        echo view('layout/underdeveopment.php');
    }



}
