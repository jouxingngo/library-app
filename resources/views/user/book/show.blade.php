@extends('templates.app')
@section('title')
Book Detail
@endsection
@section('nav-active', 'book')
@push('script')
<script>
    function toggleDescription(bookId) {
        const shortDesc = document.getElementById(`descriptionShort${bookId}`);
        const fullDesc = document.getElementById(`descriptionFull${bookId}`);
        const toggleLink = document.getElementById(`toggleLink${bookId}`);
        
        if (fullDesc.classList.contains('collapse')) {
            fullDesc.classList.remove('collapse');
            shortDesc.style.display = 'none';
            toggleLink.innerText = 'Read less';
        } else {
            fullDesc.classList.add('collapse');
            shortDesc.style.display = 'inline'; 
            toggleLink.innerText = 'Read Full Overview'; 
        }
    }
</script>
    
@endpush
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
                <p class="card-text"><strong>Status:</strong> {{ $book->status ? "Available" : "Unavailable" }}</p>
                <p class="card-text"><strong>Stock:</strong> {{ $book->stock }}</p>    
                <p class="card-text">
                    <strong>Description:</strong>
                    <span id="descriptionShort{{ $book->id }}">{{ Str::limit($book->description, 100) }}</span>
                    @if (strlen($book->description) > 100)
                        <span id="descriptionFull{{ $book->id }}" class="collapse">{{ $book->description }}</span>
                        <a href="#" class="text-primary" 
                           id="toggleLink{{ $book->id }}" 
                           onclick="toggleDescription('{{ $book->id }}'); return false;">
                           Read Full Overview
                        </a>
                    @endif
                </p>
                
                   
            </div>
        </div>
    </div>   
</div>


@endsection