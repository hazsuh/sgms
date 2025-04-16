<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;  // Pastikan import model Student
use App\Models\Attendance;  // Pastikan import model Attendance
use App\Models\Subject; // Pastikan import model Subject
use App\Models\Exam; // Pastikan import model Exam

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah pelajar
        $studentsCount = Student::count();

        // Ambil jumlah kehadiran
        $attendancesCount = Attendance::count();

        // Ambil jumlah mata pelajaran
        $subjectsCount = Subject::count();

        // Ambil jumlah peperiksaan
        $examsCount = Exam::count();

        // Hantar jumlah pelajar, kehadiran, mata pelajaran, dan peperiksaan ke view
        return view('dashboard', compact('studentsCount', 'attendancesCount', 'subjectsCount', 'examsCount'));
    }
}
