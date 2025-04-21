<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    // Senarai atribut yang boleh diisi
    protected $fillable = ['student_id', 'marks', 'grade', 'is_pass'];

    // Hubungan dengan pelajar
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
