<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersBookNow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_name');
            $table->string('order_username');
            $table->Integer('mobile_user');
            $table->smallInteger('total');
            $table->smallInteger('Quantity');
            $table->tinyInteger('order_status')->default(0);
            $table->dateTime('order_expired_deliver');
            $table->integer('Medicine_id')->unsigned();  
            $table->foreign('Medicine_id')->references('id')->on('medicines')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('orders');
    }
}
