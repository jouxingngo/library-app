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
            <div class="card shadow-sm">
                <img src="{{ asset('/images-category/'.$category->image) }}"  alt="{{ $category->name }}" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">View Books</a>
                </div>
            </div>
        </div>
    @empty
    <tr>
        <td colspan="5" class="text-center">No Categories available</td>
    </tr>
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
