<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Website Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('website', 'Website:') !!}
            {!! Form::text('website', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Office Phone Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('office_phone', 'Office Phone:') !!}
            {!! Form::text('office_phone', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Office Fax Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('office_fax', 'Office Fax:') !!}
            {!! Form::text('office_fax', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Biling Address Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('biling_address', 'Biling Address:') !!}
            {!! Form::text('biling_address', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Billing Street Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('billing_street', 'Billing Street:') !!}
            {!! Form::text('billing_street', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Billing City Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('billing_city', 'Billing City:') !!}
            {!! Form::text('billing_city', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Billing State Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('billing_state', 'Billing State:') !!}
            {!! Form::text('billing_state', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Billing Postal Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('billing_postal', 'Billing Postal:') !!}
            {!! Form::text('billing_postal', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Billing Country Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('billing_country', 'Billing Country:') !!}
            {!! Form::text('billing_country', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Assigned To Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('assigned_to', 'Assigned To:') !!}
            {{ Form::select('assigned_to', $users_options, null, ['class' => 'form-control']  ) }}

        </div>

        <!-- Same Ass Billing Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('same_as_billing', 'Same As Billing:') !!}
            <label class="checkbox-inline">
                {!! Form::hidden('same_as_billing', false) !!}
                {!! Form::checkbox('same_as_billing', 1, null) !!}
            </label>
        </div>

        <!-- Annual Revenue Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('annual_revenue', 'Annual Revenue:') !!}
            {!! Form::text('annual_revenue', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Member Of Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('member_of', 'Member Of:') !!}
            {!! Form::text('member_of', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Campaign Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('campaign_name', 'Campaign Name:') !!}
            {!! Form::text('campaign_name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Employee Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('employee_id', 'Employee Id:') !!}
            {!! Form::select('employee_id', $users_options, null, ['class' => 'form-control']) !!}
        </div>

        <!-- TODO: client_id and industry_id dynamically
             Done: 04.13.16
        -->
        <!-- Client Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('client_id', 'Client Id:') !!}
            {!! Form::select('client_id', $clienttype_options, null, ['class' => 'form-control']) !!}
        </div>

        <!-- Industry Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('industry_id', 'Industry Id:') !!}
            {{ Form::select('industry_id', $industry_options, null, ['class' => 'form-control']  ) }}
        </div>
    </div>

</div>
<div class="box-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientTypes.index') !!}" class="btn btn-default">Cancel</a>
</div>
