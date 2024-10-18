@extends('templates.app')
@section('title')
Book - Category
@endsection
@section('nav-active', 'category')
@section('head')
Category List
@endsection
@section('content')
<!-- Pagination -->
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            {{ $categories->links() }}
        </div>
    </div>
</div>
<div class="row">
    @forelse ($categories as $category)
        <div class="col-md-3 mb-4">
            <div class="card hover-shadow shadow-sm">
                <div class="card-img img-container">
                <img src="{{ asset('/images-category/'.$category->image) }}"  alt="{{ $category->name }}" class="hover-zoom card-img-top">
            </div>
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">View Books</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <h3 class="text-center">No Categorie Available</h3>
        </div>
    @endforelse
</div>
<!-- Pagination -->
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            {{ $categories->links() }}
        </div>
    </div>
</div>

@endsection
