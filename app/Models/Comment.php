<?php

namespace App\Models;

use System\Core\BaseModel;

class Comment extends BaseModel
{
    protected $table = 'comments';

    public function article()
    {
        return $this->related(Article::class, 'article_id', 'self');
    }
}
