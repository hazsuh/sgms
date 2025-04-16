@extends('layouts.app') <!-- Menggunakan layout yang ada sidebar -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Edit Student</h2>

    <!-- Form untuk mengemaskini pelajar -->
    <form action="{{ route('students.update.submit', ['id' => $student->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Pelajar -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Kelas Pelajar -->
        <div class="mb-4">
            <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
            <input type="text" id="class" name="class" value="{{ old('class', $student->class) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- No Matric -->
        <div class="mb-4">
            <label for="no_matric" class="block text-sm font-medium text-gray-700">No Matric</label>
            <input type="text" id="no_matric" name="no_matric" value="{{ old('no_matric', $student->no_matric) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Gender Pelajar -->
        <div class="mb-4">
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select name="gender" id="gender" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <option value="M" {{ $student->gender == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ $student->gender == 'F' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Butang Update -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update Student</button>
        </div>
    </form>
@endsection
