<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->unsignedTinyInteger('fk_level')->default(2);
            $table->string('password', 100);
            $table->string('email', 150);
            $table->string('name', 80);
            $table->string('lastname', 80);
            $table->string('telephone', 20);
            $table->string('address', 255)->nullable();
            $table->string('quote', 200)->nullable();
            $table->date('birthday')->nullable();
            $table->string('portrait', 255)->nullable();
            $table->string('avatar', 255)->nullable()->default("avatar.png");
            $table->string('alt', 255)->nullable();
            $table->unsignedBigInteger('fk_service')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('fk_level')->references('id_level')->on('levels');
            $table->foreign('fk_service')->references('id_service')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
