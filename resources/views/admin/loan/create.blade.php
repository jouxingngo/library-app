@extends("templates.app")
@section("title")
Add Loan
@endsection
@section('nav-active', 'table')
@section('head')
Add Loan
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

    <form action="{{ route('loan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>User</label>
            <select name="user_id" class="form-control">
                <option value="" disabled selected>--Select User--</option>
                @forelse ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @empty
                    <option value="" disabled>Books is empty</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label>Loan Date</label>
            <input class="form-control" type="text" readonly name="loan_date" value="{{ now()->format('Y-m-d H:i:s')}}" >
        </div>

        
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('loan.index') }}" class="btn btn-danger "><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-plus"></i></button>
        </div>
    </form>
@endsection