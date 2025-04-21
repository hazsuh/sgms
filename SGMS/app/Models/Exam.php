<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    // Tentukan apa yang boleh diisi
    protected $fillable = [
        'exam_name',
        'subject_id',
        'class',   // Tambah class dalam $fillable
        'start_time',
        'end_time',
        'exam_date',
    ];

    // Relasi untuk mengaitkan Exam dengan Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);  // Exam belongs to one Subject
    }

    // Relasi untuk mengaitkan Exam dengan Student (jika diperlukan)
    public function students()
    {
        return $this->belongsToMany(Student::class, 'exam_student'); // Many-to-Many relationship with Student (if exists)
    }
}
