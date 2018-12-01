@extends('layouts.app')

@section('content')
    <div class="container mt-20">
        <div class="row border">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2 col-md-offset-5">
                        <div class="admin-logo">
                            @if($setting)
                                <img src="{{ route('photo', ['filename' => $setting->filename]) }}" alt="school logo">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="title text-center school-name">Word of Truth Group of Schools</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="text-center ps">Payment slip {{$payment->payment_id}}</p>
                    <div class="col-md-2 col-md-offset-2">
                        <div class="admin-logo">
                        @if($profile)
                    <img src="{{ route('photo', ['filename' => $profile->student->filename]) }}" alt="">
                    @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-md-12">
                    <div class="col-md-10 col-md-offset-2">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <td class="text-left width-40">User ID</td>
                                <td class="text-left">Eng122299</td>
                            </tr>
                            <tr>
                                <td class="text-left">Name</td>
                                <td class="text-left">{{ $payment->user->student->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Email</td>
                                <td class="text-left">{{ $payment->user->student->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Term</td>
                                <td class="text-left">{{ Calendar::term($payment->term) }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Session</td>
                                <td class="text-left">{{ $payment->session }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Class</td>
                                <td class="text-left">{{ $classes[$payment->user->student->class ] }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Phone Number</td>
                                <td class="text-left">{{ $payment->user->student->phone }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Payment Status</td>
                                <td class="text-left">{{ $payment->status == 1 ? 'Paid':'Not Paid' }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Date of Payment</td>
                                <td class="text-left">{{ date('d/m/Y', strtotime($payment->created_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-md-12">
                    <div class="col-md-2 col-md-offset-9">
                    <button class="btn btn-primary">PRINT</button>
                    </div>
                </div>
            </div>
    </div>
@endsection