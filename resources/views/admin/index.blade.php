@extends('templates.app')
@section('title')
Admin - DashBoard
@endsection
@section('nav-active', 'admin')
@section('head')
Dashboard
@endsection
@section('content')

<!-- Page Heading -->

<!-- Content Row -->
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('book.index') }}" class="text-decoration-none text-dark">
            <div class="card border-left-primary hover-shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Books</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Books</div>
                            <p class="lead ">Total: {{ $bookCount }}</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('category.index') }}" class="text-decoration-none text-dark">
            <div class="card border-left-success hover-shadow  h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Categories</div>
                            <p class="lead ">Total: {{ $categoryCount }}</p>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('user.index') }}" class="text-decoration-none text-dark">
            <div class="card border-left-info hover-shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Users</div>
                            <p class="lead ">Total: {{ $userCount }}</p>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('loan.index') }}" class="text-decoration-none text-dark">
            <div class="card border-left-warning hover-shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Loans</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Loans</div>
                            <p class=" mb-1">Total: {{ $totalLoanCount }}</p>
                            <p class="lead ">Active: {{ $loanCount }}</p>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>
@endsection
