@extends('layouts.app') <!-- Menggunakan layout dengan sidebar -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Record Attendance</h2>

    <!-- Calendar Form -->
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-600">Date</label>
            <input type="date" name="date" id="date" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ request('date') ?? '2025-04-16' }}" required>
        </div>

        <!-- Hidden Input for Date -->
        <input type="hidden" name="date" value="{{ request('date') ?? '2025-04-16' }}">

        <!-- Dropdown untuk memilih subjek -->
        <div class="mb-4">
            <label for="subject_id" class="block text-sm font-medium text-gray-600">Subject</label>
            <select name="subject_id" id="subject_id" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                <option value="">Select Subject</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Attendance Form -->
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">No Matric</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Attendance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td class="px-4 py-2">{{ $student->no_matric }}</td>
                        <td class="px-4 py-2">{{ $student->name }}</td>
                        <td class="px-4 py-2">
                            <select name="attendance[{{ $student->id }}]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Save Attendance</button>
        </div>
    </form>
@endsection
