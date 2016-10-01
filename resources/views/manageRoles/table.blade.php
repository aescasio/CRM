<table class="table table-responsive" id="manageRoles-table">
    <thead>
        <th>Name</th>
        <th>Display Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($manageRoles as $manageRoles)
        <tr>
            <td>{!! $manageRoles->name !!}</td>
            <td>{!! $manageRoles->display_name !!}</td>
            <td>
                {!! Form::open(['route' => ['manageRoles.destroy', $manageRoles->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('manageRoles.show', [$manageRoles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('manageRoles.edit', [$manageRoles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete $manageRoles->name?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>