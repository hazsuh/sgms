<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSubjectTable extends Migration
{
    /**
     * Run the migrations to create the 'student_subject' table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subject', function (Blueprint $table) {
            $table->id(); // ID for the pivot table
            $table->foreignId('student_id')  // Column for student_id
                  ->constrained('students')   // Linking to the 'students' table
                  ->onDelete('cascade');    // If a student is deleted, all their records in this pivot table will also be deleted
            $table->foreignId('subject_id')  // Column for subject_id
                  ->constrained('subjects')   // Linking to the 'subjects' table
                  ->onDelete('cascade');    // If a subject is deleted, all records in this pivot table will also be deleted
            $table->timestamps();           // Timestamps for record creation and updates
        });
    }

    /**
     * Reverse the migration to drop the 'student_subject' table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_subject'); // Dropping the pivot table
    }
}
