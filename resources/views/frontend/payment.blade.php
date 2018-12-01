@extends('layouts.app')

@section('content')
<div class="container mt-20">
<div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">All Payments</div>
        <div class="panel-body">

        </div>

        <!-- Table -->
        @if($payments)
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Term</th>
                <th>Session</th>
                <th>Payment Status</th>
                <th>Date</th>
            </tr>
            @foreach($payments as $payment)
            <tr>
                <td><a href="{{ route('recipt', ['reciept_id'=> $payment->id]) }}">{{ $payment->user->student->name }}</a></td>
                <td><a href="{{ route('recipt', ['reciept_id'=> $payment->id]) }}">{{ $payment->user->student->email }}</a></td>
                <td><a href="{{ route('recipt', ['reciept_id'=> $payment->id]) }}">{{ Calendar::term($payment->term) }}</a></td>
                <td><a href="{{ route('recipt', ['reciept_id'=> $payment->id]) }}">{{ $payment->session }}</a></td>
                <td><a href="{{ route('recipt', ['reciept_id'=> $payment->id]) }}">{{ $payment->status == 1 ? 'Paid':'Not Paid' }}</a></td>
                <td><a href="{{ route('recipt', ['reciept_id'=> $payment->id]) }}">{{ $payment->created_at }}</a></td>
            </tr>
            @endforeach

        </table>
        @else
        @endif

    </div>
</div>
@endsection