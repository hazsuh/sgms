<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResetExamAutoIncrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Reset auto_increment ke 1
        DB::statement('ALTER TABLE exams AUTO_INCREMENT = 1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Tiada perubahan perlu jika rollback, kerana auto_increment akan dikendalikan secara automatik oleh MySQL
    }
}
