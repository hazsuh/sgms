<?php

namespace App\Http\Controllers;

use App\Models\Subject;  // Pastikan Subject model diimport
use App\Models\Student;  // Pastikan Student model diimport
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    // Method untuk memaparkan senarai subjects
    public function index()
    {
        $subjects = Subject::all();  // Ambil semua subject
        return view('subjects.index', compact('subjects'));
    }

    // Method untuk memaparkan borang menambah subject
    public function create()
    {
        // Ambil kelas yang unik dari pelajar
        $classes = Student::distinct()->pluck('class');  // Ini akan memberikan kelas yang unik
        return view('subjects.create', compact('classes'));  // Pass kelas ke view
    }

    // Method untuk menyimpan subject
    public function store(Request $request)
    {
        // Validasi data yang dimasukkan
        $request->validate([
            'code' => 'required|unique:subjects,code', // Pastikan code adalah unik
            'name' => 'required|string|max:255',
            'credit' => 'required|numeric',
            'class' => 'required|string|max:255',  // Validasi untuk kelas
        ]);
    
        // Simpan subject baru ke dalam pangkalan data
        Subject::create([
            'code' => $request->code,  // Gunakan nilai yang dimasukkan oleh pengguna
            'name' => $request->name,
            'credit' => $request->credit,
            'class' => $request->class,  // Simpan kelas
        ]);
    
        // Redirect ke halaman senarai subject dengan mesej kejayaan
        return redirect()->route('subjects.index')->with('success', 'Subject Successfully Added!');
    }    

    // Method untuk memaparkan borang mengedit subject
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);  // Cari subject berdasarkan ID
        return view('subjects.edit', compact('subject'));  // Paparkan borang edit
    }

    // Method untuk mengemas kini subject
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:subjects,code,' . $id,  // Allow current subject code to be updated
            'name' => 'required|string|max:255',
            'credit' => 'required|numeric',
            'class' => 'required|string|max:255',  // Validasi untuk kelas
        ]);

        $subject = Subject::findOrFail($id);  // Cari subject berdasarkan ID
        $subject->update([
            'code' => $request->code,
            'name' => $request->name,
            'credit' => $request->credit,
            'class' => $request->class,  // Kemas kini kelas
        ]);

        // Redirect ke halaman senarai subject dengan mesej kejayaan
        return redirect()->route('subjects.index')->with('success', 'Subject Succefully Updated!');
    }

    // Method untuk memadam subject
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);  // Cari subject berdasarkan ID
        $subject->delete();  // Padamkan subject

        // Redirect ke halaman senarai subject dengan mesej kejayaan
        return redirect()->route('subjects.index')->with('success', 'Subject Sucessfully Deleted!');
    }
}
