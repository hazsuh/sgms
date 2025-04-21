<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Subject;

class ExamsController extends Controller
{
    // Fungsi untuk memaparkan senarai exam
    public function index()
    {
        // Ambil semua exam dengan subject yang berkaitan
        $exams = Exam::with('subject')->get();
        return view('exams.index', compact('exams')); // Hantar data exam ke view
    }

    // Fungsi untuk memaparkan borang tambah exam
    public function create()
    {
        // Ambil semua subjek untuk dropdown
        $subjects = Subject::all();
        return view('exams.create', compact('subjects'));  // Paparkan borang tambah
    }

    // Fungsi untuk menyimpan exam baru
    public function store(Request $request)
    {
        // Validasi data yang dimasukkan
        $validatedData = $request->validate([
            'exam_name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id', // Pastikan subject_id sah
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'exam_date' => 'required|date',
        ]);

        // Simpan exam ke dalam pangkalan data
        Exam::create($validatedData);

        // Redirect ke senarai exam dengan mesej kejayaan
        return redirect()->route('exams.index')->with('success', 'Exam successfully added!');
    }

    // Fungsi untuk memaparkan borang edit exam
    public function edit($id)
    {
        // Ambil exam yang ingin diubah
        $exam = Exam::findOrFail($id);
        $subjects = Subject::all();
        return view('exams.edit', compact('exam', 'subjects'));  // Paparkan borang edit
    }

    // Fungsi untuk mengemaskini exam
    public function update(Request $request, $id)
    {
        // Validasi data yang dimasukkan
        $request->validate([
            'exam_name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'exam_date' => 'required|date',
        ]);

        // Cari exam yang ingin diubah
        $exam = Exam::findOrFail($id);
        $exam->update([
            'exam_name' => $request->exam_name,
            'subject_id' => $request->subject_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'exam_date' => $request->exam_date,
        ]);

        // Redirect ke senarai exam dengan mesej kejayaan
        return redirect()->route('exams.index')->with('success', 'Exam successfully updated!');
    }

    // Fungsi untuk memadam exam
    public function destroy($id)
    {
        // Cari exam yang ingin dipadam
        $exam = Exam::findOrFail($id);
        $exam->delete();  // Padam exam

        // Redirect ke halaman senarai exam dengan mesej kejayaan
        return redirect()->route('exams.index')->with('success', 'Exam successfully deleted!');
    }
}
