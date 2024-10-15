@extends('templates.app')
@section('title')
User - Home
@endsection
@section('head')
Welcome <b>{{ Auth::user()->name ?? '' }}</b>!
@endsection
@section('content')

@endsection