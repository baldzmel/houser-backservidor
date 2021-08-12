<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->bigIncrements('id_rating');
            $table->unsignedBigInteger('fk_order');
            $table->unsignedBigInteger('fk_user');
            $table->decimal('rating', 3);
            $table->timestamps();

            $table->foreign('fk_order')->references('id_order')->on('orders');
            $table->foreign('fk_user')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
}
