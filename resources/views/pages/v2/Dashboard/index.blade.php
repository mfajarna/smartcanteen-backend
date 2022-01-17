@extends('layouts.v2.app')

@section('title', 'Dashboard')

@section('title-content', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Smartcanteen</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="{{ asset('assets/images/users/avatar-6.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                                        </div>
                                        <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                                        <p class="text-muted mb-0 text-truncate"></p>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="pt-4">

                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="font-size-15">Last Login</h5>
                                                    <p class="text-muted mb-0">{{ $last_act }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="font-size-15">IP Address</h5>
                                                    <p class="text-muted mb-0">{{ $ip }}</p>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="{{ route('profile.show') }}" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>

@endsection
