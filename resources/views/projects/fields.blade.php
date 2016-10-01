<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Name:', ['class'=>'required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Status Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', ['Draft' => 'Draft', 'In Review' => 'In Review', 'Underway' => 'Underway', 'On Hold' => 'On Hold', 'Completed' => 'Completed'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Priority Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('priority', 'Priority:') !!}
            {!! Form::select('priority', ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Start Date Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('start_date', 'Start Date:', ['class'=>'required']) !!}
            {!! Form::date('start_date', isset($project->start_date) ? $project->start_date: null, ['class' => 'form-control']) !!}
        </div>

        <!-- End Date Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('end_date', 'End Date:', ['class'=>'required']) !!}
            {!! Form::date('end_date', isset($project->start_date) ? $project->end_date: null, ['class' => 'form-control']) !!}
        </div>

        <!-- Notes Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('notes', 'Notes:') !!}
            {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Project Manager Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('project_manager', 'Project Manager:') !!}
            {!! Form::select('project_manager', (isset($users) ? $users : null), null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>