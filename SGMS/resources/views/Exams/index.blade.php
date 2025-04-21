@extends('layouts.app') <!-- Menggunakan layout dengan sidebar -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Exam List</h2>

    <!-- Button untuk tambah exam -->
    <a href="{{ route('exams.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-4">Add Exam</a>

    <!-- Table Senarai Exam -->
    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left border-b">Exam Name</th>
                <th class="px-4 py-2 text-left border-b">Subject Name</th>
                <th class="px-4 py-2 text-left border-b">Date</th>
                <th class="px-4 py-2 text-left border-b">Start Time</th>
                <th class="px-4 py-2 text-left border-b">End Time</th>
                <th class="px-4 py-2 text-left border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $exam->exam_name }}</td>
                    <td class="px-4 py-2 border-b">{{ $exam->subject->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $exam->exam_date }}</td>
                    <td class="px-4 py-2 border-b">{{ $exam->start_time }}</td>
                    <td class="px-4 py-2 border-b">{{ $exam->end_time }}</td>
                    <td class="px-4 py-2 border-b">
                        <!-- Action Buttons for Edit and Delete -->
                        <a href="{{ route('exams.edit', $exam->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a> |
                        <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" style="display:inline;">
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
