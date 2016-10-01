<!-- Username Field -->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    <p>{!! $profile->username !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $profile->email !!}</p>
</div>

<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $profile->first_name !!}</p>
</div>

<!-- Middle Initial Field -->
<div class="form-group">
    {!! Form::label('middle_initial', 'Middle Initial:') !!}
    <p>{!! $profile->middle_initial !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $profile->last_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $profile->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $profile->updated_at !!}</p>
</div>

