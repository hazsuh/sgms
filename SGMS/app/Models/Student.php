<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Add no_matric to the fillable list
    protected $fillable = ['name', 'class', 'gender', 'no_matric'];  // Ensure no_matric is included here

    // Relationship with marks (One-to-Many)
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    // Relationship with subjects (Many-to-Many)
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');  // Many-to-Many relationship using 'student_subject' as the pivot table
    }

    // Relationship with attendance (One-to-Many)
    public function attendance()
    {
        return $this->hasMany(Attendance::class);  // One-to-Many relationship
    }
}
