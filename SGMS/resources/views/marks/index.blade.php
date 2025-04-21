@extends('layouts.app') <!-- Using the existing sidebar layout -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Student Marks</h2>

    <!-- Button to Add Marks -->
    <a href="{{ route('marks.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Marks</a>

    <!-- Marks Table -->
    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Matric No</th> <!-- Matric Number Column -->
                <th class="px-4 py-2 text-left">Marks</th> <!-- Marks Column -->
                <th class="px-4 py-2 text-left">Grade</th> <!-- Grade Column -->
                <th class="px-4 py-2 text-left">Pass/Fail</th> <!-- Pass/Fail Column -->
                <th class="px-4 py-2 text-left">Action</th> <!-- Action Column (Edit/Delete) -->
            </tr>
        </thead>
        <tbody>
            @foreach($marks as $index => $mark)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td> <!-- Display auto-increment ID starting from 1 -->
                    <td class="px-4 py-2">{{ $mark->student->name }}</td> <!-- Display Student Name -->
                    <td class="px-4 py-2">{{ $mark->student->no_matric }}</td> <!-- Display Matric Number -->
                    <td class="px-4 py-2">{{ $mark->marks }}</td> <!-- Display Marks -->
                    <td class="px-4 py-2">{{ $mark->grade }}</td> <!-- Display Grade -->
                    <td class="px-4 py-2">{{ $mark->is_pass ? 'Pass' : 'Fail' }}</td> <!-- Display Pass/Fail -->
                    <td class="px-4 py-2">
                        <!-- Action buttons for Edit and Delete -->
                        <a href="{{ route('marks.edit', ['id' => $mark->id]) }}" class="text-blue-500 hover:text-blue-700">Edit</a> <!-- Edit Link -->
                        <form action="{{ route('marks.delete', ['id' => $mark->id]) }}" method="POST" class="inline-block">
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
