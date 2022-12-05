<?php

namespace App\Controllers;

use System\Core\BaseController;

class HomeController extends BaseController
{

    public function __construct()
    {
        if (!logged_in()) {
            redirect(url('login'));
        }
    }

    public function index()
    {
        view('cms/home/index.php');
    }
}
