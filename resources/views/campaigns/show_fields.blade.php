<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $campaign->name !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $campaign->status !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $campaign->type !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{!! $campaign->start_date !!}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{!! $campaign->end_date !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $campaign->description !!}</p>
</div>

<!-- Assigned To Field -->
<div class="form-group">
    {!! Form::label('assigned_to', 'Assigned To:') !!}
    <p>{!! $campaign->frmUser->full_name !!}</p>
</div>

<!-- Budget Field -->
<div class="form-group">
    {!! Form::label('budget', 'Budget:') !!}
    <p>{!! number_format($campaign->budget,2) !!}</p>
</div>

<!-- Currency Field -->
<div class="form-group">
    {!! Form::label('currency', 'Currency:') !!}
    <p>{!! $campaign->currency !!}</p>
</div>

<!-- Impressions Field -->
<div class="form-group">
    {!! Form::label('impressions', 'Impressions:') !!}
    <p>{!! $campaign->impressions !!}</p>
</div>

<!-- Actual Cost Field -->
<div class="form-group">
    {!! Form::label('actual_cost', 'Actual Cost:') !!}
    <p>{!! number_format($campaign->actual_cost,2)  !!}</p>
</div>

<!-- Expected Cost Field -->
<div class="form-group">
    {!! Form::label('expected_cost', 'Expected Cost:') !!}
    <p>{!! number_format($campaign->expected_cost,2) !!}</p>
</div>

<!-- Expected Revenue Field -->
<div class="form-group">
    {!! Form::label('expected_revenue', 'Expected Revenue:') !!}
    <p>{!! number_format($campaign->expected_revenue,2) !!}</p>
</div>

<!-- Objective Field -->
<div class="form-group">
    {!! Form::label('objective', 'Objective:') !!}
    <p>{!! $campaign->objective !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $campaign->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $campaign->updated_at !!}</p>
</div>

