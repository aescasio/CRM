<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $account->name !!}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{!! $account->website !!}</p>
</div>

<!-- Office Phone Field -->
<div class="form-group">
    {!! Form::label('office_phone', 'Office Phone:') !!}
    <p>{!! $account->office_phone !!}</p>
</div>

<!-- Office Fax Field -->
<div class="form-group">
    {!! Form::label('office_fax', 'Office Fax:') !!}
    <p>{!! $account->office_fax !!}</p>
</div>

<!-- Biling Address Field -->
<div class="form-group">
    {!! Form::label('biling_address', 'Biling Address:') !!}
    <p>{!! $account->biling_address !!}</p>
</div>

<!-- Billing Street Field -->
<div class="form-group">
    {!! Form::label('billing_street', 'Billing Street:') !!}
    <p>{!! $account->billing_street !!}</p>
</div>

<!-- Billing City Field -->
<div class="form-group">
    {!! Form::label('billing_city', 'Billing City:') !!}
    <p>{!! $account->billing_city !!}</p>
</div>

<!-- Billing State Field -->
<div class="form-group">
    {!! Form::label('billing_state', 'Billing State:') !!}
    <p>{!! $account->billing_state !!}</p>
</div>

<!-- Billing Postal Field -->
<div class="form-group">
    {!! Form::label('billing_postal', 'Billing Postal:') !!}
    <p>{!! $account->billing_postal !!}</p>
</div>

<!-- Billing Country Field -->
<div class="form-group">
    {!! Form::label('billing_country', 'Billing Country:') !!}
    <p>{!! $account->billing_country !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $account->description !!}</p>
</div>

<!-- Assigned To Field -->
<div class="form-group">
    {!! Form::label('assigned_to', 'Assigned To:') !!}
    <p>{!! $account->User->full_name !!}</p>
</div>

<!-- Annual Revenue Field -->
<div class="form-group">
    {!! Form::label('annual_revenue', 'Annual Revenue:') !!}
    <p>{!! number_format($account->annual_revenue,2)  !!}</p>
</div>

<!-- Member Of Field -->
<div class="form-group">
    {!! Form::label('member_of', 'Member Of:') !!}
    <p>{!! $account->member_of !!}</p>
</div>

<!-- Campaign Name Field -->
<div class="form-group">
    {!! Form::label('campaign_name', 'Campaign Name:') !!}
    <p>{!! $account->Campaign['name'] !!}</p>
</div>

<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employees', 'Employees:') !!}
    <p>{!! $account->employees !!}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('account_type', 'Account Type:') !!}
    <p>{!! $account_type  !!}</p>
</div>

<!-- Industry Id Field -->
<div class="form-group">
    {!! Form::label('industry_type', 'Industry Type:') !!}
    <p>{!! $industry_type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $account->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $account->updated_at !!}</p>
</div>

