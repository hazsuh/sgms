<?php

namespace App\Http\Controllers;

use App\Models\Subject;  // Import model Subject
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    // Fungsi untuk memaparkan senarai Subjects
    public function index()
    {
        // Ambil semua data subjects dari database
        $subjects = Subject::all();

        // Paparkan view dengan data subjects
        return view('subjects.index', compact('subjects'));
    }
}
