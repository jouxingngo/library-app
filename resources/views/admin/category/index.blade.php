@extends('templates.app')
@section('title')
Admin - DashBoard
@endsection
@section('nav-active', 'table')


@push('style')
<!-- DataTables CSS via CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>
@endpush

@push('script')
<!-- jQuery via CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS via CDN -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
    $("#categories").DataTable();
  });
</script>
@endpush

@section('head')
Categories Table
@endsection
@section('content')
<a href="category/create" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Category</a>
<table id="categories" class="table table-bordered">
    <thead>                  
      <tr>
        <th style="width: 10px">No</th>
        <th>Category Name</th>
        <th>Image</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @forelse ($categories as $category )
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td><img src="{{ asset('/images-category/'.$category->image) }}" width="100" alt=""></td>
        
        <td>
            <form action="/category/{{ $category->id }}" method="POST">
                <a href="/category/{{ $category->id }}" class="btn btn-info btn-sm">Detail</a>
                <a href="/category/{{ $category->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method("DELETE")
                <button onclick="return confirm('Delete Category {{ $category->name }}?');" type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
       
      </tr>
      @empty
            <h3>Category is Empty</h3>
      @endforelse
     
    </tbody>
  </table>
@endsection