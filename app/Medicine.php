<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name','description','Quantity','price'];


       public function Pharmacy()
    {
        return $this->hasOne('App\Pharmacy','id','Pharmacy_id');
    }


}
