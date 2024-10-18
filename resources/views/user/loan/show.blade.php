@extends('templates.app')
@section('title')
Loan - {{ $loan->book->title }}
@endsection
@section('nav-active', 'loan')
@section('head')
Loan Detail
@endsection
@section('content')
<div class="container">
    <a href="{{ route('loan.index') }}" class="btn btn-primary mb-3">Back to Loans</a>

    <div class="card">
        <div class="row">
            <div class="col-md-6">
                    @if($loan->book->image)
                        <img src="{{ asset('/images/'.$loan->book->image) }}" alt="{{ $loan->book->title }}" class="img-fluid w-75">
                    @endif
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Loan Information</h5>
                    <p><strong>User ID:</strong> {{ $loan->user_id }}</p>
                    <p><strong>Book ID:</strong> {{ $loan->book_id }}</p>
                    <p><strong>User Name:</strong> {{ $loan->user->name }}</p>
                    <p><strong>Book Title:</strong> {{ $loan->book->title }}</p>
                
                    <p><strong>Loan Date:</strong> {{ $loan->loan_date }}</p>
                    <p><strong>Return Date:</strong> 
                        @if(is_null($loan->return_date))
                            <span class="text-danger">Not Returned</span>
                        @else
                            {{ $loan->return_date }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
      
       
    </div>

</div>
@endsection
