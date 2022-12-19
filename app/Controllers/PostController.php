<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use System\Core\BaseController;

class PostController extends BaseController
{

    public function index()
    {
        redirect(config('site_url'));
    }

    public function show($id)
    {
        $article = new Article;
        $article->load($id);

        $comments = $article->comments()->get();

        view('front/post/show.php', compact('article', 'comments'));
    }

    public function comment($id)
    {
        $article = new Article;
        $article->load($id);

        extract($_POST);

        $comment = new Comment;

        $comment->name = $name;
        $comment->email = $email;
        $comment->comment = $cmt;
        $comment->article_id = $article->id;
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->save();

        set_message("Comment posted successfully.");

        redirect(url('post/show/' . $article->id));
    }
}
