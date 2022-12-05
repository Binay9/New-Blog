<?php

namespace App\Controllers;

use System\Core\BaseController;

class LogoutController extends BaseController
{

    public function index()
    {
        unset($_SESSION['user']);

        set_message('Logged out successfully.', 'warning');

        redirect(url('login'));
    }
}
