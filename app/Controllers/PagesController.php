<?php

namespace App\Controllers;

use System\Core\BaseController;

class PagesController extends BaseController
{
    public function index()
    {
        view('front/pages/index.php');
    }
}
