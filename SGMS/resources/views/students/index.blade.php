@extends('layouts.app') <!-- Menggunakan layout yang ada sidebar -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Students</h2>

    <!-- Butang Add Student -->
    <a href="{{ route('students.add') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Student</a>

    <!-- Jadual Pelajar -->
    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">No Matric</th> <!-- Tambah kolum No Matric -->
                <th class="px-4 py-2 text-left">Class</th>
                <th class="px-4 py-2 text-left">Gender</th> <!-- Tambah kolum Gender -->
                <th class="px-4 py-2 text-left">Action</th> <!-- Kolum Action -->
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td class="px-4 py-2">{{ $student->id }}</td>
                    <td class="px-4 py-2">{{ $student->name }}</td>
                    <td class="px-4 py-2">{{ $student->no_matric }}</td> <!-- Paparkan No Matric -->
                    <td class="px-4 py-2">{{ $student->class }}</td>
                    <td class="px-4 py-2">{{ $student->gender }}</td> <!-- Paparkan Gender -->
                    <td class="px-4 py-2">
                        <!-- Butang Tindakan untuk Edit dan Delete -->
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
