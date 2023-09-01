<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('email', 50);
            $table->bigInteger('phonenumber', false, 10);
            $table->string('gender', 30);
            $table->string('role', 20);
            $table->string('password', 100);
            $table->string('user_photo', 100);
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
        Schema::dropIfExists('student');
    }
};