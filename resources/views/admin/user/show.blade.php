@extends('templates.app')
@section('title')
Admin - DashBoard
@endsection
@section('nav-active', 'table')
@section('head')
User Detail
@endsection


@section('content')
<a href="/user" class="btn mb-3 btn-primary"> Back to Users</a>
<table id="users" class="table table-bordered">
    <thead>                  
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->profile->age }}</td>
        <td>{{ $user->profile->phone }}</td>
        <td>{{ $user->profile->address }}</td>
      </tr>
      
    </tbody>
  </table>
@endsection
