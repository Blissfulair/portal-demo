@extends('layouts.app')

@section('content')
    <div class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                            <div class="panel-heading">Create A New Class</div>
                            <div class="panel-body">
                                    <form action="{{ route('class_create') }}" method="post">
                                <div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
                                    <label for="class">Class Name</label>
                                    <input type="text" name="class" class="form-control" placeholder="e.g JSS One, Primay One, SS One" >
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
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