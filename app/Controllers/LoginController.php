<?php

namespace App\Controllers;

use App\Models\Admin;
use System\Core\BaseController;

class LoginController extends BaseController
{
    public function __construct()
    {

        if (logged_in()) {
            redirect(url('home'));
        }
    }

    public function index()
    {
        return view('cms/login/index.php');
    }

    public function check()
    {
        extract($_POST);

        $password = sha1($password);

        $admin = new Admin;
        $user = $admin->where('email', $email)->where('password', $password)->first();

        if ($user) {
            $_SESSION['user'] = $user->id;
            redirect(url('home'));
        } else {
            $_SESSION['message'] = [
                'content' => 'Incorrect Email or Password',
                'type' => 'danger'
            ];
            redirect(url('login'));
        }
    }

    // public function out()
    // {
    //     unset($_SESSION['message']);
    //     redirect(url('login'));
    // }
}
