@extends('layouts.app')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Edit Subject</h2>

    <form action="{{ route('subjects.update', ['id' => $subject->id]) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="code" class="block text-sm font-medium text-gray-700">Subject Code</label>
            <input type="text" id="code" name="code" value="{{ old('code', $subject->code) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Subject Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $subject->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <label for="credit" class="block text-sm font-medium text-gray-700">Credit</label>
            <input type="number" id="credit" name="credit" value="{{ old('credit', $subject->credit) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Add Class Field -->
        <div>
            <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
            <input type="text" id="class" name="class" value="{{ old('class', $subject->class) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Subject</button>
        </div>
    </form>
@endsection
