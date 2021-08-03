<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->unsignedBigInteger('fk_order_state')->default(1);
            $table->unsignedBigInteger('fk_service');
            $table->unsignedBigInteger('fk_user');
            $table->unsignedBigInteger('fk_houser');
            $table->text('user_message');
            $table->text('houser_message')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->foreign('fk_order_state')->references('id_order_state')->on('orders_states');
            $table->foreign('fk_service')->references('id_service')->on('services');
            $table->foreign('fk_user')->references('id_user')->on('user');
            $table->foreign('fk_houser')->references('id_user')->on('user');
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
