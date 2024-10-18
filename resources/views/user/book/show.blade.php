@extends('templates.app')
@section('title')
Book Detail
@endsection
@section('nav-active', 'book')
@section('head')
Book Detail
@endsection
@section('content')
<a href="{{ route('book.index') }}" class="btn mb-3 btn-primary"> Back to Books</a>
<div class="card mb-3">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('/images/'.$book->image) }}" class="card-img w-100 " alt="{{ $book->title }}">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h3 class="card-title text-dark font-weight-bold text-center">{{ $book->title }}</h3>
                <p class="card-text"><strong>Category:</strong> <a href="/category/{{ $book->category->id }}">{{ $book->category->name }}</a></p>
                <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $book->description }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $book->status ? "Available" : "Unavailable" }}</p>
                <p class="card-text"><strong>Stock:</strong> {{ $book->stock }}</p>       
            </div>
        </div>
    </div>   
</div>


@endsection