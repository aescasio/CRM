<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <!-- Salutation Field -->
        <div class="form-group col-sm-1">
            {!! Form::label('salutation', 'Salutation:') !!}
            {!! Form::select('salutation', ['Mr' => 'Mr', 'Ms' => 'Ms', 'Mrs' => 'Mrs', 'Dr' => 'Dr', 'Prof' => 'Prof'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- First Name Field -->
        <div class="form-group col-sm-5">
            {!! Form::label('first_name', 'First Name:', ['class' => 'required']) !!}
            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Lastname Field -->
        <div class="form-group col-sm-5">
            {!! Form::label('last_name', 'Lastname:', ['class' => 'required']) !!}
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Position Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('position', 'Position:') !!}
            {!! Form::text('position', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Office Phone Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('office_phone', 'Office Phone:') !!}
            {!! Form::text('office_phone', null, ['class' => 'form-control','data-inputmask'=>'"mask": "(999)999-9999"', 'data-mask']) !!}
        </div>

        <!-- Mobile Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('mobile', 'Mobile:') !!}
            {!! Form::text('mobile', null, ['class' => 'form-control','data-inputmask'=>'"mask": "(9999) 999-9999"', 'data-mask']) !!}
        </div>

        <!-- Fax Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('fax', 'Fax:') !!}
            {!! Form::text('fax', null, ['class' => 'form-control','data-inputmask'=>'"mask": "(999)999-9999"', 'data-mask']) !!}
        </div>

        <!-- Account Id Field --> <!-- Should be account name not ID-->
        <div class="form-group col-sm-6">
            {!! Form::label('company_name', 'Company Name:') !!}
            {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Department Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('department', 'Department:') !!}
            {!! Form::text('department', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Website Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('website', 'Website: "e.g: http://"', ['class' => 'required']) !!}
            {!! Form::text('website', null , ['class' => 'form-control']) !!}
        </div>

        <!-- Email Address Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('email_address', 'Email Address:') !!}
            {!! Form::text('email_address', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-6">
            <!-- Status Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('status', 'Status:') !!}
                {!! Form::select('status', ['New' => 'New', 'Assigned' => 'Assigned', 'In Process' => 'In Process', 'Converted' => 'Converted', 'Recycled' => 'Recycled', ' Dead' => ' Dead'], null, ['class' => 'form-control']) !!}
            </div>

            <!-- Status Description Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('status_remarks', 'Status Remarks:') !!}
                {!! Form::textarea('status_remarks', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group col-sm-6">
            <!-- Lead Source Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('lead_source', 'Lead Source:') !!}
                {!! Form::select('lead_source', $lead_source, null, ['class' => 'form-control']) !!}
            </div>

            <!-- Status Description Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('status_remarks', 'Lead Source Remarks:') !!}
                {!! Form::textarea('lead_source_remarks', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">

        <!-- START ACCORDION -->
        <div class="box-group" id="accordion">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#moreInfo">More Information</a>
                    </h4>
                </div>
                <div id="moreInfo" class="panel-collapse collapse">
                    <!-- Body Content starts here -->
                    <div class="box-body">
                        <div class="form-group col-sm-6">

                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_address', 'Primary Address') !!}
                            </div>

                            <!-- Street Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_street', 'Street:', ['class' => 'required']) !!}
                                {!! Form::text('primary_street', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- City Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_city', 'City:', ['class' => 'required']) !!}
                                {!! Form::text('primary_city', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- State Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_state', 'State:', ['class' => 'required']) !!}
                                {!! Form::text('primary_state', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Postal Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_postal', 'Postal:', ['class' => 'required']) !!}
                                {!! Form::text('primary_postal', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Country Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_country', 'Country:', ['class' => 'required']) !!}
                                {!! Form::text('primary_country', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-6">

                            <div class="form-group checkbox-inline">
                                <div class="form-group col-sm-12">
                                    {!! Form::hidden('same_address', false) !!}
                                    {!! Form::checkbox('same_address', 1, true ) !!}
                                    {!! Form::label('same_address', 'Secondary Address:(Same)' ) !!}
                                </div>
                            </div>

                            <!-- Street Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_street', 'Street:') !!}
                                {!! Form::text('secondary_street', null, ['class' => 'form-control', 'readonly' => true]) !!}
                            </div>

                            <!-- City Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_city', 'City:') !!}
                                {!! Form::text('secondary_city', null, ['class' => 'form-control', 'readonly' => true]) !!}
                            </div>

                            <!-- State Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_state', 'State:') !!}
                                {!! Form::text('secondary_state', null, ['class' => 'form-control', 'readonly' => true]) !!}
                            </div>

                            <!-- Postal Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_postal', 'Postal:') !!}
                                {!! Form::text('secondary_postal', null, ['class' => 'form-control', 'readonly' => true]) !!}
                            </div>

                            <!-- Country Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_country', 'Country:') !!}
                                {!! Form::text('secondary_country', null, ['class' => 'form-control', 'readonly' => true]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#other">Other</a>
                    </h4>
                </div>
                <div id="other" class="panel-collapse collapse">
                    <!-- Body Content starts here -->
                    <div class="box-body">

                        <!-- Opportunity Amount Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('opportunity_amount', 'Opportunity Amount:') !!}
                            {!! Form::text('opportunity_amount', (!empty($lead->opportunity_amount) ? number_format($lead->opportunity_amount,2,'.',',') : null) , ['class' => 'form-control', 'money-mask' ]) !!}
                        </div>

                        <!-- Referred By Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('referred_by', 'Referred By:') !!}
                            {!! Form::text('referred_by', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Campaign Id Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('campaign_id', 'Campaign Name:') !!}
                            <div class="input-group date">
                                {!! Form::text('campaign_name', ( !empty($lead->CampaignName->name) ? $lead->CampaignName->name : null), [ 'class' => 'form-control', 'id'=>'txtCampaign' ] ) !!}
                                <div class="input-group-addon"><i class="fa fa-plus" id="plsCampaign"></i></div>
                            </div>
                            {!! Form::hidden('campaign_id', (!empty($lead->CampaignName->id) ? $lead->CampaignName->id : null)) !!}
                        </div>

                        <!-- Assigned To Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('assigned_to', 'Assigned To:') !!}
                            {!! Form::select('assigned_to', (!empty($assigned_to) ? $assigned_to : null), null, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END ACCORDION -->
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('leads.index') !!}" class="btn btn-default">Cancel</a>
</div>

@include('modals.find')
<script>
    @section('per_page_script')

        $("[name='same_address']").on("change", function () {
        if (this.checked) {

            $("[name='secondary_street']").attr('readonly', true).val(null);
            $("[name='secondary_city']").attr('readonly',true).val(null);
            $("[name='secondary_state']").attr('readonly',true).val(null);
            $("[name='secondary_postal']").attr('readonly',true).val(null);
            $("[name='secondary_country']").attr('readonly',true).val(null);

        } else {
            $("[name='secondary_street']").prop('readonly', false);
            $("[name='secondary_city']").prop('readonly', false);
            $("[name='secondary_state']").prop('readonly', false);
            $("[name='secondary_postal']").prop('readonly', false);
            $("[name='secondary_country']").prop('readonly', false);
        }
    });

    //get all value of text value of campaign name
    oldCampaignName = '';
    $("#txtCampaign").focus(function ()
    {
        oldCampaignName =  this.value;
    });
    //Change the value to 0 on focusout event since campaign were not coming from campaign table
    $("#txtCampaign").focusout(function ()
    {
        if(oldCampaignName != this.value){
            $('input[name=campaign_id]').val('0');
        }
    });

    //trigger modal form Campaigns
    $('#plsCampaign').click(function(){
        var url = '{{ url('modalCampaigns') }}';
        $.get(url, function (data)
        {
            $('.modal-body').html(data);
        });

        $('#modalform').modal('show');
    });

    //Get name of selected campaign button
    $('.modal-body').on('click', 'button', function (e) {
        var id = this.id, value = this.value;
        $('#modalform').modal('toggle');
        $('#txtCampaign').val(this.value);
        $('#campaign_id').val(this.id);
    });

    $('body').on('click', '.pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.get(url, function (data) {
            $('#table').html(data);
        });
    });

    @endsection
</script>