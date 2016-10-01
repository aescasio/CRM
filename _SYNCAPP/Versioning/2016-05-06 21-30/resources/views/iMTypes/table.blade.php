<table class="table table-striped">

    <thead>
        <th> # </th>
        <th>Name</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </thead>

    <tbody>
    @foreach($iMTypes as $iMType)
        <tr>
            <td> {{ $counter++ }} </td>
            <td>{!! $iMType->name !!}</td>
            <td>{!! $iMType->description !!}</td>
            <td>
                {!! Form::open(['route' => ['iMTypes.destroy', $iMType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('iMTypes.show', [$iMType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('iMTypes.edit', [$iMType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>