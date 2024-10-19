@extends('templates.app')
@section('title')
Category - {{ $category->name }}
@endsection
@section('nav-active', 'category')
@section('head')
{{ $category->name }}
@endsection
@section('content')
<a href="{{ route('category.index') }}" class="btn btn-primary mb-2">Back to Categories</a>

<h3>Book in : {{ $category->name }}</h3>

<div class="row">
    
    <div class="col-12 mb-3">
        <form action="{{ route('category.show',$category->id) }}" method="GET" class="input-group">
            <input type="text" id="search" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Search books in {{ $category->name }}..." >
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <a href="{{ route('category.show', $category->id) }}" class="btn btn-success "><i class="fas fa-undo"></i></a>
            </div>
            
        </form>
        
        
</div>
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            {{ $books->links() }}
        </div>
    </div>
@forelse ($books as $book)
<div class="col-md-3 mb-3">
    <div class="card hover-shadow">
        <div class="card-img img-container">
            <img src="{{ asset('/images/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}">
        </div>
        <div class="card-body">
            <h5 class="card-title text-center text-dark font-weight-bold">{{ $book->title }}</h5>
            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $book->status ? 'Available' : 'Unavailable' }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $book->stock }}</p>
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
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            {{ $books->links() }}
        </div>
    </div>
</div>

@endsection