<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Subject; // Pastikan Subject diimport

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua pelajar
        $students = Student::all();

        // Ambil semua subjek
        $subjects = Subject::all();

        // Hantar data pelajar dan subjek ke view
        return view('attendances.index', compact('students', 'subjects'));
    }

    // Fungsi untuk menyimpan kehadiran
    public function store(Request $request)
    {
        // Validasi data yang dihantar dari form
        $request->validate([
            'date' => 'required|date',
            'subject_id' => 'required|exists:subjects,id',  // Pastikan subject_id ada dalam subjects table
            'attendance' => 'required|array',  // Pastikan attendance adalah array
            'attendance.*' => 'in:present,absent',  // Memastikan status adalah 'present' atau 'absent'
        ]);
    
        // Simpan rekod kehadiran untuk setiap pelajar
        foreach ($request->attendance as $studentId => $status) {
            Attendance::create([
                'student_id' => $studentId,
                'subject_id' => $request->subject_id,  // Subjek yang dipilih
                'status' => $status,
                'date' => $request->date,  // Tarikh yang dipilih
            ]);
        }
    
        // Redirect ke halaman kehadiran dengan mesej kejayaan
        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully!');
    }    

    // Fungsi untuk melihat kehadiran pelajar untuk subjek tertentu
    public function view($id, Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));  // Mengambil tarikh yang dimasukkan oleh pengguna atau tarikh semasa
        $month = $request->input('month'); // Mengambil bulan yang dimasukkan oleh pengguna
    
        // Mendapatkan rekod kehadiran berdasarkan pelajar, tarikh, dan bulan
        $attendance = Attendance::where('student_id', $id)
                                ->where('date', $date)  // Memastikan kehadiran difilter dengan betul berdasarkan tarikh
                                ->get();
    
        // Menghantar data kepada view
        return view('students.view', compact('attendance', 'date', 'month'));
    }
    
}
