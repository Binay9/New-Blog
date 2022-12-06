<?php

namespace App\Controllers;

use App\Models\Admin;
use System\Core\BaseController;

class AdminsController extends BaseController
{

    public function __construct()
    {
        $this->checkLogin();
        $this->checkAdmin();
    }

    public function index()
    {
        $admin = new Admin;
        $admins = $admin->where('type', 'author')->get();
        view('cms/admins/index.php', compact('admins'));
    }

    public function create()
    {
        view('cms/admins/create.php');
    }

    public function store()
    {
        extract($_POST);

        $password = sha1($password);

        $admin = new Admin;

        $admin->name = $name;
        $admin->email = $email;
        $admin->password = $password;
        $admin->phone = $phone;
        $admin->address = $address;
        $admin->type = 'author';
        $admin->created_at = date('Y-m-d H:i:s');
        $admin->updated_at = date('Y-m-d H:i:s');
        $admin->save();

        set_message('Admin added.');

        redirect(url('admins'));
    }

    public function edit($id)
    {
        $admin = new Admin;
        $admin->load($id);

        view('cms/admins/edit.php', compact('admin'));
    }

    public function update($id)
    {
        $admin = new Admin;
        $admin->load($id);

        extract($_POST);

        $admin->name = $name;
        $admin->phone = $phone;
        $admin->address = $address;
        $admin->updated_at = date('Y-m-d H:i:s');
        $admin->save();

        set_message('Admin updated.');

        redirect(url('admins'));
    }

    public function destroy($id)
    {
        $admin = new Admin;
        $admin->load($id);
        $admin->delete();

        set_message('Admin removed.', 'warning');

        redirect(url('admins'));
    }
}
