@extends('templates.app')

@section('title', 'Forbidden')

@section('content')
<div class="container">
    <h1>403 Forbidden</h1>
    <p>You do not have permission to access this page.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection
