<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMarksTable extends Migration
{
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            // Pastikan kolum tidak wujud sebelum menambahnya
            if (!Schema::hasColumn('marks', 'marks')) {
                $table->integer('marks');
            }

            if (!Schema::hasColumn('marks', 'grade')) {
                $table->string('grade');
            }

            if (!Schema::hasColumn('marks', 'is_pass')) {
                $table->boolean('is_pass');
            }
        });
    }

    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropColumn(['marks', 'grade', 'is_pass']);
        });
    }
}
