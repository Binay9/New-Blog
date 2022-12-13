<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use System\Core\BaseController;

class ArticlesController extends BaseController
{
    public function __construct()
    {
        $this->checkLogin();
    }

    public function index()
    {
        $article = new Article;

        if (user()->type == 'author') {
            $articles = $article->where('admin_id', user()->id)->paginate(5);
        } else {
            $articles = $article->where('status', 'draft', '!=')->paginate(5);
        }

        view('cms/articles/index.php', $articles);
    }

    public function create()
    {
        $this->checkAuthor();

        $category = new Category;
        $categories = $category->select('id, name')->get();

        view('cms/articles/create.php', compact('categories'));
    }

    public function store()
    {
        $this->checkAuthor();

        extract($_POST);

        $article = new Article;

        $article->name = $name;
        $article->description = $description;
        $article->category_id = $category_id;
        $article->admin_id = user()->id;
        $article->status = $status;

        if (!empty($published_at)) {
            $article->published_at = $published_at;
        } else {
            $article->published_at = null;
        }

        $article->created_at = date('Y-m-d H:i:s');
        $article->updated_at = date('Y-m-d H:i:s');

        $article->save();

        set_message("Article saved.");

        redirect(url('articles'));
    }

    public function edit($id)
    {
        view('cms/articles/index.php');
    }

    public function update($id)
    {
        view('cms/articles/index.php');
    }

    public function destroy($id)
    {
        view('cms/articles/index.php');
    }
}
