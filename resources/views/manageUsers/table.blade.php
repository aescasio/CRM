<table class="table table-responsive" id="manageUsers-table">
    <thead>
        <th>First Name</th>
        <th>Middle Initial</th>
        <th>Last Name</th>
        <th>Email</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($manageUsers as $manageUser)
        <tr>
            <td>{!! $manageUser->first_name !!}</td>
            <td>{!! $manageUser->middle_initial !!}</td>
            <td>{!! $manageUser->last_name !!}</td>
            <td>{!! $manageUser->email !!}</td>
            <td>
                {!! Form::open(['route' => ['manageUsers.destroy', $manageUser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('manageUsers.show', [$manageUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('manageUsers.edit', [$manageUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {{--<a href="{!! route('managePermissions.edit', [$manageUser->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-fw fa-group"></i></a>--}}

                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete $manageUser->username?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>