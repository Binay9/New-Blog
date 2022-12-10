<?php

namespace App\Controllers;

use App\Models\Category;
use System\Core\BaseController;

class CategoriesController extends BaseController
{
    public function __construct()
    {
        $this->checkLogin();
    }


    public function index()
    {

        $category = new Category;
        $categories = $category->paginate(5);

        view('cms/categories/index.php', $categories);
    }

    public function create()
    {
        view('cms/categories/create.php');
    }

    public function store()
    {
        extract($_POST);

        $category = new Category;

        $category->name = $name;
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        set_message("Category Added.");

        redirect(url('categories'));
    }

    public function edit($id)
    {

        $category = new Category;
        $category->load($id);

        view('cms/categories/edit.php', compact('category'));
    }

    public function update($id)
    {

        extract($_POST);

        $category = new Category;
        $category->load($id);
        $category->name = $name;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        set_message("Category updated.");

        redirect(url('categories'));
    }

    public function destroy($id)
    {
        $category = new Category;
        $category->load($id);
        $category->delete();

        set_message("Category deleted.", 'warning');

        redirect(url('categories'));
    }
}
