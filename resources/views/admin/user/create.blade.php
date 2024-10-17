@extends("templates.app")
@section("title")
Add User
@endsection
@section('nav-active', 'table')
@section('head')
User
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
    <form action="/user" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" >
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" >
        </div>
  <!-- Password -->
<div class="form-group mt-4">
    <label for="password">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
    @if($errors->has('password'))
        <div class="text-danger mt-2">
            {{ $errors->first('password') }}
        </div>
    @endif
</div>

<!-- Confirm Password -->
<div class="form-group mt-4">
    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
    <input id="password_confirmation" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
    @if($errors->has('password_confirmation'))
        <div class="text-danger mt-2">
            {{ $errors->first('password_confirmation') }}
        </div>
    @endif
</div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" >
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" name="age" class="form-control" >
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" >
        </div>

        <div class="d-flex justify-content-between">
            <a href="/category" class="btn btn-danger "><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-plus"></i></button>
        </div>
    </form>
@endsection