@extends('layouts.app') <!-- Using the existing sidebar layout -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Student Information</h2>

    <p>Name: {{ $student->name }}</p>
    <p>Matric Number: {{ $student->no_matric }}</p>
    <p>Class: {{ $student->class }}</p>
    <p>Gender: {{ $student->gender }}</p>

    <!-- Add space between Gender and Select Month -->
    <div class="mb-4"></div> <!-- This creates space -->

    <!-- Dropdown to select Month -->
    <form method="GET" action="{{ route('students.view', ['id' => $student->id]) }}">
        @csrf
        <div class="mb-4">
            <label for="month" class="block text-sm font-medium text-gray-700">Select Month:</label>
            <select name="month" id="month" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select Month</option>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $month, 10)) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">View Attendance</button>
        </div>
    </form>

    <h3 class="mt-6">Attendance Records Throughout the Year:</h3>

    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Date</th>
                <th class="px-4 py-2 text-left">Attendance Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendance as $attend)
                <tr>
                    <td class="px-4 py-2">{{ $attend->date }}</td>
                    <td class="px-4 py-2">{{ $attend->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('students') }}" class="text-blue-500 hover:text-blue-700 mt-4">Back to Students</a>
@endsection
