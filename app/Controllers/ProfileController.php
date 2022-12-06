<?php

namespace App\Controllers;

use System\Core\BaseController;

class ProfileController extends BaseController
{

    public function __construct()
    {
        $this->checkLogin();
    }

    public function index()
    {
        redirect(url('profile/edit'));
    }

    public function edit()
    {
        $user = user();

        view('cms/profile/edit.php', compact('user'));
    }

    public function update()
    {
        extract($_POST);

        $user = user();

        $user->name = $name;
        $user->phone = $phone;
        $user->address = $address;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        set_message('Profile updated');
        redirect(url('profile/edit'));
    }
}
