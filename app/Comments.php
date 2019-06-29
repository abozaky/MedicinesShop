<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $primaryKey = 'comment_id';

    public function user()
    {
        return $this->hasOne('App\User','id','comment_user_id');
    }

    public function Article()
    {
        return $this->hasOne('App\Articles','article_id','comment_article_id');
    }
}
