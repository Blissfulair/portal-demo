@extends('layouts.app')

@section('content')
    <div class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                            <div class="panel-heading">Register A New Teacher</div>
                            <div class="panel-body">
                                    <form action="{{ route('signup_new') }}" method="post">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ Request::old('name')}}" >
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email')}}">
                                </div>
                                <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                                    <label for="subject">Subject</label>
                                    <select name="subject" id="subject" class="form-control">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" value="{{ Request::old('password')}}">
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input type="hidden" name="type" value="1">
                                <button type="submit" class="btn btn-primary" >Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection