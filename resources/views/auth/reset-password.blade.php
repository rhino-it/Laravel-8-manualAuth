@extends('layouts.auth')
@section('content')
    <div class="container">
        <h1>Reset your password</h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <!-- Token (hidden) -->
            <input hidden type="text" name="token" value="{{ $token }}" />

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" name="email" id="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="repeat a password" />
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Reset</button>
            </div>
        </form>
    </div>
@endsection
