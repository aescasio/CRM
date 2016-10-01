<table class="table table-responsive" id="meetings-table">
    <thead>
        <th>#</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Related To</th>
        <th>Related Result</th>
        <th>Location</th>
        <th>Assigned To</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($meetings as $meeting)
        <tr>
            <td>{!! $i++ !!}</td>
            <td>{!! $meeting->subject !!}</td>
            <td>{!! $meeting->status !!}</td>
            <td>{!! date('m/d/Y h:i A',strtotime($meeting->start_date)) !!}</td>
            <td>{!! date('m/d/Y h:i A',strtotime($meeting->end_date)) !!}</td>
            <td>{!! ucwords(substr($meeting->related_to,0,-1)) !!}</td>
            <td>{!! $meeting->related_result !!}</td>
            <td>{!! $meeting->location !!}</td>
            <td>{!! $meeting->User->full_name !!}</td>
            <td>
                {!! Form::open(['route' => ['meetings.destroy', $meeting->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('meetings.show', [$meeting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('meetings.edit', [$meeting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>