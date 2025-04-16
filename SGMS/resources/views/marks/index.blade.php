@extends('layouts.app')  <!-- Pastikan ini mengikut layout anda -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Marks</h2>

    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Student ID</th>
                <th class="px-4 py-2 text-left">Subject ID</th>
                <th class="px-4 py-2 text-left">Marks Obtained</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marks as $mark)
                <tr>
                    <td class="px-4 py-2">{{ $mark->id }}</td>
                    <td class="px-4 py-2">{{ $mark->student_id }}</td>
                    <td class="px-4 py-2">{{ $mark->subject_id }}</td>
                    <td class="px-4 py-2">{{ $mark->marks_obtained }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
