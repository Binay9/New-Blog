<?php

namespace App\Controllers;

use System\Core\BaseController;

class HomeController extends BaseController
{

    public function index()
    {
        view('cms/home/index.php');
    }
}
