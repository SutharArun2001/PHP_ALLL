<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table-> string('firstname',30);
            $table-> string('lastname',30);
            $table-> string('email',50);
            $table-> bigInteger('phonenumber',false,10);
            $table-> string('gender',30);
            $table-> string('role',20); 
            $table-> string('password',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
