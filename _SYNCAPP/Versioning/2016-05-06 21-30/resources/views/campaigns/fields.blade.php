<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Planning' => 'Planning', 'Active' => 'Active', 'Inactive' => 'Inactive', 'Complete' => 'Complete', 'In-Queue' => 'In-Queue', 'Sending' => 'Sending'], null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['Telesales' => 'Telesales', 'Mail' => 'Mail', 'Email' => 'Email', 'Print' => 'Print', 'Web' => 'Web', 'Radio' => 'Radio', 'Television' => 'Television', 'Newsletter' => 'Newsletter'], null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('start_date', 'Start Date:') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    {!! Form::date('start_date', null, ['class' => 'form-control pull-right', 'id' => 'dpStartDate', 'type' => 'date']) !!}
    </div>
</div>

<!-- End Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('end_date', 'End Date:') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    {!! Form::date('end_date', null, ['class' => 'form-control pull-right', 'id' => 'dpEndDate', 'type' => 'date']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Budget Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget', 'Budget:') !!}
    {!! Form::text('budget', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::select('currency', ['P'=>'Peso', '$'=>'US Dollars'], null, ['class' => 'form-control']) !!}
</div>

<!-- Impressions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('impressions', 'Impressions:') !!}
    {!! Form::text('impressions', null, ['class' => 'form-control']) !!}
</div>

<!-- Actual Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actual_cost', 'Actual Cost:') !!}
    {{ Form::text('actual_cost', null , ['class'=>'form-control',  'money-mask'=>''] ) }}

</div>

<!-- Expected Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expected_cost', 'Expected Cost:') !!}
    {!! Form::text('expected_cost', null, ['class' => 'form-control', 'money-mask'=>'']) !!}
</div>

<!-- Expected Revenue Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expected_revenue', 'Expected Revenue:') !!}
    {!! Form::text('expected_revenue', null, ['class' => 'form-control', 'money-mask'=>'']) !!}
</div>

<!-- Objective Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('objective', 'Objective:') !!}
    {!! Form::textarea('objective', null, ['class' => 'form-control']) !!}
</div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('campaigns.index') !!}" class="btn btn-default">Cancel</a>
</div>

