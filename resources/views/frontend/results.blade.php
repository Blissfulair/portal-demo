@extends('layouts.app')

@section('content')
<div class="container mt-20">
<div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Information About This School</div>
        <div class="panel-body">

        </div>
        @if($results)
        <!-- Table -->
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Term</th>
                <th>Session</th>
                <th>Date</th>
                <th class="text-center">Action</th>
            </tr>
            @foreach($results as $result)
            <tr>
                <td><a href="">{{ $result->student->name }}</a></td>
                <td><a href="">SS 3</a></td>
                <td><a href="">{{ $result->term == 1 ?  'First' : 'Second' }}</a></td>
                <td><a href="">{{ $result->session }}</a></td>
                <td><a href="">{{ $result->created_at }}</a></td>
                <td class="text-center"><a href="{{ route('result', ['result_id'=>$result->id, 'term_id'=>$result->term]) }}"><i class="fa fa-eye"></i></a></td>
            </tr>
            @endforeach
        </table>
        @endif

    </div>
</div>
@endsection