@extends('layouts.app')

@section('content')
<div class="container mt-20">
<div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">All results</div>
        <div class="panel-body">
            <form action="#" method="post">
                <div class="form-group">
                    <select name="search" id="resultSearch" class="form-control">
                        <option value="">Select By Class</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        @if($results)
        <!-- Table -->
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Term</th>
                <th>Session</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-center">Action</th>
            </tr>
            @foreach($results as $result)
            <tr>
                <td><a href="">{{ $result->student->name }}</a></td>
                <td><a href="">{{ Classes::class_name($result->class_id) }}</a></td>
                <td><a href="">{{ Calendar::term($result->term) }}</a></td>
                <td><a href="">{{ $result->session }}</a></td>
                <td><a href="{{ route('approve_results', ['result_id'=>$result->id]) }}">{{ $result->status == 0 ? 'Unapproved' : ($result->status == 1 ? 'Approved' : 'Disapproved') }}</a></td>
                <td><a href="">{{ $result->created_at }}</a></td>
                <td class="text-center"><a href="{{ route('result', ['result_id'=>$result->id, 'term_id'=>$result->term, 'class_id'=>$result->class_id]) }}"><i class="fa fa-eye"></i></a></td>
            </tr>
            @endforeach
        </table>
        <br>
        <?php $url = explode('/', Request::getPathInfo()); ?>
        @if($url[1] == 'search_route')
        <a class="btn btn-success pull-right" href="{{ route('best_students', ['class_id'=>$url[2]]) }}">Publish Term Results</a>
        <br>
        @endif
        @endif
        {{ $results->links() }}

    </div>
</div>
<script>
var searchbtn = document.querySelector('#resultSearch');
if(searchbtn != null){
    searchbtn.addEventListener('change', function(event){
        var classNum =  event.target.value;
    //     $.ajax({
    //         method: 'post',
    //         url: searchRoute,
    //         data: {
    //             _token: token,
    //             classNum: classNum
    //         }
    //     }).done(function(response){
    //         console.log(response)
    //     })
    var searchRoute = '/search_route/' + classNum;
        window.location.href = searchRoute;
    });
}
</script>
@endsection