@extends("templates.app")
@section("title")
Edit Loan
@endsection
@section('nav-active', 'table')
@section('head')
Edit Loan
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

    <form action="{{ route('loan.update',$loan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label>User</label>
            <select name="user_id" class="form-control">
                <option value="" disabled selected>--Select User--</option>
                @forelse ($users as $user)
                    <option value="{{ $user->id }}" @selected($loan->user_id == $user->id)>{{ $user->name }}</option>
                @empty
                    <option value="" disabled>Users is empty</option>
                    
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label>Book</label>
            <select name="book_id" class="form-control">
                <option value="" disabled selected>--Select Book--</option>
                @forelse ($books as $book)
                    <option value="{{ $book->id }}" @selected($loan->book_id == $book->id)>{{ $book->title }}</option>
                @empty
                    <option value="" disabled>Books is empty</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="loan_date">Loan Date</label>
            <input type="datetime-local" name="loan_date" id="loan_date" class="form-control" value="{{ $loan->loan_date }}" required>
        </div>

        <div class="form-group">
            <label for="return_date">Return Date</label>
            <input type="datetime-local" name="return_date" id="return_date" class="form-control" value="{{ $loan->return_date ?? '' }}">
        </div>
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('loan.index') }}" class="btn btn-danger "><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-plus"></i></button>
        </div>
    </form>
@endsection