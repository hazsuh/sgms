<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Tambah no_matric dalam senarai fillable
    protected $fillable = ['name', 'class', 'gender', 'no_matric'];  // Pastikan no_matric ada di sini
}
