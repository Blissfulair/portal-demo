@extends('layouts.app')

@section('content')
    <section class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <label for="logoa">
                <div class="col-md-2 col-md-offset-10 admin-logo">
                    @if($profile)
                   <img src="{{ route('photo', ['filename' => $profile->filename]) }}" alt="">
                   @endif
                </div>
                </label>
            </div>
        </div>
        <div class="row mt-10">
            <div class="col-md-12">
                <div class="col-md-5 col-md-offset-1">
                    <a href="{{ route('student') }}" class="btn btn-success btn-block btn-lg">
                        {{ __('Students') }}
                    </a>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <a href="{{ route('teacher')  }}" class="btn btn-warning btn-block btn-lg">
                        {{ __('Teachers') }}
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ route('admin_create') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="file" name="logo" class="hide" id="logoa">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="about_us" class="col-sm-4 col-form-label text-md-right">{{ __('About Us') }}</label>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <textarea id="about_us"  class="form-control{{ $errors->has('about_us') ? ' is-invalid' : '' }}" rows="10" cols="30" name="about_us">{{ $profile ? $profile->about_us: old('about_us') }}</textarea>

                        @if ($errors->has('about_us'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('about_us') }}</strong>
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
                    <div class="col-md-5 col-md-offset-1">
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
                    <div class="col-md-5 col-md-offset-1">
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $profile? $profile->phone : old('phone') }}">

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="facebook" class="col-sm-4 col-form-label text-md-right">{{ __('Facebook') }}</label>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <input id="facebook" type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ $profile ? $profile->facebook : old('facebook') }}">

                        @if ($errors->has('facebook'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="twitter" class="col-sm-4 col-form-label text-md-right">{{ __('Twitter') }}</label>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <input id="twitter" type="text" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ $profile? $profile->twitter: old('twitter') }}">

                        @if ($errors->has('twitter'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('twitter') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="gplus" class="col-sm-4 col-form-label text-md-right">{{ __('Google Plus') }}</label>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <input id="gplus" type="text" class="form-control{{ $errors->has('gplus') ? ' is-invalid' : '' }}" name="gplus" value="{{ $profile? $profile->gplus : old('gplus') }}">

                        @if ($errors->has('gplus'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gplus') }}</strong>
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
    </section>
@endsection