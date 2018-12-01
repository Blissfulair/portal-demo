@extends('layouts.app')

@section('content')
    <section class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-4">
                    <div class="panel panel-primary">
                            <div class="panel-heading">Edit Student's Record</div>
                            <div class="panel-body">
                                    <form action="{{ route('user_update') }}" method="post">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" >
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                                </div>
                                <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control" id="role">
                                    <option value="">Select</option>
                                        <option @if($user->role == Role::STUDENT) selected @endif value="0">Student</option>
                                        <option @if($user->role == Role::TEACHER) selected @endif value="1">Teacher</option>
                                        <option @if($user->role == Role::HOD) selected @endif value="2">Head of Department</option>
                                        <option @if($user->role == Role::PRINCIPAL) selected @endif value="3">Head of School</option>
                                    </select>
                                </div>
                                @if($user->role == Role::TEACHER || $user->role == Role::HOD)
                                <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                                    <label for="subject">subject</label>
                                    <select name="subject[]" class="form-control" id="subject" multiple="true">
                                    <option value="">Select</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <label for="password">Password</label>
                                    <input type="password" name="npassword" id="password" class="form-control">
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <input type="hidden" name="password" value="{{ $user->password }}">
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