<?php

namespace App\Http\Controllers;

use App\Models\Mark;    // Pastikan Mark model diimport
use App\Models\Student; // Jika anda perlu ambil data pelajar
use Illuminate\Http\Request;

class MarksController extends Controller
{
    // Method untuk memaparkan senarai markah pelajar
    public function index()
    {
        // Dapatkan semua markah dan pelajar (jika perlu)
        $marks = Mark::with('student')->get();

        // Paparkan view dengan data markah
        return view('marks.index', compact('marks'));
    }

    // Method untuk memaparkan borang menambah markah
    public function create()
    {
        $students = Student::all();  // Ambil data pelajar
        return view('marks.create', compact('students'));
    }

    // Method untuk menyimpan markah
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'marks' => 'required|numeric|min:0|max:100',
            'is_pass' => 'required|boolean',
        ]);

        // Tentukan gred berdasarkan markah
        $marks = $request->marks;
        if ($marks >= 90 && $marks <= 100) {
            $grade = 'A+';
        } elseif ($marks >= 80 && $marks <= 89) {
            $grade = 'A';
        } elseif ($marks >= 70 && $marks <= 79) {
            $grade = 'A-';
        } elseif ($marks >= 65 && $marks <= 69) {
            $grade = 'B+';
        } elseif ($marks >= 60 && $marks <= 64) {
            $grade = 'B';
        } elseif ($marks >= 55 && $marks <= 59) {
            $grade = 'C+';
        } elseif ($marks >= 50 && $marks <= 54) {
            $grade = 'C';
        } elseif ($marks >= 45 && $marks <= 49) {
            $grade = 'D';
        } elseif ($marks >= 40 && $marks <= 44) {
            $grade = 'E';
        } elseif ($marks >= 0 && $marks <= 39) {
            $grade = 'G';
        } else {
            $grade = 'TH';
        }

        // Simpan markah ke dalam pangkalan data
        Mark::create([
            'student_id' => $request->student_id,
            'marks' => $marks,
            'grade' => $grade,
            'is_pass' => $grade !== 'G' && $grade !== 'TH', // Status lulus jika bukan 'G' atau 'TH'
        ]);

        // Redirect kembali ke halaman markah
        return redirect()->route('marks')->with('success', 'Markah Successfully Added!');
    }

    // Method untuk memaparkan borang mengedit markah
    public function edit($id)
    {
        // Cari data markah berdasarkan ID
        $mark = Mark::findOrFail($id);

        // Paparkan borang edit dengan data markah
        return view('marks.edit', compact('mark'));
    }

    // Method untuk mengemas kini markah
    public function update(Request $request, $id)
    {
        // Validasi data yang dimasukkan
        $request->validate([
            'marks' => 'required|integer',
            'grade' => 'required|string',
            'is_pass' => 'required|boolean',
        ]);
    
        // Cari markah berdasarkan ID
        $mark = Mark::findOrFail($id);
    
        // Kemaskini markah
        $mark->update([
            'marks' => $request->marks,
            'grade' => $request->grade,
            'is_pass' => $request->is_pass,
        ]);
    
        // Redirect ke halaman senarai markah dengan mesej kejayaan
        return redirect()->route('marks')->with('success', 'Markah Successfully Updated!');
    }    

    public function destroy($id)
{
    // Cari markah berdasarkan ID dan padamkan
    $mark = Mark::findOrFail($id);
    $mark->delete();

    // Redirect ke halaman markah dengan mesej kejayaan
    return redirect()->route('marks')->with('success', 'Marks Successfully Deleted!');
}

}
