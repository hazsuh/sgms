@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Senarai Peperiksaan</h1>

    <a href="{{ route('exams.create') }}" class="btn btn-primary">Tambah Peperiksaan</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Subjek</th>
                <th>Masa Mula</th>
                <th>Masa Tamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
            <tr>
                <td>{{ $exam->id }}</td>
                <td>{{ $exam->name }}</td>
                <td>{{ $exam->subject }}</td>
                <td>{{ $exam->start_time }}</td>
                <td>{{ $exam->end_time }}</td>
                <td>
                    <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
