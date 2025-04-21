@extends('layouts.app')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Edit Markah</h2>

    <!-- Borang untuk Mengedit Markah -->
    <form action="{{ route('marks.update', ['id' => $mark->id]) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Masukkan Markah -->
        <div>
            <label for="marks" class="block text-sm font-medium text-gray-700">Markah</label>
            <input type="number" id="marks" name="marks" value="{{ old('marks', $mark->marks) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Masukkan Gred -->
        <div>
            <label for="grade" class="block text-sm font-medium text-gray-700">Gred</label>
            <input type="text" id="grade" name="grade" value="{{ old('grade', $mark->grade) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Pilih Lulus/Gagal -->
        <div>
            <label for="is_pass" class="block text-sm font-medium text-gray-700">Lulus/Gagal</label>
            <select id="is_pass" name="is_pass" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="1" {{ $mark->is_pass ? 'selected' : '' }}>Lulus</option>
                <option value="0" {{ !$mark->is_pass ? 'selected' : '' }}>Gagal</option>
            </select>
        </div>

        <!-- Butang Hantar -->
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Kemaskini Markah</button>
        </div>
    </form>
@endsection
