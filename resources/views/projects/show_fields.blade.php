<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $project->name !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $project->status !!}</p>
</div>

<!-- Priority Field -->
<div class="form-group">
    {!! Form::label('priority', 'Priority:') !!}
    <p>{!! $project->priority !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{!! date('m/d/Y',strtotime($project->start_date)) !!}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{!! date('m/d/Y',strtotime($project->end_date)) !!}</p>
</div>

<!-- Project Manager Field -->
<div class="form-group">
    {!! Form::label('project_manager', 'Project Manager:') !!}
    <p>{!! $project->User->full_name !!}</p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{!! $project->notes !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $project->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $project->updated_at !!}</p>
</div>

