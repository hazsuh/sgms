<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;  // Import DashboardController
use App\Http\Controllers\StudentsController;  // Import StudentsController
use App\Http\Controllers\AttendanceController;  // Import AttendanceController
use App\Http\Controllers\SubjectsController;   // Import SubjectsController
use App\Http\Controllers\ExamsController;      // Import ExamsController
use App\Http\Controllers\MarksController;      // Import MarksController


Route::get('/', function () {
    return redirect('/login'); // Redirect to login page on startup
});

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route untuk halaman register (pendaftaran)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route untuk halaman dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route untuk halaman Students
Route::get('/students', [StudentsController::class, 'index'])->name('students')->middleware('auth');

// Route untuk halaman Add Student
Route::get('/students/add', [StudentsController::class, 'create'])->name('students.add')->middleware('auth');
Route::post('/students', [StudentsController::class, 'store'])->middleware('auth');

// Route untuk Update Student
Route::get('/students/edit/{id}', [StudentsController::class, 'edit'])->name('students.update')->middleware('auth');
Route::put('/students/update/{id}', [StudentsController::class, 'update'])->name('students.update.submit')->middleware('auth');

// Route untuk menghapus student
Route::delete('/students/delete/{id}', [StudentsController::class, 'destroy'])->name('students.delete')->middleware('auth');

// Route untuk halaman Attendances
Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index')->middleware('auth');
Route::post('/attendances/store', [AttendanceController::class, 'store'])->name('attendances.store')->middleware('auth');

// Route untuk melihat status kehadiran pelajar pada tarikh tertentu
Route::get('/attendances/view/{student_id}/{date}', [AttendanceController::class, 'view'])->name('attendances.view')->middleware('auth');

// Route untuk Subjects
Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects')->middleware('auth');

// Route untuk Exams
Route::get('/exams', [ExamsController::class, 'index'])->name('exams.index')->middleware('auth');  // Senarai Peperiksaan
Route::post('/exams/create', [ExamsController::class, 'create'])->name('exams.create')->middleware('auth');  // Cipta Peperiksaan
Route::get('/exams/{id}/edit', [ExamsController::class, 'edit'])->name('exams.edit')->middleware('auth');  // Edit Peperiksaan
Route::post('/exams/{id}/update', [ExamsController::class, 'update'])->name('exams.update')->middleware('auth');  // Kemas Kini Peperiksaan
Route::delete('/exams/{id}', [ExamsController::class, 'destroy'])->name('exams.destroy')->middleware('auth');  // Padam Peperiksaan

// Route untuk Marks
Route::get('/marks', [MarksController::class, 'index'])->name('marks')->middleware('auth');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
