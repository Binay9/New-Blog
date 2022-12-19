<?php

namespace App\Controllers;

use App\Models\Article;
use System\Core\BaseController;

class SearchController extends BaseController
{
    public function index()
    {
        $article = new Article;
        $articles = $article->where('name', '%' . $_GET['q'] . '%', 'LIKE')
            ->where('status', 'published')
            ->where('published_at', date('Y-m-d H:i:s'), '<=')
            ->select('id, name, image')
            ->orderBy('published_at', 'DESC')
            ->paginate(8);

        view('front/search/index.php', $articles);
    }
}
