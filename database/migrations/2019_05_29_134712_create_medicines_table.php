<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Medicine_Name',50);
            $table->string('description');
            $table->smallInteger('Quantity');
            $table->smallInteger('price');
            $table->mediumtext('image')->nullable();
            $table->integer('Medi_Category_id')->unsigned();  
            $table->foreign('Medi_Category_id')->references('Category_id')->on('categories')->onDelete('cascade')->onUpdate('cascade'); 
            $table->integer('Pharmacy_id')->unsigned();  
            $table->foreign('Pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade')->onUpdate('cascade'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
