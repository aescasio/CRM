<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{!! $call->subject !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $call->status !!}</p>
</div>

<!-- Status2 Field -->
<div class="form-group">
    {!! Form::label('status2', 'Status2:') !!}
    <p>{!! $call->status2 !!}</p>
</div>

<!-- Date Time Field -->
<div class="form-group">
    {!! Form::label('date_time', 'Date Time:') !!}
    <p>{!! $call->date_time !!}</p>
</div>

<!-- Related To Field -->
<div class="form-group">
    {!! Form::label('related_to', 'Related To:') !!}
    <p>{!! ucwords($call->related_to) !!}</p>
</div>

<!-- Related Results Field -->
<div class="form-group">
    {!! Form::label('related_results', 'Related Results:') !!}
    <p>{!! $related_results_dummy !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $call->description !!}</p>
</div>

<!-- Assigned To Field -->
<div class="form-group">
    {!! Form::label('assigned_to', 'Assigned To:') !!}
    <p>{!! $call->User->full_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $call->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $call->updated_at !!}</p>
</div>

