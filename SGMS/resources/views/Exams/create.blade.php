@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Peperiksaan Baru</h1>

    <form action="{{ route('exams.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Peperiksaan</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject">Subjek</label>
            <input type="text" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_time">Masa Mula</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">Masa Tamat</label>
            <input type="datetime-local" name="end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
