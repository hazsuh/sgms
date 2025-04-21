<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();  // Pastikan 'code' adalah UNIQUE
            $table->string('name');
            $table->integer('credit');
            $table->timestamps();
        });
    }    
    
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('code');
        });
    }    
};
