@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Peperiksaan</h1>

    <form action="{{ route('exams.update', $exam->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Nama Peperiksaan</label>
            <input type="text" name="name" class="form-control" value="{{ $exam->name }}" required>
        </div>
        <div class="form-group">
            <label for="subject">Subjek</label>
            <input type="text" name="subject" class="form-control" value="{{ $exam->subject }}" required>
        </div>
        <div class="form-group">
            <label for="start_time">Masa Mula</label>
            <input type="datetime-local" name="start_time" class="form-control" value="{{ $exam->start_time }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">Masa Tamat</label>
            <input type="datetime-local" name="end_time" class="form-control" value="{{ $exam->end_time }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Kemaskini</button>
    </form>
</div>
@endsection
