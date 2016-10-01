<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $opportunities->name !!}</p>
</div>

<!-- Account Name Field -->
<div class="form-group">
    {!! Form::label('account_name', 'Account Name:') !!}
    <p>{!! $opportunities->Account->name !!}</p>
</div>

<!-- Currency Field -->
<div class="form-group">
    {!! Form::label('currency', 'Currency:') !!}
    <p>{!! $opportunities->currency !!}</p>
</div>

<!-- Closed Date Field -->
<div class="form-group">
    {!! Form::label('closed_date', 'Closed Date:') !!}
    <p>{!! $opportunities->closed_date !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!!  number_format($opportunities->amount,2,'.',',') !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $opportunities->type !!}</p>
</div>

<!-- Sales Stage Field -->
<div class="form-group">
    {!! Form::label('sales_stage', 'Sales Stage:') !!}
    <p>{!! $opportunities->sales_stage !!}</p>
</div>

<!-- Lead Source Field -->
<div class="form-group">
    {!! Form::label('lead_source', 'Lead Source:') !!}
    <p>{!! $opportunities->lead_source !!}</p>
</div>

<!-- Probability Field -->
<div class="form-group">
    {!! Form::label('probability', 'Probability:') !!}
    <p>{!! $opportunities->probability !!}</p>
</div>

<!-- Campaign Field -->
<div class="form-group">
    {!! Form::label('campaign', 'Campaign:') !!}
    <p>{!! $opportunities->Campaign['name'] !!}</p>
</div>

<!-- Next Step Field -->
<div class="form-group">
    {!! Form::label('next_step', 'Next Step:') !!}
    <p>{!! $opportunities->next_step !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $opportunities->description !!}</p>
</div>

<!-- Assigned To Field -->
<div class="form-group">
    {!! Form::label('assigned_to', 'Assigned To:') !!}
    <p>{!! $opportunities->User->full_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $opportunities->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $opportunities->updated_at !!}</p>
</div>

