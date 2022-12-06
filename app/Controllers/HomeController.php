<?php

namespace App\Controllers;

use System\Core\BaseController;

class HomeController extends BaseController
{

    public function __construct()
    {
        $this->checkLogin();
    }

    public function index()
    {
        view('cms/home/index.php');
    }
}
