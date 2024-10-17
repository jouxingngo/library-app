@extends('templates.app')
@section('title')
Admin - DashBoard
@endsection
@section('nav-active', 'table')
@section('head')
Users Table
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
    $("#users").DataTable();
  });
</script>
@endpush

@section('content')
<a href="user/create" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add User</a>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table id="users" class="table table-bordered">
    <thead>                  
      <tr>
        <th style="width: 10px">No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        
        <td>
            <form action="/user/{{ $user->id }}" method="POST">
                <a href="/user/{{ $user->id }}" class="btn btn-info btn-sm">Detail</a>
                <a href="/user/{{ $user->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method("DELETE")
                <button onclick="return confirm('Delete User {{ $user->name }}?');" type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
      </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center"><h3>Book is Empty</h3></td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
