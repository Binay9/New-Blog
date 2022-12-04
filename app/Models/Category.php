<?php

namespace App\Models;

use System\Core\BaseModel;


class Category extends BaseModel
{
    protected $table = 'categories';

    public function articles()
    {
        return $this->related(Article::class, 'category_id', 'child');
    }
}
