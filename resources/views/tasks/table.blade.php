<table class="table table-responsive" id="tasks-table">
    <thead>
        <th>#</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Start Date</th>
        <th>Due Date</th>
        <th>Related To</th>
        <th>Related Result</th>
        <th>Contact Name</th>
        <th>Priority</th>
        <th>Assigned To</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{!! $i++ !!}</td>
            <td>{!! $task->subject !!}</td>
            <td>{!! $task->status !!}</td>
            <td>{!! $task->start_date !!}</td>
            <td>{!! $task->due_date !!}</td>
            <td>{!! ucwords(substr($task->related_to,0,-1)) !!}</td>
            <td>{!! $task->related_result !!}</td>
            <td>{!! $task->Contact['full_name'] !!}</td>
            <td>{!! $task->priority !!}</td>
            <td>{!! $task->User->full_name !!}</td>
            <td>
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>