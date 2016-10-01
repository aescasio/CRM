<div class="box-body" xmlns="http://www.w3.org/1999/html">
    <!--  Form fields -->
    <div class="form-group">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Name:', ['class' => 'required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Website Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('website', 'Website:') !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </div>
                {!! Form::text('website', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Office Phone Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('office_phone', 'Office Phone:') !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                {!! Form::text('office_phone', null, ['class' => 'form-control', 'data-inputmask'=>'"mask": "999-9999"', 'data-mask']) !!}
            </div>
        </div>

        <!-- Office Fax Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('office_fax', 'Office Fax:') !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                {!! Form::text('office_fax', null, ['class' => 'form-control', 'data-inputmask'=>'"mask": "999-9999"', 'data-mask' => '']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Address</h3>
                    </div>
                    <div class="box-body">
                        <!-- START ACCORDION -->
                        <div class="box-group" id="accordion">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <div class="panel box">
                                <div class="box-header with-border">
                                    <h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion"
                                                             href="#billingaddress">Billing Address</a></h4>
                                </div>
                                <div id="billingaddress" class="panel-collapse collapse in">
                                    <!-- Body Content starts here -->
                                    <div class="box-body">

                                        <!-- Billing Street Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('billing_street', 'Billing Street:') !!}
                                            {!! Form::textarea('billing_street', null, ['class' => 'form-control']) !!}

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
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header with-border">
                                    <h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion"
                                                             href="#shippingaddress">Shipping Address</a></h4>
                                </div>
                                <div id="shippingaddress" class="panel-collapse collapse">
                                    <div class="box-body">

                                        <!-- Same Ass Billing Field -->
                                        <div class="form-group col-sm-12">
                                            <div class="checkbox">
                                                {!! Form::hidden('same_as_billing', 0, false) !!}
                                                {!! Form::checkbox('same_as_billing', 1, true) !!}
                                            </div>
                                            {!! Form::label('same_address', 'Same as billing' ) !!}
                                        </div>

                                        <!-- Shipping Street Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('shipping_street', 'Shipping Street:') !!}
                                            {!! Form::textarea('shipping_street', null, ['class' => 'form-control', 'disabled' => true ]) !!}
                                        </div>

                                        <!-- Shipping City Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('shipping_city', 'Shipping City:') !!}
                                            {!! Form::text('shipping_city', null, ['class' => 'form-control', 'disabled' => true ]) !!}
                                        </div>

                                        <!-- Shipping State Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('shipping_state', 'Shipping State:') !!}
                                            {!! Form::text('shipping_state', null, ['class' => 'form-control', 'disabled' => true ]) !!}
                                        </div>

                                        <!-- Shipping Postal Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('shipping_postal', 'Shipping Postal:') !!}
                                            {!! Form::text('shipping_postal', null, ['class' => 'form-control', 'disabled' => true ]) !!}
                                        </div>

                                        <!-- Shipping Country Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('shipping_country', 'Shipping Country:') !!}
                                            {!! Form::text('shipping_country', null, ['class' => 'form-control', 'disabled' => true ]) !!}
                                        </div>
                                    </div><!-- End Box Body -->
                                </div><!-- End Panel Collapse -->
                            </div> <!-- End Panel Box -->
                        </div><!-- End Accordion -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Assigned To Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('assigned_to', 'Assigned To:', ['class'=>'required']) !!}
            {{ Form::select('assigned_to', $users_options, null, ['class' => 'combobox form-control' ,'autocomplete'=>'off']  ) }}
        </div>

        <!-- Annual Revenue Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('annual_revenue', 'Annual Revenue:') !!}
            {!! Form::text('annual_revenue', null, ['class' => 'form-control', 'money-mask'=>'']) !!}
        </div>

        <!-- Member Of Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('member_of', 'Member Of:') !!}
            {!! Form::text('member_of', null, ['class' => 'form-control']) !!}
        </div>


        <!-- Account Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('campaign_name', 'Campaign Name:') !!}
            <div class="input-group date">
                {!! Form::text('campaign_name', (!empty($account->Campaign->name) ? $account->Campaign->name : null), ['class' => 'form-control', 'id'=>'campaign_name']) !!}
                {!! Form::hidden('campaign_id', (!empty($account->Campaign->id) ? $account->Campaign->id : null)) !!}
                <div class="input-group-addon"><i class="fa fa-plus" id="find"></i></div>
            </div>
        </div>

        <!-- Employees Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('employees', 'Employees:') !!}
            {!! Form::text('employees', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Account type Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('account_type', 'Account Type:') !!}
            {!! Form::select('account_type', $account_type, null, ['class' => 'form-control']) !!}
        </div>

        <!-- Industry Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('industry_type', 'Industry Type:') !!}
            {{ Form::select('industry_type', $industry_type, null, ['class' => 'form-control']  ) }}
        </div>

    </div>
</div>

<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <div class="box-footer">
            <!-- Save and Cancel -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('accounts.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>

@include('modals.find')

<script>//This section is already yield in scripts, this is intentional for IDE code reformat only.
    @section('per_page_script')

        //trigger modal form
        $("#find").click(function () {
            var url = '{{ url('modalCampaigns') }}';
            $.get(url, function (data) {
                $('.modal-body').html(data);
            });

            $('#modalform').modal('show');
        });

        //trigger modal form
        $("#campaign_name").focus(function () {
            var url = '{{ url('modalCampaigns') }}';
            $.get(url, function (data) {
                $('.modal-body').html(data);
            });

            $('#modalform').modal('show');
        });

        //Get name of selected button
        $('.modal-body').on('click', 'button', function (e) {
            $('#modalform').modal('toggle');
            $('#campaign_name').val(this.value);

            $('input[name=campaign_id]').val(this.id);
        });

        //prevent modal form to reload page when pagination change page
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');

            $.get(url, function (data) {
                $('#table').html(data);
            });
        });

    @endsection
</script>