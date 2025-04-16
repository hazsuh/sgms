<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    // Nyatakan table jika nama table tidak mengikut konvensyen Laravel
    protected $table = 'marks';

    // Tentukan fields yang boleh diisi
    protected $fillable = ['student_id', 'subject_id', 'marks_obtained'];

    // Jika anda menggunakan timestamps (created_at dan updated_at)
    public $timestamps = true;
}
