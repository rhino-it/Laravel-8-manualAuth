@extends('layouts.auth')
@section('content')
    <div class="container">
        <h1>Forgot your password?</h1>
        <p>Fill in your email below and we'll send you a link to reset your password.</p>
        <form method="post" action="{{ route('password.email') }}">
            @csrf
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">Your email</label>
                <input required type="email" name="email" id="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @error('email') {{ $message }} @enderror
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Request</button>
            </div>
        </form>

    </div>
@endsection

