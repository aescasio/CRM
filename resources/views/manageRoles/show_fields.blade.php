<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $manageRoles->name !!}</p>
</div>

<!-- Display Name Field -->
<div class="form-group">
    {!! Form::label('display_name', 'Display Name:') !!}
    <p>{!! $manageRoles->display_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $manageRoles->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $manageRoles->updated_at !!}</p>
</div>

