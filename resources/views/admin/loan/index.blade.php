@extends('templates.app')
@section('title')
Admin - Loan
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
    $("#loans").DataTable();
  });

  function confirmReturn() {
        return confirm('Are you sure you want to return this book?');
    }
</script>
@endpush

@section('head')
Loans Table
@endsection
@section('content')
<a href="{{ route('loan.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Loan</a>
<table id="loans" class="table table-bordered">
    <thead>                  
      <tr>
        <th style="width: 10px">No</th>
        <th>User</th>
        <th>Book</th>
        <th>Loan Date</th>
        <th>Return Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @forelse ($loans as $loan )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $loan->user->name }}</td>
          <td>{{ $loan->book->title }}</td>
          <td>{{ $loan->loan_date }}</td>
            <td>
              @if(is_null($loan->return_date))
                  <form action="{{ route('loan.return', $loan->id) }}" method="POST" onsubmit="return confirmReturn()" style="display: inline;">
                      @csrf
                      <button type="submit" class="btn btn-secondary">Return</button>
                  </form>
              @else
                  {{ $loan->return_date }}
              @endif
          </td>
          
          <td>
              <form action="{{ route('loan.destroy',$loan->id) }}" method="POST">
                  <a href="{{ route('loan.show',$loan->id) }}" class="btn btn-info btn-sm">Detail</a>
                  <a href="{{ route('loan.edit',$loan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  @csrf
                  @method("DELETE")
                  <button onclick="return confirm('Delete Loan {{ $loan->name }}?');" type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
          </td>
        
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center">No loans available</td>
      </tr>
        @endforelse
     
    </tbody>
  </table>
@endsection