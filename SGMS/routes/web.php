<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\MarksController;

Route::get('/', function () {
    return redirect('/login');  // Mengalihkan pengguna ke halaman log masuk
});

// Route untuk login page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route untuk registration page
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route untuk dashboard page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route untuk Students page
Route::get('/students', [StudentsController::class, 'index'])->name('students')->middleware('auth');
Route::get('/students/add', [StudentsController::class, 'create'])->name('students.add')->middleware('auth');
Route::post('/students', [StudentsController::class, 'store'])->middleware('auth');
Route::get('/students/edit/{id}', [StudentsController::class, 'edit'])->name('students.update')->middleware('auth');
Route::put('/students/update/{id}', [StudentsController::class, 'update'])->name('students.update.submit')->middleware('auth');
Route::delete('/students/delete/{id}', [StudentsController::class, 'destroy'])->name('students.delete')->middleware('auth');
Route::get('/students/view/{id}', [StudentsController::class, 'view'])->name('students.view')->middleware('auth');

// Route untuk Attendances
Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index')->middleware('auth');
Route::post('/attendances/store', [AttendanceController::class, 'store'])->name('attendances.store')->middleware('auth');
Route::get('/attendances/view/{student_id}/{date}/{subject_id}', [AttendanceController::class, 'view'])->name('attendances.view')->middleware('auth');
Route::get('/attendances/view/{student_id}/{date}', [AttendanceController::class, 'view'])->name('attendances.view')->middleware('auth');

// Route untuk Subjects
Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index')->middleware('auth');
Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('subjects.create')->middleware('auth');
Route::post('/subjects', [SubjectsController::class, 'store'])->name('subjects.store')->middleware('auth');
Route::get('/subjects/edit/{id}', [SubjectsController::class, 'edit'])->name('subjects.edit')->middleware('auth');
Route::put('/subjects/update/{id}', [SubjectsController::class, 'update'])->name('subjects.update')->middleware('auth');
Route::delete('/subjects/delete/{id}', [SubjectsController::class, 'destroy'])->name('subjects.delete')->middleware('auth');

// Route untuk Exams
Route::get('/exams', [ExamsController::class, 'index'])->name('exams.index')->middleware('auth');
Route::get('/exams/create', [ExamsController::class, 'create'])->name('exams.create')->middleware('auth');  // Menambah exam
Route::post('/exams', [ExamsController::class, 'store'])->name('exams.store')->middleware('auth');  // Menyimpan exam baru
Route::get('/exams/edit/{id}', [ExamsController::class, 'edit'])->name('exams.edit')->middleware('auth');
Route::put('/exams/update/{id}', [ExamsController::class, 'update'])->name('exams.update')->middleware('auth');
Route::delete('/exams/{id}', [ExamsController::class, 'destroy'])->name('exams.destroy')->middleware('auth');

// Route untuk Marks
Route::get('/marks', [MarksController::class, 'index'])->name('marks')->middleware('auth');
Route::get('/marks/create', [MarksController::class, 'create'])->name('marks.create')->middleware('auth');
Route::post('/marks', [MarksController::class, 'store'])->name('marks.store')->middleware('auth');
Route::get('/marks/edit/{id}', [MarksController::class, 'edit'])->name('marks.edit')->middleware('auth');
Route::put('/marks/update/{id}', [MarksController::class, 'update'])->name('marks.update')->middleware('auth');
Route::delete('/marks/delete/{id}', [MarksController::class, 'destroy'])->name('marks.delete')->middleware('auth');

// Route to logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
