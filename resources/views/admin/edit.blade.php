@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Edit Event</h1>

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" required>{{ $event->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" value="{{ $event->date }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jam Mulai</label>
            <input type="time" name="start_time" class="form-control" value="{{ $event->start_time }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jam Selesai</label>
            <input type="time" name="end_time" class="form-control" value="{{ $event->end_time }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kuota</label>
            <input type="number" name="quota" class="form-control" value="{{ $event->quota }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="price" class="form-control" value="{{ $event->price }}" required>
        </div>

        <button type="submit" class="btn btn-dark">Update Event</button>
    </form>
</div>
@endsection