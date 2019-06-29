<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
	    protected $primaryKey = 'article_id';

     public function user()
    {
        return $this->hasOne('App\User','id','article_user_id');
    }

      public function Category()
    {
        return $this->hasOne('App\Categories','Category_id','Arti_Category_id');
    }
}
