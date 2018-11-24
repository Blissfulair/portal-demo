@extends('layouts.app')

@section('content')
    <section class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-4">
                    <div class="panel panel-primary">
                            <div class="panel-heading">Register A New Student</div>
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
                                <div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
                                    <label for="class">Class Admitted Into</label>
                                    <select name="class" id="class" class="form-control">
                                        <option value="">Select Class</option>
                                        <option value="1">JSS 1</option>
                                        <option value="2">JSS 2</option>
                                        <option value="3">JSS 3</option>
                                        <option value="4">SS 1</option>
                                        <option value="5">SS 2</option>
                                        <option value="6">SS 3</option>
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" value="{{ Request::old('password')}}">
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input type="hidden" name="type" value="0">
                                <button type="submit" class="btn btn-primary" >Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection