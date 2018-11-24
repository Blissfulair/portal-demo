@extends('layouts.app')

@section('content')
    <div class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <label for="passport">
                <div class="col-md-2 col-md-offset-10 admin-logo">
                    @if($profile)
                   <img src="{{ route('photo', ['filename' => $profile->filename]) }}" alt="">
                   @endif
                </div>
                </label>
            </div>
        </div>
        <form action="{{ route('change_password') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="file" name="passport" class="hide" id="passport">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $profile? $profile->name : old('name') }}">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="user_id" class="col-sm-4 col-form-label text-md-right">{{ __('User ID') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id">

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $profile? $profile->email : old('email') }}">

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="password" class="col-sm-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="new_password" class="col-sm-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password">

                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            {{ __('Change Password')  }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection