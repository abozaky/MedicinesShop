<?php

use Illuminate\Database\Seeder;

class PharmaciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          for ($i=0; $i <10 ; $i++) { 
    	      	
    	      $pharm = new \App\Pharmacy();

    	      $pharm->PharmacyName = "hello tilte".rand(0,9);
    	      $pharm->City = "hello content".rand(0,9);
    	      $pharm->Address = "hello tilte".rand(0,9);
    	      $pharm->Area = "hello content".rand(0,9);
			  $pharm->DrName = "hello content".rand(0,9);
    	      $pharm->DrMobile = "876".rand(0,9);

			  $pharm->save();     
			  
    	      }
    }
}
