<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;

class AttendanceController extends Controller
{
    // Fungsi untuk memaparkan kalendar dan senarai pelajar untuk rekod kehadiran
    public function index()
    {
        $students = Student::all();  // Ambil semua pelajar
        return view('attendances.index', compact('students'));
    }

    // Fungsi untuk menyimpan kehadiran
    public function store(Request $request)
    {
        // Validasi input kehadiran
        $request->validate([
            'attendance' => 'required|array',
            'attendance.*' => 'in:present,absent',
            'date' => 'required|date'
        ]);

        foreach ($request->attendance as $studentId => $status) {
            // Simpan rekod kehadiran pelajar
            Attendance::create([
                'student_id' => $studentId,
                'status' => $status,
                'date' => $request->date,
            ]);
        }

        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully!');
    }

    // Fungsi untuk melihat rekod kehadiran pelajar pada tarikh tertentu
    public function view($student_id, $date)
    {
        // Cari rekod kehadiran berdasarkan student_id dan date
        $attendance = Attendance::where('student_id', $student_id)
                                ->where('date', $date)
                                ->first();
        
        if (!$attendance) {
            // Jika tiada kehadiran untuk pelajar ini pada tarikh tersebut
            return redirect()->route('attendances.index')->with('error', 'Attendance record not found.');
        }

        return view('attendances.view', compact('attendance'));
    }
}
