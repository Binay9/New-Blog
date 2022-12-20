<?php

namespace App\Controllers;

use App\Models\Comment;
use System\Core\BaseController;


class CommentsController extends BaseController
{

    public function __construct()
    {
        $this->checkLogin();
        $this->checkAdmin();
    }

    public function index()
    {
        $comment = new Comment;
        $comments = $comment->orderBy('created_at', 'DESC')->paginate(8);

        view('cms/comments/index.php', $comments);
    }

    public function destroy($id)
    {
        $comment = new Comment;
        $comment->load($id);

        $comment->delete();

        set_message('Comment Deleted.');

        redirect(url('comments'));
    }
}
