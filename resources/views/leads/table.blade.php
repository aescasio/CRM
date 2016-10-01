<table class="table table-striped">

    <thead>
        <th>#</th>
        <th>Salutation</th>
        <th>Fullname</th>
        <th>Position</th>
        <th>Department</th>
        <th>Company Name</th>
        <th>Assigned To</th>
        <th>Status</th>
        <th>Lead Source Id</th>
        <th>Referred By</th>
        <th>Campaign Id</th>
        <th colspan="3">Action</th>
    </thead>

    <tbody>
    @foreach($leads as $lead)
        <tr>
            <td>{!! $i++ !!}</td>
            <td>{!! $lead->salutation !!}</td>
            <td>{!! $lead->first_name.' '. $lead->last_name !!}</td>
            <td>{!! $lead->position !!}</td>
            <td>{!! $lead->department !!}</td>
            <td>{!! $lead->company_name !!}</td>
            <td>{!! $lead->AssignedTo->full_name !!}</td>
            <td>{!! $lead->status !!}</td>
            <td>{!! $lead->lead_source !!}</td>
            <td>{!! $lead->referred_by !!}</td>
            <td>{!! $lead->campaign_name !!}</td>
            <td>
                {!! Form::open(['route' => ['leads.destroy', $lead->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('leads.show', [$lead->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('leads.edit', [$lead->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete $lead->fullname?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>