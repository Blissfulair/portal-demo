@extends('layouts.app')

@section('content')
    <div class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                            <div class="panel-heading">Add A New Term</div>
                            <div class="panel-body">
                                    <form action="{{ route('calander_create') }}" method="post">
                                <div class="form-group {{ $errors->has('session') ? 'has-error' : ''}}">
                                    <label for="session">Session</label>
                                    <input type="text" name="session" id="session" class="form-control" value="{{ Request::old('session')}}" >
                                </div>
                                <div class="form-group {{ $errors->has('term') ? 'has-error' : ''}}">
                                    <label for="term">Term</label>
                                    <select name="term" id="term" class="form-control">
                                        <option value="">Select Term</option>
                                        <option value="1">First Term</option>
                                        <option value="2">Second Term</option>
                                        <option value="3">Third Term</option>
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('term_start') ? 'has-error' : ''}}">
                                    <label for="term_start">Term Starting Date</label>
                                    <input type="date" name="term_start" id="term_start" class="form-control" value="{{ Request::old('term_start')}}">
                                </div>
                                <div class="form-group {{ $errors->has('term_end') ? 'has-error' : ''}}">
                                    <label for="term_end">Term Ending Date</label>
                                    <input type="date" name="term_end" id="term_end" class="form-control" value="{{ Request::old('term_end')}}">
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success" >Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection