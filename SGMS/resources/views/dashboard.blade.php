@extends('layouts.app') <!-- Menggunakan layout yang ada sidebar -->

@section('title', 'Dashboard') <!-- Optional: untuk menukar tajuk halaman -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Dashboard</h2>
    <div class="grid grid-cols-2 gap-6">
        <!-- Panel untuk Jumlah Pelajar -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold">Students</h3>
            <p class="text-3xl">{{ $studentsCount }}</p> <!-- Menunjukkan jumlah pelajar -->
        </div>

        <!-- Panel untuk Jumlah Kehadiran -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold">Attendances</h3>
            <p class="text-3xl">{{ $attendancesCount }}</p> <!-- Menunjukkan jumlah kehadiran -->
        </div>

        <!-- Panel untuk Jumlah Mata Pelajaran -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold">Subjects</h3>
            <p class="text-3xl">{{ $subjectsCount }}</p> <!-- Menunjukkan jumlah mata pelajaran -->
        </div>

        <!-- Panel untuk Jumlah Peperiksaan -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold">Exams</h3>
            <p class="text-3xl">{{ $examsCount }}</p> <!-- Menunjukkan jumlah peperiksaan -->
        </div>
    </div>
@endsection
