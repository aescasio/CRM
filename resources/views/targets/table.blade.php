<table class="table table-responsive" id="targets-table">
    <thead>
        <th>#</th>
        <th>Target Name</th>
        <th>Company Name</th>
        <th>Address</th>
        <th>Contact Office</th>
        <th>Contact Mobile</th>
        <th>Contact Fax</th>
        <th>Assigned To</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($targets as $target)
        <tr>
            <td>{!! $i++ !!}</td>
            <td>{!! $target->salutation.' '.$target->first_name.' '.$target->last_name !!}</td>
            <td>{!! $target->company_name !!}</td>
            <td>{!! $target->primary_city.' '.$target->primary_state.' '.$target->primary_postal.' '.$target->primary_country !!}</td>
            <td>{!! $target->contact_office !!}</td>
            <td>{!! $target->contact_mobile !!}</td>
            <td>{!! $target->contact_fax !!}</td>
            <td>{!! $target->User->full_name !!}</td>

            <td>
                {!! Form::open(['route' => ['targets.destroy', $target->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('targets.show', [$target->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('targets.edit', [$target->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>