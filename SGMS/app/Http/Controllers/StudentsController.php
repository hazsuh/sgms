<?php

namespace App\Http\Controllers;

use App\Models\Student;  // Import model Student
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    // Fungsi untuk memaparkan senarai pelajar
    public function index()
    {
        // Ambil semua data pelajar dari database
        $students = Student::all();
        
        // Paparkan view dengan data pelajar
        return view('students.index', compact('students'));
    }

    // Fungsi untuk memaparkan borang Add Student
    public function create()
    {
        return view('students.create');
    }

    // Fungsi untuk menyimpan maklumat pelajar
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'no_matric' => 'required|string|max:20',  // Pastikan ada validasi untuk no_matric
        ]);

        // Simpan data pelajar ke dalam database
        Student::create([
            'name' => $request->name,
            'class' => $request->class,
            'gender' => $request->gender,
            'no_matric' => $request->no_matric,  // Pastikan no_matric juga disimpan
        ]);

        // Redirect ke halaman Students dengan mesej kejayaan
        return redirect()->route('students')->with('success', 'Student added successfully!');
    }

    // Fungsi untuk memaparkan borang Update Student
    public function edit($id)
    {
        // Cari pelajar berdasarkan ID
        $student = Student::find($id);

        // Jika pelajar tidak dijumpai
        if (!$student) {
            return redirect()->route('students')->with('error', 'Student not found!');
        }

        // Paparkan view untuk mengemaskini pelajar
        return view('students.edit', compact('student'));
    }

    // Fungsi untuk kemaskini maklumat pelajar
    public function update(Request $request, $id)
    {
        // Cari pelajar berdasarkan ID
        $student = Student::find($id);

        // Jika pelajar tidak dijumpai
        if (!$student) {
            return redirect()->route('students')->with('error', 'Student not found!');
        }

        // Validasi dan kemaskini data pelajar
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'no_matric' => 'required|string|max:20',  // Pastikan validasi no matric ada
        ]);

        // Kemaskini data pelajar
        $student->update([
            'name' => $request->name,
            'class' => $request->class,
            'gender' => $request->gender,
            'no_matric' => $request->no_matric,  // Pastikan ini ada untuk kemaskini no matric
        ]);

        // Redirect ke halaman Students dengan mesej kejayaan
        return redirect()->route('students')->with('success', 'Student updated successfully!');
    }

    // Fungsi untuk memadamkan pelajar
    public function destroy($id)
    {
        // Cari pelajar berdasarkan ID
        $student = Student::find($id);

        // Jika pelajar tidak dijumpai
        if (!$student) {
            return redirect()->route('students')->with('error', 'Pelajar tidak dijumpai!');
        }

        // Padamkan pelajar
        $student->delete();

        // Redirect kembali ke senarai pelajar dengan mesej kejayaan
        return redirect()->route('students')->with('success', 'Pelajar berjaya dipadamkan!');
    }
}
