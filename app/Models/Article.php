<?php

namespace App\Models;

use System\Core\BaseModel;

class Article extends BaseModel
{
    protected $table = 'articles';

    public function admin()
    {
        return $this->related(Admin::class, 'admin_id', 'self');
    }

    public function category()
    {
        return $this->related(Category::class, 'category_id', 'self');
    }

    public function comments()
    {
        return $this->related(Comment::class, 'article_id', 'child');
    }
}
