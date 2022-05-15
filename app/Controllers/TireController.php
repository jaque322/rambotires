<?php

namespace App\Controllers;

use App\Models\Tire;
use CodeIgniter\Controller;

class TireController extends BaseController
{


    public function index()
    {


        echo view('admin/tire');


    }



}