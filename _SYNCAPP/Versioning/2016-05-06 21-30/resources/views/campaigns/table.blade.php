<table class="table table-striped">

    <thead>
        <th> # </th>
        <th>Name</th>
        <th>Status</th>
        <th>Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Description</th>
        <th>Assigned To</th>
        <th>Budget</th>
        <th>Currency</th>
        <th>Impressions</th>
        <th>Actual Cost</th>
        <th>Expected Cost</th>
        <th>Expected Revenue</th>
        <th>Objective</th>
        <th colspan="3">Action</th>
    </thead>

    <tbody>
    @foreach($campaigns as $campaign)
        <tr>
            <td> {{ $counter++ }} </td>
            <td>{!! $campaign->name !!}</td>
            <td>{!! $campaign->status !!}</td>
            <td>{!! $campaign->type !!}</td>
            <td>{!! $campaign->start_date !!}</td>
            <td>{!! $campaign->end_date !!}</td>
            <td>{!! $campaign->description !!}</td>
            <td>{!! $campaign->assigned_to !!}</td>
            <td>{!! $campaign->budget !!}</td>
            <td>{!! $campaign->currency !!}</td>
            <td>{!! $campaign->impressions !!}</td>
            <td>{!! $campaign->actual_cost !!}</td>
            <td>{!! $campaign->expected_cost !!}</td>
            <td>{!! $campaign->expected_revenue !!}</td>
            <td>{!! $campaign->objective !!}</td>
            <td>
                {!! Form::open(['route' => ['campaigns.destroy', $campaign->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('campaigns.show', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('campaigns.edit', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>