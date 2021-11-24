@extends('layouts.auth')
@section('content')
    <div class="container">
        <h1>Register</h1>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror" placeholder="Name" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Email-->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
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

            <!-- Confirm password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="repeat a password" />
            </div>

            {{-- <div class="mb-3">
                <label for="select_example" class="form-label">Example old value for select option</label>
                @foreach ($services as $service)
                    @if (old('category') == $service->id)
                        <option value="{{ $service->id }}" selected>{{ $service->title }}</option>
                    @else
                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endif
                @endforeach
            </div> --}}

            <!-- Submit button -->
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Register</button>
            </div>
        </form>
    </div>
@endsection