<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->longText('comment_descreption');
            $table->integer('comment_article_id')->unsigned();  
            $table->foreign('comment_article_id')->references('article_id')->on('Articles')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('comment_user_id')->unsigned();  
            $table->foreign('comment_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('Comments');

    }
}
