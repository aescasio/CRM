<table class="table table-responsive" id="calls-table">
    <thead>
        <th>#</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Status2</th>
        <th>Date Time</th>
        <th>Related To</th>
        <th>Related Results</th>
        <th>Description</th>
        <th>Assigned To</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($calls as $call)

        <tr>
            <td>{!! $i++ !!}</td>
            <td>{!! $call->subject !!}</td>
            <td>{!! $call->status !!}</td>
            <td>{!! $call->status2 !!}</td>
            <td>{!! $call->date_time !!}</td>
            <td>{!! ucwords($call->related_to) !!}</td>

            @if($call->related_to == 'accounts')
                <td>{!! $call->Account->name !!}</td>
            @elseif($call->related_to == 'contacts')
                <td>{!! $call->Contact->full_name !!}</td>
            @elseif($call->related_to == 'leads')
                <td>{!! $call->Lead->first_name.' '.$call->Lead->last_name !!}</td>
            @elseif($call->related_to == 'opportunities')
                <td>{!! $call->Opportunities->name!!}</td>
            @elseif($call->related_to == 'projects')
                <td>{!! $call->Project->name!!}</td>
            @elseif($call->related_to == 'targets')
                <td>{!! $call->Target->salutation.'. '.$call->Target->first_name.' '.$call->Target->last_name !!}</td>
            @elseif($call->related_to == 'tasks')
                <td>{!! $call->Task->subject !!}</td>
            @endif

            <td>{!! $call->description !!}</td>
            <td>{!! $call->User->full_name !!}</td>
            <td>
                {!! Form::open(['route' => ['calls.destroy', $call->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('calls.show', [$call->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('calls.edit', [$call->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
