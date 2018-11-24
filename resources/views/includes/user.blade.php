<div class="container mt-20">
<div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Information About This School</div>
        @if(count($slots) > 0)
        <div class="panel-body">

        </div>

        <!-- Table -->
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach($slots as $slot)
            <tr>
                <td>{{ $slot->name }}</td>
                <td>{{ $slot->email }}</td>
                <td>
                    <a href="{{ route('user_profile', ['user_id' => $slot->id]) }}"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('edit_user', ['user_id' => $slot->id]) }}"><i class="fa fa-edit"></i></a>
                    <a onclick="confirm('Are you sure you want to delete this user?')" href="{{ route('delete_user', ['user_id' => $slot->id]) }}" ><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        @else
            <h5 class="text text-info">No Information about this school yet</h5>
        @endif
    </div>
</div>