@extends('layouts.app') <!-- Menggunakan layout yang ada sidebar -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Record Attendance</h2>

    <!-- Calendar Form -->
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-600">Date</label>
            <input type="date" name="date" id="date" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
        </div>

        <!-- Hidden Input for Date (for View Button) -->
        <input type="hidden" name="date" value="{{ request('date') }}">

        <!-- Attendance Form -->
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">No Matric</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Attendance</th>
                    <th class="px-4 py-2 text-left">Action</th> <!-- Add Action Column for View -->
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
                        <td class="px-4 py-2">
                            <!-- Print Date for Debugging -->
                            {{ request('date') }} <!-- Tambah baris ini untuk melihat tarikh yang dihantar -->
                            
                            <!-- View Button -->
                            <a href="{{ route('attendances.view', ['student_id' => $student->id, 'date' => request('date')]) }}" class="text-blue-500 hover:text-blue-700">View</a>
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
