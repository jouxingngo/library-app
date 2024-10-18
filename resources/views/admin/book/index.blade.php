@extends('templates.app')
@section('title')
Admin - Book
@endsection
@section('nav-active', 'table')
@section('head')
Books Table
@endsection

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
    $("#books").DataTable();
  });
</script>
@endpush

@section('content')
<a href="{{ route('book.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Book</a>
<table id="books" class="table table-bordered">
    <thead>                  
      <tr>
        <th style="width: 10px">No</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Stock</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
        @forelse ($books as $book)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->category->name }}</td>
        <td>{{ $book->status ? "Available" : "Unavailable"}}</td>
        <td><img src="{{ asset('/images/'.$book->image) }}" width="100" alt="{{ $book->title }}"></td>
        <td>{{ $book->stock }}</td>
        <td>
            <form action="{{ route('book.destroy', $book->id) }}}}" method="POST">
                <a href="{{ route('book.show',$book->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method("DELETE")
                <button onclick="return confirm('Delete Book {{ $book->title }}?');" type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">No Books available</td>
    </tr>
      @endforelse
    </tbody>
  </table>
@endsection
