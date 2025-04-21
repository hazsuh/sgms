@extends('layouts.app') <!-- Using the existing sidebar layout -->

@section('content')
    <h2 class="text-3xl font-bold mb-6">Add Exam</h2>

    <form action="{{ route('exams.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Exam Name Input -->
        <div>
            <label for="exam_name" class="block text-sm font-medium text-gray-700">Exam Name</label>
            <input type="text" id="exam_name" name="exam_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('exam_name') border-red-500 @enderror" required value="{{ old('exam_name') }}">

            <!-- Error message for exam_name -->
            @error('exam_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Subject Dropdown -->
        <div>
            <label for="subject_id" class="block text-sm font-medium text-gray-700">Subject</label>
            <select id="subject_id" name="subject_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('subject_id') border-red-500 @enderror" required>
                <option value="">Select Subject</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>

            <!-- Error message for subject_id -->
            @error('subject_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Start Time Input -->
        <div>
            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
            <input type="time" id="start_time" name="start_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('start_time') border-red-500 @enderror" required value="{{ old('start_time') }}">

            <!-- Error message for start_time -->
            @error('start_time')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- End Time Input -->
        <div>
            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
            <input type="time" id="end_time" name="end_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('end_time') border-red-500 @enderror" required value="{{ old('end_time') }}">

            <!-- Error message for end_time -->
            @error('end_time')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Date Input -->
        <div>
            <label for="exam_date" class="block text-sm font-medium text-gray-700">Exam Date</label>
            <input type="date" id="exam_date" name="exam_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('exam_date') border-red-500 @enderror" required value="{{ old('exam_date') }}">

            <!-- Error message for exam_date -->
            @error('exam_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Exam</button>
        </div>
    </form>
@endsection
