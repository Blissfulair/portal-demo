@extends('layouts.app')

@section('content')
<div class="container mt-20">
<div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Available Classes</div>
        @if(count($classes) > 0)
        <div class="panel-body">

        </div>

        <!-- Table -->
        <table class="table">
            <tr>
                <th>Class</th>
                <th>Created By</th>
                <th>Date Created</th>
            </tr>
            @foreach($classes as $class)
            <tr>
                <td>{{ $class->class }}</td>
                <td>{{ $class->user_id }}</td>
                <td>{{ $class->created_at }}</td>
            </tr>
            @endforeach
        </table>
        @else
            <h5 class="text text-info">No Information about this school yet</h5>
        @endif
    </div>
</div>
@endsection