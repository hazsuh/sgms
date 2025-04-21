@extends('layouts.app') <!-- Menggunakan layout yang ada sidebar -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Students</h2>

    <!-- Butang untuk Menambah Pelajar -->
    <a href="{{ route('students.add') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Student</a>

    <!-- Jadual Pelajar -->
    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Matric No</th> <!-- Nombor Matrik -->
                <th class="px-4 py-2 text-left">Action</th> <!-- Aksi untuk Edit dan Delete -->
            </tr>
        </thead>
        <tbody>
            @php
                $counter = 1; // Inisialisasi nombor ID bermula dari 1
            @endphp
            @foreach($students as $student)
                <tr>
                    <td class="px-4 py-2">{{ $counter++ }}</td>
                    <td class="px-4 py-2">{{ $student->name }}</td>
                    <td class="px-4 py-2">{{ $student->no_matric }}</td>
                    <td class="px-4 py-2">
                        <!-- Butang untuk Edit, View, dan Delete -->
                        <a href="{{ route('students.view', ['id' => $student->id]) }}" class="text-blue-500 hover:text-blue-700">View</a> 
                        <a href="{{ route('students.update', ['id' => $student->id]) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('students.delete', ['id' => $student->id]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
