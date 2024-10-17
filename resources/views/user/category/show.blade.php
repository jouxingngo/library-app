@extends('templates.app')
@section('title')
{{ $category->name }}
@endsection
@section('nav-active', 'category')
@section('head')
{{ $category->name }}
@endsection
@section('content')
<a href="{{ route('category.index') }}" class="btn btn-primary mb-2">Back to Categories</a>

<h3>Book in : {{ $category->name }}</h3>

<div class="row">
    @forelse ($category->books as $book)
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="{{ asset('/images/' . $book->image) }}"" class="card-img-top" alt="{{ $book->title }}">
                <div class="card-body">
                    <h5 class="card-title text-center text-dark font-weight-bold">{{ $book->title }}</h5>
                    <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $book->status ? 'Available' : 'Unavailable' }}</p>
                    <p class="card-text"><strong>Author:</strong> {{ $book->stock }}</p>

                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-info">View Details</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <h3 class="text-center">No Books Available in this Category</h3>
        </div>
    @endforelse
</div>
@endsection