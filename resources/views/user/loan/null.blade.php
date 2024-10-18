@extends('templates.app')
@section('nav-active', 'loan')
@section('title', 'Login Required')

@section('content')
<div class="container text-center">
    <h3 class="">Access Denied</h3>
    <p class="lead">You must be logged in to view your loans.</p>
    <a href="{{ url('/login') }}" class="btn btn-primary ">Log In Now</a>
</div>
@endsection
