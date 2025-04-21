@extends('layouts.app')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Add Mark</h2>

    <!-- Borang untuk Menambah Markah -->
    <form action="{{ route('marks.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Pilih Pelajar -->
        <div>
            <label for="student_id" class="block text-sm font-medium text-gray-700">Choose Student</label>
            <select id="student_id" name="student_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Choose Student--</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->no_matric }})</option>
                @endforeach
            </select>
        </div>

        <!-- Masukkan Markah -->
        <div>
            <label for="marks" class="block text-sm font-medium text-gray-700">Marks</label>
            <input type="number" id="marks" name="marks" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Pilih Lulus/Gagal -->
        <div>
            <label for="is_pass" class="block text-sm font-medium text-gray-700">Pass/Fail</label>
            <select id="is_pass" name="is_pass" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="1">Pass</option>
                <option value="0">Fail</option>
            </select>
        </div>

        <!-- Butang Hantar -->
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save Mark</button>
        </div>
    </form>
@endsection
