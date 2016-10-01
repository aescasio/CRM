<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $calendar->id !!}</p>
</div>

<!-- Event Name Field -->
<div class="form-group">
    {!! Form::label('event_name', 'Event Name:') !!}
    <p>{!! $calendar->event_name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $calendar->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $calendar->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $calendar->updated_at !!}</p>
</div>

