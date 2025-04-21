@extends('layouts.app')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Add Subject</h2>

    <!-- Check for success or error messages -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form to Add Subject -->
    <form action="{{ route('subjects.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Subject Code Input -->
        <div>
            <label for="code" class="block text-sm font-medium text-gray-700">Subject Code</label>
            <input type="text" id="code" name="code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('code') border-red-500 @enderror" required value="{{ old('code') }}">

            <!-- Error message for code -->
            @error('code')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Subject Name Input -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Subject Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror" required value="{{ old('name') }}">

            <!-- Error message for name -->
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Credit Input -->
        <div>
            <label for="credit" class="block text-sm font-medium text-gray-700">Credit</label>
            <input type="number" id="credit" name="credit" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('credit') border-red-500 @enderror" required value="{{ old('credit') }}">

            <!-- Error message for credit -->
            @error('credit')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Class Input -->
        <div>
            <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
            <input type="text" id="class" name="class" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('class') border-red-500 @enderror" required value="{{ old('class') }}">

            <!-- Error message for class -->
            @error('class')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Subject</button>
        </div>
    </form>
@endsection
