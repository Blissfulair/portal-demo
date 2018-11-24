@extends('layouts.app')

@section('content')
    <section class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-10 col-md-offset-1">
                @include('includes.messages')
                </div>
            </div>
        </div>
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
        <form action="{{ route('biodata') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="hidden" name="filename" value="{{ $profile? $profile->filename : ''}}">
            <input type="file" name="passport" class="hide" id="passport">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
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
                    <div class="col-md-5 col-md-offset-1">
                        <input id="sex" type="text" class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" name="sex" value="{{ $profile? $profile->sex : old('sex') }}">

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
                    <div class="col-md-5 col-md-offset-1">
                        <input id="dob" type="text" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ $profile? $profile->dob : old('dob') }}">

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
                    <label for="genotype" class="col-sm-4 col-form-label text-md-right">{{ __('Genotype') }}</label>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <input id="genotype" type="text" class="form-control{{ $errors->has('genotype') ? ' is-invalid' : '' }}" name="genotype" value="{{ $profile? $profile->genotype : old('genotype') }}">

                        @if ($errors->has('genotype'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('genotype') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="blood_group" class="col-sm-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <input id="blood_group" type="text" class="form-control{{ $errors->has('blood_group') ? ' is-invalid' : '' }}" name="blood_group" value="{{ $profile? $profile->blood_group : old('blood_group') }}">

                        @if ($errors->has('blood_group'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('blood_group') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            {{ $new == true ? __('Save') : __('Update')  }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection