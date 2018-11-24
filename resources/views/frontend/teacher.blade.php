@extends('layouts.app')

@section('content')
    <div class="container mt-20">
        <form action="{{ route('biodata') }}" method="post">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $profile? $profile->name : old('name') }}">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="sex" class="col-sm-4 col-form-label text-md-right">{{ __('Sex') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="sex" name="sex" type="text" class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" sex="sex" value="{{ $profile? $profile->sex : old('sex') }}">

                        @if ($errors->has('sex'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sex') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="dob" class="col-sm-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="dob" name="dob" type="text" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" dob="dob" value="{{ $profile? $profile->dob : old('dob') }}">

                        @if ($errors->has('dob'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $profile? $profile->email : old('email') }}">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="phone" name="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $profile? $profile->phone : old('phone') }}">

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection