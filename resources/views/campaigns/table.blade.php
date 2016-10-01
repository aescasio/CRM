<table class="table table-striped">

    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Status</th>
        <th>Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <!-- <th>Description</th> -->
        <th>Assigned To</th>
        <!--<th>Budget</th>
        <th>Currency</th>
        <th>Impressions</th>
        <th>Actual Cost</th>
        <th>Expected Cost</th>
        <th>Expected Revenue</th>
        <th>Objective</th> -->
        <th> Date Created</th>
        <th colspan="3">Actions</th>
    </thead>

    <tbody>
    @foreach($campaigns as $campaign)
        <tr>
            <td>{!! $i++ !!}</td>
            <td>{!! $campaign->name !!}</td>
            <td>{!! $campaign->status !!}</td>
            <td>{!! $campaign->type !!}</td>
            <td>{!! date_format($campaign->start_date,'Y-d-m')  !!}</td>
            <td>{!! date_format($campaign->end_date,'Y-d-m') !!}</td>

            <td>{!! $campaign->frmUser->full_name !!}</td>
            <td> {{ $campaign->created_at }}</td>
            <!--<td>{!! number_format($campaign->budget,2,".",",") !!}</td>
            <td>{!! $campaign->currency !!}</td>
            <td>{!! $campaign->impressions !!}</td>
            <td>{!! number_format($campaign->actual_cost ,2,".",",")!!}</td>
            <td>{!! number_format($campaign->expected_cost ,2,".",",")  !!}</td>
            <td>{!! number_format($campaign->expected_revenue ,2,".",",")  !!}</td>
            -->
            <td>
                {!! Form::open(['route' => ['campaigns.destroy', $campaign->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('campaigns.show', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('campaigns.edit', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete $campaign->name?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>