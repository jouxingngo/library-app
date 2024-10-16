@extends('templates.app')

@section('title')
Book
@endsection

@section('nav-active', 'book')



@section('head')
All Books
@endsection

@section('content')

<div class="row mb-3">
    <div class="col-md-12">
        <form action="{{ route('books.index') }}" method="GET" class="input-group">
            <input type="text" id="search" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Search books..." >
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <a href="{{ route('books.index') }}" class="btn btn-success "><i class="fas fa-undo"></i></a>
            </div>
        </form>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            {{ $books->links() }}
        </div>
    </div>
</div>

<div class="row" id="book-list">
    
    @foreach($books as $book)
    <div class="col-md-3 mb-3 book-item">
        <div class="card shadow-sm">
            <img src="{{ asset('/images/'.$book->image) }}" class="card-img-top img-fluid w-100" height="100px" alt="{{ $book->title }}">
            <div class="card-body">
                <h5 class="card-title text-dark font-weight-bold text-center">{{ $book->title }}</h5>
                <p class="card-text"><strong>Category:</strong> <a href="/category/{{ $book->category->id }}">{{ $book->category->name }}</a></p>
                <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $book->status ? "Available" : "Unavailable" }}</p>
                <a href="{{ route('book.show', $book->id) }}" class="btn btn-info">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            {{ $books->links() }}
        </div>
    </div>
</div>


@endsection

