@extends('layouts.app')

@section('title', 'Beranda')

@php
use Illuminate\Support\Str;
use Carbon\Carbon;
@endphp

@section('content')
<div class="hero">
    <div class="hero-content">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6">
                <a class="brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="" width="120px"></a>
                <h1 class="hero-title mb-3">Selamat Datang di <span>Evenager</span></h1>
                <p class="hero-subtitle text-muted">Di Evenager, kami hadir untuk membantumu mencari pengalaman event online yang tak hanya berkesan, tetapi juga penuh makna.</p>
                <a href="#event" class="btn btn-outline-dark">Jelajahi Event</a>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/img-hero.png') }}" alt="Hero Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div id="event" class="mb-5">
    <div class="row d-flex align-items-center">
        <div class="col-lg-3">
            <h1 class="event-title mb-3">Event <br> Terbaru*</h1>
            <p class="event-subtitle text-muted">*Event terbaru yang akan datang</p>
            <a href="{{ route('event.all') }}" class="btn btn-dark">Lihat Semua Event</a>
        </div>

        @if($events->isEmpty())
        <p class="text-muted">Belum ada event terbaru saat ini.</p>
        @else
        @foreach($events as $event)
        <div class="col-lg-3">
            <div class="card event-card mb-3">
                <img src="{{ asset('images/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                <div class="card-body">
                    <span class="badge text-bg-success mb-3">New</span>
                    <h5 class="card-title fw-semibold">{{ $event->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($event->description, 70) }}</p>
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    <span class="text-muted">{{ $event->location }}</span><br>
                    <i class="bi bi-calendar-event-fill me-2"></i>
                    <span class="text-muted">{{ Carbon::parse($event->date)->translatedFormat('d F Y') }}</span><br>
                    <i class="bi bi-clock-fill me-2"></i>
                    <span class="text-muted">{{ $event->start_time }} - {{ $event->end_time }}</span><br>
                    <i class="bi bi-person-fill me-2"></i>
                    <span class="text-muted">{{ $event->quota }} Peserta</span><br>
                    <i class="bi bi-currency-dollar me-2"></i>
                    <span class="text-muted">Rp {{ number_format($event->price, 0, ',', '.') }}</span><br>
                    <a href="{{ route('event.detail', ['id' => $event->id]) }}" class="btn btn-outline-dark mt-3 w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>


<footer>
    <div class="footer-content text-center py-4">
        <p class="text-muted mb-0">© 2025 Evenager. All rights reserved.</p>
        <p class="text-muted mb-0">Made with ❤️ by Leonando Prastiko</p>
    </div>
</footer>
@endsection