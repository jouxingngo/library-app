@extends('templates.app')
@section('title')
User - Profile
@endsection
@push('style')
@endpush
@section('head')
Profile
@endsection


    @section('content')
    <div class="py-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
    
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
    
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
