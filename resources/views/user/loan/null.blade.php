@extends('templates.app')

@section('title', 'Login Required')

@section('content')
<div class="container text-center">
    <h1 class="display-4">Access Denied</h1>
    <p class="lead">You must be logged in to view your loans.</p>
    <a href="{{ url('/login') }}" class="btn btn-primary btn-lg">Log In Now</a>
</div>
@endsection
