@extends('layouts.app')

@section('content')
    <div class="container mt-20">
            @if($profile)
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2 col-md-offset-2">
                            <div class="admin-logo">
                                    <img src="{{ route('photo', ['filename' => $profile->filename]) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
                                <td class="text-left">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Email</td>
                                <td class="text-left">{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
    </div>
@endsection