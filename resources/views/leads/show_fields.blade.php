<!-- Salutation Field -->
<div class="form-group">
    {!! Form::label('salutation', 'Salutation:') !!}
    <p>{!! $lead->salutation !!}</p>
</div>

<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'Full Name:') !!}
    <p>{!! $lead->first_name.' '.$lead->last_name !!}</p>
</div>

<!-- Office Phone Field -->
<div class="form-group">
    {!! Form::label('office_phone', 'Office Phone:') !!}
    <p>{!! $lead->office_phone !!}</p>
</div>

<!-- Position Field -->
<div class="form-group">
    {!! Form::label('position', 'Position:') !!}
    <p>{!! $lead->position !!}</p>
</div>

<!-- Mobile Field -->
<div class="form-group">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{!! $lead->mobile !!}</p>
</div>

<!-- Department Field -->
<div class="form-group">
    {!! Form::label('department', 'Department:') !!}
    <p>{!! $lead->department !!}</p>
</div>

<!-- Fax Field -->
<div class="form-group">
    {!! Form::label('fax', 'Fax:') !!}
    <p>{!! $lead->fax !!}</p>
</div>

<!-- Account Id Field -->
<div class="form-group">
    {!! Form::label('company_name', 'Account Name:') !!}
    <p>{!! $lead->company_name !!}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{!! $lead->website !!}</p>
</div>

<!-- Street Field -->
<div class="form-group">
    {!! Form::label('street', 'Address:') !!}
    <p>{!! $lead->primary_street.', '.$lead->primary_city.', '. $lead->primary_state.', '.$lead->primary_country.', '.$lead->primary_postal !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $lead->description !!}</p>
</div>

<!-- Assigned To Field -->
<div class="form-group">
    {!! Form::label('assigned_to', 'Assigned To:') !!}
    <p>{!! $lead->AssignedTo->full_name !!}</p>
</div>

<!-- Email Address Field -->
<div class="form-group">
    {!! Form::label('email_address', 'Email Address:') !!}
    <p>{!! $lead->email_address !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $lead->description !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $lead->status !!}</p>
</div>

<!-- Status Description Field -->
<div class="form-group">
    {!! Form::label('status_remarks', 'Status Remarks:') !!}
    <p>{!! $lead->status_remarks !!}</p>
</div>

<!-- Lead Source Id Field -->
<div class="form-group">
    {!! Form::label('lead_source_id', 'Lead Source:') !!}
    <p>{!! $lead->lead_source !!}</p>
</div>

<!-- Status Description Field -->
<div class="form-group">
    {!! Form::label('lead_source_remarks', 'Leadsource Remarks:') !!}
    <p>{!! $lead->lead_source_remarks !!}</p>
</div>

<!-- Opportunity Amount Field -->
<div class="form-group">
    {!! Form::label('opportunity_amount', 'Opportunity Amount:') !!}
    <p>{!! $lead->opportunity_amount !!}</p>
</div>

<!-- Referred By Field -->
<div class="form-group">
    {!! Form::label('referred_by', 'Referred By:') !!}
    <p>{!! $lead->referred_by !!}</p>
</div>

<!-- Campaing Id Field -->
<div class="form-group">
    {!! Form::label('campaing_id', 'Campaing Id:') !!}
    <p>{!! $lead->CampaignName['name'] !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $lead->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $lead->updated_at !!}</p>
</div>

