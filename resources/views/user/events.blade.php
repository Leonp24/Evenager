@extends('layouts.app')

@section('title', 'Semua Event')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 fw-bold text-center">Semua Event</h1>

    <div class="row">
        @forelse($events as $event)
        <div class="col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                    <p class="mb-0"><i class="bi bi-geo-alt me-1"></i> {{ $event->location }}</p>
                    <p class="mb-0"><i class="bi bi-calendar me-1"></i> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                    <a href="{{ route('event.detail', $event->id) }}" class="btn btn-outline-dark mt-3 w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">Belum ada event tersedia.</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $events->links() }}
    </div>
</div>
@endsection