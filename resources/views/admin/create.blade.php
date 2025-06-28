@extends('layouts.app')

@section('title', 'Tambah Event')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold mb-4">Tambah Event Baru</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Event</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="location" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="date" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" name="start_time" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Jam Selesai</label>
            <input type="time" class="form-control" name="end_time" required>
        </div>

        <div class="mb-3">
            <label for="quota" class="form-label">Kuota Peserta</label>
            <input type="number" class="form-control" name="quota" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="number" class="form-control" name="price" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Event</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-dark">Simpan Event</button>
    </form>
</div>
@endsection