<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $manageUser->first_name !!}</p>
</div>

<!-- Middle Initial Field -->
<div class="form-group">
    {!! Form::label('middle_initial', 'Middle Initial:') !!}
    <p>{!! $manageUser->middle_initial !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $manageUser->last_name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $manageUser->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $manageUser->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $manageUser->updated_at !!}</p>
</div>

