@extends('layouts.app')

@section('content')
    <div class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                            <div class="panel-heading">Score A Student</div>
                            <div class="panel-body">
                                    <form action="{{ route('score') }}" method="post">
                                    <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                                    <label for="subject">Subject</label>
                                    <select name="subject" id="subject" class="form-control">
                                        <option value="">Select subject</option>
                                        @foreach($teacher->items as $item)
                                             <option value="{{ $item->subject_id }}">{{ $item->subject->subject }}</option>
                                        @endforeach
                                    </select>
                                    <label for="student">Student</label>
                                    <select name="student" id="student" class="form-control">
                                        <option value="">Select Student</option>
                                        @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('first_test') ? 'has-error' : ''}}">
                                    <label for="first_test">First Test</label>
                                    <input type="text" name="first_test" id="first_test" class="form-control" value="{{ Request::old('first_test')}}" >
                                </div>
                                <div class="form-group {{ $errors->has('second_test') ? 'has-error' : ''}}">
                                    <label for="second_test">Second Test</label>
                                    <input type="text" name="second_test" id="second_test" class="form-control" value="{{ Request::old('second_test')}}">
                                </div>
                                <div class="form-group {{ $errors->has('exam') ? 'has-error' : ''}}">
                                    <label for="exam">Exam</label>
                                    <input type="text" name="exam" id="exam" class="form-control" value="{{ Request::old('exam')}}">
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