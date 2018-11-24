@extends('layouts.app')

@section('content')
    <section class="container mt-20">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-4">
                    <div class="panel panel-primary">
                            <div class="panel-heading">Create A Subject</div>
                            <div class="panel-body">
                                    <form action="{{ route('save_subject') }}" method="post">
                                <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control" >
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-primary" >Add Subject</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection