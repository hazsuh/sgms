<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Tambahkan student_id, status, dan date ke dalam array fillable
    protected $fillable = [
        'student_id',
        'status',
        'date',
    ];
}
