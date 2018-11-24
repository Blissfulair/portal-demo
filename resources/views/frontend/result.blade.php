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
                    <p class="text-center ps">Payment slip </p>
                    <div class="col-md-2 col-md-offset-1">
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
                    <div class="col-md-10 col-md-offset-1">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <td class="text-left width-40">User ID</td>
                                <td class="text-left">{{ $profile->student_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Name</td>
                                <td class="text-left">{{ $profile->student->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Email</td>
                                <td class="text-left">{{ $profile->student->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Session</td>
                                <td class="text-left">{{ $profile->session }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Class</td>
                                <td class="text-left">SS 2</td>
                            </tr>
                            <tr>
                                <td class="text-left">Term</td>
                                <td class="text-left">{{ $term[$profile->term]}}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Totol Score</td>
                                <td class="text-left">{{ $profile->items->sum('t1') + $profile->items->sum('t2') + $profile->items->sum('score')}}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Position</td>
                                <td class="text-left">
                                    <?php $count = 1; ?>
                                    @foreach($positions as $num=>$position)
                                        @if($num == $profile->id)
                                            {{ $count == 1 ? $count.'ST' : ($count == 2 ? $count.'ND': ($count == 3? $count.'RD': $count.'TH')) }}
                                        @endif
                                        <?php $count++; ?>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-10 col-md-offset-1">
                    <table class="table table1 table-condensed">
                    <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Subject</th>
                                <th>First Test</th>
                                <th>Second Test</th>
                                <th>Exams</th>
                                <th>Total</th>
                                <th>Grade</th>
                                <th>Remark</th>
                                <th>Examiner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($profile)
                            @foreach($profile->items as $key=>$item)
                            <tr>
                                <td class="text-left">{{ ++$key}}</td>
                                <td class="text-left">{{ \App\Subject::find($item->subject_id)->subject }}</td>
                                <td class="text-left">{{ $item->t1 }}</td>
                                <td class="text-left">{{ $item->t2 }}</td>
                                <td class="text-left">{{ $item->score }}</td>
                                <td class="text-left">{{ $item->score + $item->t2 + $item->t1}}</td>
                                <td class="text-left">
                                    @if($item->score + $item->t2 + $item->t1 < 39)
                                        F
                                    @elseif($item->score + $item->t2 + $item->t1 >= 39 && $item->score + $item->t2 + $item->t1 <= 45)
                                        E
                                    @elseif($item->score + $item->t2 + $item->t1 > 45 && $item->score + $item->t2 + $item->t1 <= 49)
                                        D
                                    @elseif($item->score + $item->t2 + $item->t1 > 49 && $item->score + $item->t2 + $item->t1 <= 59)
                                        C
                                    @elseif($item->score + $item->t2 + $item->t1 > 59 && $item->score + $item->t2 + $item->t1 <= 69)
                                        B
                                    @elseif($item->score + $item->t2 + $item->t1 > 69)
                                        A
                                    @endif
                                </td>
                                <td class="text-left">
                                    @if($item->score + $item->t2 + $item->t1 < 39)
                                        Very Poor
                                    @elseif($item->score + $item->t2 + $item->t1 >= 39 && $item->score + $item->t2 + $item->t1 <= 45)
                                        Poor
                                    @elseif($item->score + $item->t2 + $item->t1 > 45 && $item->score + $item->t2 + $item->t1 <= 49)
                                        Good
                                    @elseif($item->score + $item->t2 + $item->t1 > 49 && $item->score + $item->t2 + $item->t1 <= 59)
                                        Very Good
                                    @elseif($item->score + $item->t2 + $item->t1 > 59 && $item->score + $item->t2 + $item->t1 <= 69)
                                        Merit
                                    @elseif($item->score + $item->t2 + $item->t1 > 69)
                                        Distinction
                                    @endif
                                </td>
                                <td class="text-left">J.p</td>
                            </tr>
                            @endforeach
                            @endif
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