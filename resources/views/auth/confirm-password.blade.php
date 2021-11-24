@extends('layouts.auth')
@section('content')
    <div class="container">
        <h1>Confirm Password</h1>
        <form action="{{ route('password.confirm') }}" method="post">
            @csrf
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
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Register</button>
            </div>
        </form>
    </div>
@endsection
