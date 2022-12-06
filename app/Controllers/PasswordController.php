<?php

namespace App\Controllers;

use App\Models\Admin;
use System\Core\BaseController;

class PasswordController extends BaseController
{

    public function __construct()
    {
        $this->checkLogin();
    }

    public function index()
    {
        redirect(url('password/edit'));
    }

    public function edit()
    {
        view('cms/password/edit.php');
    }

    public function update()
    {
        extract($_POST);

        $old_password = sha1($old_password);
        $password = sha1($password);

        $admin = new Admin;

        $user = $admin->where('id', user()->id)->where('password', $old_password)->first();


        if ($user) {
            $user->password = $password;
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();

            set_message('Password updated');
        } else {
            set_message('Old password not matched', 'danger');
        }

        redirect(url('password/edit'));
    }
}
