@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Login Admin</h1>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <input type="email" name="email" placeholder="Email" class="form-control mb-3" required />
                        <input type="password" name="password" placeholder="Password" class="form-control mb-3" required />
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection