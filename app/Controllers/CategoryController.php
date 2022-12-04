<?php

namespace App\Controllers;

use App\Models\Category;
use System\Core\BaseController;

class CategoryController extends BaseController
{
    public function index()
    {
        $category = new Category;
        $categories = $category->get();

        $hello = "World";

        view('categories.php', compact('categories', 'hello'));
    }

    public function edit($id)
    {
        echo $id;
    }
}
