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
        view('cms/admins/index.php');
    }

    public function edit($id)
    {
        view('cms/admins/index.php');
    }

    public function update($id)
    {
        view('cms/admins/index.php');
    }

    public function destroy($id)
    {
        view('cms/admins/index.php');
    }
}
