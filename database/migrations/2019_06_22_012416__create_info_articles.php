<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Articles', function (Blueprint $table) {
            $table->increments('article_id');
            $table->string('article_title');
            $table->longText('article_descreption');
            $table->mediumtext('article_image')->nullable();
            $table->tinyInteger('article_status')->default(0);
            $table->Integer('article_like')->default(0);
            $table->integer('Arti_Category_id')->unsigned();  
            $table->foreign('Arti_Category_id')->references('Category_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('article_user_id')->unsigned();  
            $table->foreign('article_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('Articles');
    }
}
