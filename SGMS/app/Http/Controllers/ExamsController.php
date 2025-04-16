<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamsController extends Controller
{
    // Fungsi untuk memaparkan senarai peperiksaan
    public function index()
    {
        $exams = Exam::all();
        return view('exams.index', compact('exams'));
    }

    // Fungsi untuk mencipta peperiksaan
    public function create(Request $request)
    {
        $exam = new Exam();
        $exam->name = $request->name;
        $exam->subject = $request->subject;
        $exam->start_time = $request->start_time;
        $exam->end_time = $request->end_time;
        $exam->save();

        return redirect()->route('exams.index');
    }

    // Fungsi untuk mengedit peperiksaan
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('exams.edit', compact('exam'));
    }

    // Fungsi untuk mengemas kini peperiksaan
    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);
        $exam->name = $request->name;
        $exam->subject = $request->subject;
        $exam->start_time = $request->start_time;
        $exam->end_time = $request->end_time;
        $exam->save();

        return redirect()->route('exams.index');
    }

    // Fungsi untuk menghapus peperiksaan
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->route('exams.index');
    }
}
