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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Foreign key untuk student_id
            $table->string('status'); // Menyimpan status kehadiran: present/absent
            $table->date('date'); // Tarikh kehadiran
            $table->timestamps(); // Timestamp untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances'); // Memadam jadual attendance jika rollback
    }
};
