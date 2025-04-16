<?php

namespace App\Http\Controllers;

use App\Models\Mark;  // Pastikan anda mempunyai model Mark
use Illuminate\Http\Request;

class MarksController extends Controller
{
    // Fungsi untuk memaparkan senarai marks
    public function index()
    {
        // Ambil semua data marks dari database
        $marks = Mark::all();  // Jika anda sudah mempunyai model 'Mark', ini akan mengambil semua data marks
        
        // Paparkan view dengan data marks
        return view('marks.index', compact('marks'));
    }
}
