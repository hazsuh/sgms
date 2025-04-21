@extends('layouts.app')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Subject List</h2>

    <a href="{{ route('subjects.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Subject</a>

    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Subject Code</th>
                <th class="px-4 py-2 text-left">Subject Name</th>
                <th class="px-4 py-2 text-left">Credit</th>
                <th class="px-4 py-2 text-left">Class</th> <!-- Kolum untuk Class -->
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td class="px-4 py-2">{{ $subject->code }}</td>
                    <td class="px-4 py-2">{{ $subject->name }}</td>
                    <td class="px-4 py-2">{{ $subject->credit }}</td>
                    <td class="px-4 py-2">{{ $subject->class }}</td> <!-- Memaparkan kelas -->
                    <td class="px-4 py-2">
                        <a href="{{ route('subjects.edit', ['id' => $subject->id]) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('subjects.delete', ['id' => $subject->id]) }}" method="POST" class="inline-block">
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
