<table class="table table-striped">

    <thead>
        <th> # </th>
        <th>Name</th>
        <th>Website</th>
        <th>Office Phone</th>
        <th>Office Fax</th>
        <th>Assigned To</th>
        <th>Campaign Name</th>
        <th colspan="3">Action</th>
    </thead>

    <tbody>
       @foreach($accounts as $account)

        <tr>
            <td>{{ $counter++ }}</td>
            <td>{!! $account->name !!}</td>
            <td>{!! $account->website !!}</td>
            <td>{!! $account->office_phone !!}</td>
            <td>{!! $account->office_fax !!}</td>
            <td>{!! $account->frmUser->name !!}</td>
            <td>{!! $account->campaign_name !!}</td>
            <td>

                {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('accounts.show', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('accounts.edit', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>

        </tr>

    @endforeach
    </tbody>
</table>