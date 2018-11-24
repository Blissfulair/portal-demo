@extends('layouts.app')
@section('content')
<div class="container mt-20">
<div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">All Sessions and Terms</div>
        @if(count($slots) > 0)
        <div class="panel-body">

        </div>

        <!-- Table -->
        <table class="table">
            <tr>
                <th>Session</th>
                <th>Term</th>
                <th>Term Start</th>
                <th>Term End</th>
            </tr>
            @foreach($slots as $slot)
            <tr>
                <td>{{ $slot->session }}</td>
                <td>{{ $slot->term }}</td>
                <td>{{ $slot->term_start }}</td>
                <td>{{ $slot->term_end }}</td>
            </tr>
            @endforeach
        </table>
        @else
            <h5 class="text text-info">No Information about this school yet</h5>
        @endif
    </div>
</div>
@endsection