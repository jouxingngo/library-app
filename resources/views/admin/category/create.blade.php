@extends("templates.app")
@section("title")
Add Category
@endsection
@section('nav-active', 'table')
@section('head')
Category
@endsection

@section("content")
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/category" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="name" class="form-control" >
        </div>

        <div class="form-group">
            @error('image')
                <div class="alert-danger alert">{{ $message }}</div>
            @enderror
                <label class="">Image</label>
            <input type="file" name="image" class="p-1 form-control" >
        </div>
        
        <div class="d-flex justify-content-between">
            <a href="/category" class="btn btn-danger "><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-plus"></i></button>
        </div>
    </form>
@endsection