<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{!! $meeting->subject !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $meeting->status !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{!! $meeting->start_date !!}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{!! $meeting->end_date !!}</p>
</div>

<!-- Related To Field -->
<div class="form-group">
    {!! Form::label('related_to', 'Related To:') !!}
    <p>{!! ucwords(substr($meeting->related_to,0,-1)) !!}</p>
</div>

<!-- Related Result Field -->
<div class="form-group">
    {!! Form::label('related_result', 'Related Result:') !!}
    <p>{!! $meeting->related_result !!}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location', 'Location:') !!}
    <p>{!! $meeting->location !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $meeting->description !!}</p>
</div>

<!-- Assigned To Field -->
<div class="form-group">
    {!! Form::label('assigned_to', 'Assigned To:') !!}
    <p>{!! $meeting->user->full_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $meeting->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $meeting->updated_at !!}</p>
</div>

