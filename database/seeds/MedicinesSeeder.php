<?php

use Illuminate\Database\Seeder;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <10 ; $i++) { 
    	      	
    	      $medicine = new \App\Medicines();

    	      $medicine->name = "hello name".rand(0,9);
    	      $medicine->description = "Desc".rand(0,9);
    	      $medicine->Quantity = rand(0,9);
    	      $medicine->price = rand(0,9);
			
			  $medicine->save();     
			  
    	      }
    }
}
