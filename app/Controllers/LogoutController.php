<?php

namespace App\Controllers;

use System\Core\BaseController;

class LogoutController extends BaseController
{

    public function index()
    {
        unset($_SESSION['user']);

        $_SESSION['message'] = [
            'content' => 'Logged out successfully.',
            'type' => 'warning'
        ];

        redirect(url('login'));
    }
}
