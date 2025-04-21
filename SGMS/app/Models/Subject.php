<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Pastikan 'class' ditambah dalam $fillable untuk membolehkan pengisian data secara massal
    protected $fillable = ['code', 'name', 'credit', 'class'];  // Tambah 'class' di sini

    // Relationship with students (many-to-many)
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject');  // Many-to-Many relationship using 'student_subject' as the pivot table
    }
}
