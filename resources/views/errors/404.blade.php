@extends('templates.app')

@section('title', 'Page Not Found')

@section('content')
<div class="container">
    <h1>404 Page Not Found</h1>
    <p>The page you are looking for could not be found.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection