@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 fw-bold">Dashboard Admin</h1>

    <a href="{{ route('admin.events.create') }}" class="btn btn-dark mb-3">+ Tambah Event</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Kuota</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->quota }}</td>
                    <td>Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('event.detail', $event->id) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('admin.events.registrations', $event->id) }}" class="btn btn-info btn-sm">Pendaftar</a>

                        <form id="delete-form-{{ $event->id }}" action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $event->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada event.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

{{-- SweetAlert Script --}}
@section('scripts')
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Yakin ingin menghapus event ini?',
                text: "Tindakan ini tidak bisa dibatalkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        });
    });
</script>
@endsection
