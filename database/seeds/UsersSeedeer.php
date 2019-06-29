<?php

use Illuminate\Database\Seeder;

class UsersSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          for ($i=0; $i <10 ; $i++) { 
    	      	
    	      $pharm = new \App\User();

    	      $pharm->name = "hello tilte".rand(0,9);
    	      $pharm->email = "he@gmail.com".rand(0,9);
    	      $pharm->password = "hello tilte".rand(0,9);
    	      $pharm->RegStatus = "0";
			  $pharm->role = "0";
    	     
			  $pharm->save();     
			  
    	      }
    }
}
