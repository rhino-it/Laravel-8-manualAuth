@extends('layouts.auth')
@section('content')
    <div class="container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" id="email" 
                    class="form-control @error('email') is-invalid @enderror" placeholder="Name" />
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
            <div class="form-group mb-3">
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" value="1">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Login</button>
            </div>
        </form>
    </div>
@endsection
