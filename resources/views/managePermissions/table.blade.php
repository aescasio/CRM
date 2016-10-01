<table class="table table-responsive" id="managePermissions-table">
    <thead>
        <th>Name</th>
        <th>Display Name</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($managePermissions as $managePermissions)
        <tr>
            <td>{!! $managePermissions->name !!}</td>
            <td>{!! $managePermissions->display_name !!}</td>
            <td>{!! $managePermissions->description !!}</td>
            <td>
                {!! Form::open(['route' => ['managePermissions.destroy', $managePermissions->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('managePermissions.show', [$managePermissions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('managePermissions.edit', [$managePermissions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete $managePermissions->name?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>