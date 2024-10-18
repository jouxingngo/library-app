@extends("templates.app")
@section("title")
Add Book
@endsection
@section('nav-active', 'table')
@section('head')
Book
@endsection
@section("content")

    <form action="{{ route('book.update',$book->id) }}" method="POST" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            @error('title')
            <div class="alert-danger alert">{{ $message }}</div>
        @enderror
        <label>Book Title</label>
        <input type="text" name="title" value="{{ $book->title }}" class="form-control" >
        </div>

        <div class="form-group">
            @error('author')
                <div class="alert-danger alert">{{ $message }}</div>
            @enderror
            <label>Book Author</label>
            <input type="text" name="author" value="{{ $book->author }}" class="form-control" >
        </div>

        <div class="form-group">
            @error('category_id')
                <div class="alert-danger alert">{{ $message }}</div>
            @enderror
            <label class="">Category</label>
        <select name="category_id" class="form-control" id="">
            <option value="" disabled selected>--Choose Category--</option>
            @forelse ($categories as $category)
                <option @selected($book->category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
            @empty
                <option disabled>Category is empty</option>
            @endforelse
        </select>
        
        <div class="form-group mt-3">
            @error('description')
                <div class="alert-danger alert">{{ $message }}</div>
            @enderror
            <label>Description</label>
            <textarea class="form-control" name="description"">{{ $book->description }}</textarea>
        </div>

        <div class="form-group">
            @error('image')
                <div class="alert-danger alert">{{ $message }}</div>
            @enderror
                <label class="">Image</label>
            <input type="file" name="image" class="p-1 form-control" >
        </div>
      
        </div>

        <div class="form-group">
            @error('stock')
                <div class="alert-danger alert">{{ $message }}</div>
            @enderror
            <label class="">Stock</label>
            <input type="number" name="stock" value="{{ $book->stock }}" class="form-control" >
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('book.index') }}" class="btn btn-danger "><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-plus"></i></button>
        </div>
    </form>
@endsection