<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $fetch_procedure = "DROP PROCEDURE IF EXISTS `get_student_by_id`;
            CREATE PROCEDURE `get_student_by_id` (IN idx int)
            BEGIN
            select * from fruits where id = idx;
            END;";

        DB::unprepared($fetch_procedure);


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