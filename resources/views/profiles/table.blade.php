<table class="table table-responsive" id="profiles-table">
    <thead>
        <th>Email</th>
        <th>First Name</th>
        <th>Middle Initial</th>
        <th>Last Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($profiles as $profile)
        <tr>
            <td>{!! $profile->email !!}</td>
            <td>{!! $profile->first_name !!}</td>
            <td>{!! $profile->middle_initial !!}</td>
            <td>{!! $profile->last_name !!}</td>
            <td>
                {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('profiles.show', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('profiles.edit', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>