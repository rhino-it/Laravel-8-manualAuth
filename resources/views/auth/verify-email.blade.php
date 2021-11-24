@extends('layouts.auth')
@section('content')
    <div class="container">
        <h1>Verify email</h1>
        <p>Please verify your email address by clicking the link in the mail we just sent you. Thanks!</p>

        <form action="{{ route('verification.request') }}" method="POST">
            @csrf
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Request a new link</button>
            </div>
        </form>
        
    </div>
@endsection
