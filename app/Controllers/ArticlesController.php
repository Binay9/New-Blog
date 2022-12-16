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

        if (!empty($category_id) && isset($category_id)) {
            $article->category_id = $category_id;
        } else {
            set_message('Please select a category', 'warning');
            redirect(url('articles/create'));
        }
        $article->name = $name;
        $article->description = $description;
        $article->admin_id = user()->id;
        !empty($status) && isset($status) ? $article->status = $status : 'draft';
        !empty($published_at) && isset($published_at) ? $article->published_at = $published_at : null;

        $article->created_at = date('Y-m-d H:i:s');
        $article->updated_at = date('Y-m-d H:i:s');

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $file = $_FILES['image'];

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = "img_" . date('miYHds') . '_' . rand(1000, 9999) . '.' . $ext;

            move_uploaded_file($file['tmp_name'], BASEDIR . '/assets/images/' . $filename);
            $article->image = $filename;
        } else {
            $article->image = null;
        }


        $article->save();

        set_message("Article saved.");

        redirect(url('articles'));
    }

    public function edit($id)
    {
        $article = new Article;
        $article->load($id);

        $this->checkAccess($article);

        $category = new Category;
        $categories = $category->select('id, name')->get();


        view('cms/articles/edit.php', compact('article', 'categories'));
    }

    public function update($id)
    {
        $article = new Article;
        $article->load($id);

        $this->checkAccess($article);

        extract($_POST);

        if (!empty($category_id) && isset($category_id)) {
            $article->category_id = $category_id;
        } else {
            set_message('Please select a category', 'warning');
            redirect(url('articles/create'));
        }
        $article->name = $name;
        $article->description = $description;
        !empty($status) && isset($status) ? $article->status = $status : 'draft';
        $article->updated_at = date('Y-m-d H:i:s');

        if (!empty($published_at) && isset($published_at)) {
            $article->published_at = $published_at;
        } else {
            if ($status == 'published') {
                $article->published_at = date('Y-m-d H:i:s');
            } else {
                $article->published_at = null;
            }
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $file = $_FILES['image'];

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = "img_" . date('miYHds') . '_' . rand(1000, 9999) . '.' . $ext;

            move_uploaded_file($file['tmp_name'], BASEDIR . '/assets/images/' . $filename);

            if (!empty($article->image)) {
                @unlink(BASEDIR . '/assets/images/' . $article->image);
            }

            $article->image = $filename;
        }

        $article->save();

        set_message("Article updated.");

        redirect(url('articles'));
    }

    public function destroy($id)
    {
        $article = new Article;
        $article->load($id);

        $this->checkAccess($article);

        if (!empty($article->image)) {
            @unlink(BASEDIR . '/assets/images/' . $article->image);
        }

        $article->delete();

        set_message('Article removed.');

        redirect(url('articles'));
    }


    private function checkAccess($article)
    {
        if (user()->id != $article->admin_id && user()->type != 'admin') {
            set_message('Access Denied.', 'danger');

            redirect(url('articles'));
        }
    }
}
