@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="container my-5">
    <h1 class="fw-bold">{{ $event->title }}</h1>
    <img src="{{ asset('images/' . $event->image) }}" class="img-fluid mb-4 rounded" alt="{{ $event->title }}">

    <p class="text-muted">{{ $event->description }}</p>

    <ul class="list-unstyled mb-4">
        <li><i class="bi bi-geo-alt-fill me-2"></i> {{ $event->location }}</li>
        <li><i class="bi bi-calendar-event-fill me-2"></i> {{ $event->date }}</li>
        <li><i class="bi bi-clock-fill me-2"></i> {{ $event->start_time }} - {{ $event->end_time }}</li>
        <li><i class="bi bi-person-fill me-2"></i> Kuota: {{ $event->quota }} Peserta</li>
        <li><i class="bi bi-currency-dollar me-2"></i> Rp {{ number_format($event->price, 0, ',', '.') }}</li>
    </ul>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4 class="mb-3">Form Pendaftaran</h4>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('event.register', $event->id) }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-dark">Daftar Sekarang</button>
    </form>

</div>
@endsection