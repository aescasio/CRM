<!-- Salutation Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $target->salutation.'. '.$target->first_name.' '.$target->last_name !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $target->title !!}</p>
</div>

<!-- Department Field -->
<div class="form-group">
    {!! Form::label('department', 'Department:') !!}
    <p>{!! $target->department !!}</p>
</div>

<!-- Account Id Field -->
<div class="form-group">
    {!! Form::label('account_id', 'Company Name:') !!}
    <p>{!! $target->company_name !!}</p>
</div>

<!-- Contact Office Field -->
<div class="form-group">
    {!! Form::label('contact_office', 'Contact Office:') !!}
    <p>{!! $target->contact_office !!}</p>
</div>

<!-- Contact Mobile Field -->
<div class="form-group">
    {!! Form::label('contact_mobile', 'Contact Mobile:') !!}
    <p>{!! $target->contact_mobile !!}</p>
</div>

<!-- Contact Fax Field -->
<div class="form-group">
    {!! Form::label('contact_fax', 'Contact Fax:') !!}
    <p>{!! $target->contact_fax !!}</p>
</div>

<!-- Primary City Field -->
<div class="form-group">
    {!! Form::label('primary_city', 'Primary City:') !!}
    <p>{!! $target->primary_city !!}</p>
</div>

<!-- Primary State Field -->
<div class="form-group">
    {!! Form::label('primary_state', 'Primary State:') !!}
    <p>{!! $target->primary_state !!}</p>
</div>

<!-- Primary Postal Field -->
<div class="form-group">
    {!! Form::label('primary_postal', 'Primary Postal:') !!}
    <p>{!! $target->primary_postal !!}</p>
</div>

<!-- Primary Country Field -->
<div class="form-group">
    {!! Form::label('primary_country', 'Primary Country:') !!}
    <p>{!! $target->primary_country !!}</p>
</div>

@if($target->same_address != 1)
<!-- Secondary City Field -->
<div class="form-group">
    {!! Form::label('secondary_city', 'Secondary City:') !!}
    <p>{!! $target->secondary_city !!}</p>
</div>

<!-- Secondary State Field -->
<div class="form-group">
    {!! Form::label('secondary_state', 'Secondary State:') !!}
    <p>{!! $target->secondary_state !!}</p>
</div>

<!-- Secondary Postal Field -->
<div class="form-group">
    {!! Form::label('secondary_postal', 'Secondary Postal:') !!}
    <p>{!! $target->secondary_postal !!}</p>
</div>

<!-- Secondary Country Field -->
<div class="form-group">
    {!! Form::label('secondary_country', 'Secondary Country:') !!}
    <p>{!! $target->secondary_country !!}</p>
</div>
@endif


<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $target->email !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $target->description !!}</p>
</div>

<!-- Assigned To Field -->
<div class="form-group">
    {!! Form::label('assigned_to', 'Assigned To:') !!}
    <p>{!! $target->User->full_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $target->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $target->updated_at !!}</p>
</div>

