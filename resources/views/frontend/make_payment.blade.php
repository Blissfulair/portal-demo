@extends('layouts.app')

@section('content')
    <div class="container mt-20">
        <form action="{{ route('make_payment') }}" method="post">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Fees') }}</label>
                    </div>
                    <div class="col-md-5">
                        <select name="fees" id="fees" class="form-control">
                            <option value="">Select</option>
                            <option value="1">School Fees</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Payer\'s Name') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>
                    </div>
                    <div class="col-md-5">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            {{ __('Submit')  }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection