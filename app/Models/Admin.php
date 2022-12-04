<?php

namespace App\Models;

use System\Core\BaseModel;

class Admin extends BaseModel
{
    protected $table = 'admins';

    public function articles()
    {
        return $this->related(Article::class, 'admin_id', 'child');
    }
}
