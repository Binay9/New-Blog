<?php

namespace App\Controllers;

use App\Models\Category;
use System\Core\BaseController;

class CategoryController extends BaseController
{

    public function index()
    {
        // redirect(url(''))
    }

    public function show($id)
    {
        $category = new Category;
        $category->load($id);

        $articles = $category->articles()->where('status', 'published')
            ->where('published_at', date('Y-m-d H:i:s'), '<=')
            ->select('id, name, image')
            ->orderBy('published_at', 'DESC')
            ->paginate(8);

        view('front/category/show.php', array_merge($articles, compact('category')));
    }
}
