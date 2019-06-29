<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = ['PharmacyName','City','Address','Area','DrName','DrMobile'];

    //   public function Users()
    // {
    //     return $this->belongsTo('App\User');
    // }

     public function Users()
    {
        return $this->hasOne('App\User','id','user_id');
    }

       public function medicine()
    {
        return $this->belongsTo('App\Medicine','id','Pharmacy_id');
    }
   
}

  