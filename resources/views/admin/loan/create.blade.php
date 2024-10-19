@extends("templates.app")
@section("title")
Add Loan
@endsection
@section('nav-active', 'table')
@push('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

@endpush
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').select2({
            placeholder: '--Select--',
            allowClear: true
        });
    });
</script>

@endpush
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
            <select name="user_id" class="form-control select2">
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
            <select name="book_id" class="form-control select2">
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