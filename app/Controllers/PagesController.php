<?php

namespace App\Controllers;

use App\Models\Article;
use System\Core\BaseController;

class PagesController extends BaseController
{
    public function index()
    {
        $article = new Article;

        $topArticle = $article->where('status', 'published')
            ->where('published_at', date('Y-m-d H:i:s'), '<=')
            ->limit(1)
            ->orderBy('published_at', 'DESC')
            ->first();

        $articles = $article->where('status', 'published')
            ->where('published_at', date('Y-m-d H:i:s'), '<=')
            ->select('id, name, image')
            ->limit(8)
            ->offset(1)
            ->orderBy('published_at', 'DESC')
            ->get();


        view('front/pages/index.php', compact('topArticle', 'articles'));
    }
}
