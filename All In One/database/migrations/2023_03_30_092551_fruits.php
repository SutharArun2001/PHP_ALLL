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
        Schema::create('fruits', function (Blueprint $table) {
            $table-> id();
            $table-> string('genus',30);
            $table-> string('name',30);
            $table-> string('family',50);
            $table-> bigInteger('fruit_id',false,20);
            $table-> string('order',20);
            $table-> float('protein',10);
            $table-> float('carbohydrates',10);     
            $table-> float('fat',10);
            $table-> float('calories',10);
            $table-> float('sugar',10);
            $table-> integer('favourite_flag')->default(0);
            $table->unique('fruit_id');
            $table->index(['fruit_id','id']);  
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
