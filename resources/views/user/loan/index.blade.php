@extends('templates.app')

@section('title')
@foreach ($loans as $loan)
{{ $loan->user->name }} - Loan
@endforeach
@endsection

@section('nav-active', 'loan')

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
        $("#loans").DataTable({
            "lengthMenu": [5, 10, 25, 50],
            "language": {
                "emptyTable": "No loans available",
            }
        });
    });
</script>
@endpush

@section('head')
My Loan
@endsection

@section('content')
<div class="container">
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


    <table id="loans" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Book</th>
                <th>Loan Date</th>
                <th>Return Date</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $loan->book->title }}</td>
                    <td>{{ $loan->loan_date}}</td>
                    <td>
                        @if(is_null($loan->return_date))
                            <span class="text-danger">Not Returned</span>
                        @else
                            {{ $loan->return_date }}
                        @endif
                    </td>
                    <td><a class="btn btn-info" href="{{ route('loan.show',$loan->id) }}">Show</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No loans available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
