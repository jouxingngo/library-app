@extends("templates.app")
@section("title")
Edit User
@endsection
@section('nav-active', 'table')
@section('head')
Profile - {{ $user->name }}
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
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("Put")
        <div class="form-group">
        <label>Name</label>
        <input type="text" value="{{ $user->name }}" name="name" class="form-control" >
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="email" value="{{ $user->email }}" name="email" class="form-control" >
        </div>
        <div class="form-group">
        <label>password</label>
        <input type="text"  placeholder="Leave blank to keep current password" name="password" class="form-control" >
        </div>
        <div class="form-group">
        <label>Phone</label>
        <input type="text" value="{{ $user->profile->phone }}" name="phone" class="form-control" >
        </div>
        <div class="form-group">
        <label>Age</label>
        <input type="text" value="{{ $user->profile->phone }}" name="age" class="form-control" >
        </div>
        <div class="form-group">
        <label>Address</label>
        <input type="text" value="{{ $user->profile->address }}" name="address" class="form-control" >
        </div>

    
        
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('user.index') }}" class="btn btn-danger "><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-plus"></i></button>
        </div>
    </form>
@endsection