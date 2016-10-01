<table class="table table-responsive" id="opportunities-table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Account Name</th>
        <th>Closed Date</th>
        <th>Amount</th>

        <th>Sales Stage</th>
        <th>Lead Source</th>
        <th>Probability</th>
        <th>Campaign</th>
        <th>Assigned To</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($opportunities as $opportunities)
        <tr>
            <td>{!! $counter !!}</td>
            <td>{!! $opportunities->name !!}</td>
            <td>{!! $opportunities->Account->name !!}</td>
            <td>{!! $opportunities->closed_date !!}</td>
            <td>{!! number_format($opportunities->amount,2) !!}</td>

            <td>{!! $opportunities->sales_stage !!}</td>
            <td>{!! $opportunities->lead_source !!}</td>
            <td>{!! $opportunities->probability.' %' !!}</td>
            <td>{!! $opportunities->Campaign['name'] !!}</td>
            <td>{!! $opportunities->User->full_name !!}</td>
            <td>
                {!! Form::open(['route' => ['opportunities.destroy', $opportunities->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('opportunities.show', [$opportunities->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('opportunities.edit', [$opportunities->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>