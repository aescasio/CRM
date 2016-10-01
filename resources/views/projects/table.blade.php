<table class="table table-responsive" id="projects-table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Status</th>
        <th>Priority</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Project Manager</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $i++ !!}</td>
            <td>{!! $project->name !!}</td>
            <td>{!! $project->status !!}</td>
            <td>{!! $project->priority !!}</td>
            <td>{!! date('m/d/Y',strtotime($project->start_date)) !!}</td>
            <td>{!! date('m/d/Y',strtotime($project->end_date)) !!}</td>
            <td>{!! $project->User->full_name !!}</td>
            <td>
                {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>