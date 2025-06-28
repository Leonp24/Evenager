@extends('layouts.app')

@section('title', 'Pendaftar Event')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold mb-4">Pendaftar untuk: {{ $event->title }}</h1>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>

    @if($event->registrations->isEmpty())
    <p class="text-muted">Belum ada yang mendaftar.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($event->registrations as $registration)
            <tr>
                <td>{{ $registration->name }}</td>
                <td>{{ $registration->email }}</td>
                <td>{{ $registration->phone }}</td>
                <td>{{ $registration->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection