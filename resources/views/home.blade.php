@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-primary float-end" href="{{ route('logout') }}"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <h2 class="text-center">Welcome</h2>
</div>
@endsection
