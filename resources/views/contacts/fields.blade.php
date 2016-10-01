<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">

        <!-- START ACCORDION -->
        <div class="box-group" id="accordion">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#overview">Overview</a>
                    </h4>
                </div>
                <div id="overview" class="panel-collapse collapse in">
                    <!-- Body Content starts here -->
                    <div class="box-body">

                        <!-- Salutation Field -->
                        <div class="form-group col-sm-1">
                            {!! Form::label('salutation', 'Salutation:') !!}
                            {!! Form::select('salutation', ['Mr' => 'Mr', 'Ms' => 'Ms', 'Mrs' => 'Mrs', 'Dr' => 'Dr', 'Prof' => 'Prof'], null , ['class' => 'form-control']) !!}
                        </div>

                        <!-- First Name Field -->
                        <div class="form-group col-sm-5">
                            {!! Form::label('first_name', 'First Name:', ['class' => 'required']) !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control', ]) !!}
                        </div>

                        <!-- Middle Initials Field -->
                        <div class="form-group col-sm-1">
                            {!! Form::label('mi', 'M.I:') !!}
                            {!! Form::text('mi', null, ['class' => 'form-control']) !!}
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
                            {!! Form::label('office_phone', 'Office Phone:', ['class' => 'required']) !!}
                            {!! Form::text('office_phone', null, ['class' => 'form-control','data-inputmask'=>'"mask": "(999)999-9999"', 'data-mask']) !!}
                        </div>

                        <!-- Mobile Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('mobile', 'Mobile:') !!}
                            {!! Form::text('mobile', null, ['class' => 'form-control','data-inputmask'=>'"mask": "(9999)999-9999"', 'data-mask']) !!}
                        </div>

                        <!-- Fax Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('fax', 'Fax:') !!}
                            {!! Form::text('fax', null, ['class' => 'form-control','data-inputmask'=>'"mask": "(999)999-9999"', 'data-mask']) !!}
                        </div>

                        <!-- Account Name Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('account_name', 'Account Name:') !!}
                            <div class="input-group date">
                                {!! Form::text('account_name', (!empty($contact->Accounts->name) ? $contact->Accounts->name : null) , ['class' => 'form-control', 'id'=>'txtAccount']) !!}
                                <div class="input-group-addon"><i class="fa fa-plus" id="plsAccount"></i></div>
                                {!! Form::hidden('account_id', (!empty($contact->Accounts->id) ? $contact->Accounts->id : null)) !!}
                            </div>
                        </div>

                        <!-- Department Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('department', 'Department:') !!}
                            {!! Form::text('department', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Website Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('website', 'Website:') !!}
                            {!! Form::text('website', null, ['class' => 'form-control']) !!}
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

                        <!-- Street Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('primary_street', 'Street:') !!}
                            {!! Form::text('primary_street', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- City Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('primary_city', 'City:') !!}
                            {!! Form::text('primary_city', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- State Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('primary_state', 'State:') !!}
                            {!! Form::text('primary_state', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Postal Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('primary_postal', 'Postal:') !!}
                            {!! Form::text('primary_postal', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Country Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('primary_country', 'Country:') !!}
                            {!! Form::text('primary_country', null, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="panel box">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#moreInfo">More Information</a>
                    </h4>
                </div>
                <div id="moreInfo" class="panel-collapse collapse">
                    <!-- Body Content starts here -->
                    <div class="box-body">

                        <div class="form-group col-sm-12">
                            <div class="checkbox">
                                {!! Form::hidden('same_address', false) !!}
                                {!! Form::checkbox('same_address', 1, true) !!}
                            </div>
                            {!! Form::label('sameaddress', 'Same Address:' ) !!}
                        </div>

                        <!-- Street Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('secondary_street', 'Street:') !!}
                            {!! Form::text('secondary_street', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>

                        <!-- City Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('secondary_city', 'City:') !!}
                            {!! Form::text('secondary_city', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>

                        <!-- State Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('secondary_state', 'State:') !!}
                            {!! Form::text('secondary_state', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>

                        <!-- Postal Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('secondary_postal', 'Postal:') !!}
                            {!! Form::text('secondary_postal', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>

                        <!-- Country Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('secondary_country', 'Country:') !!}
                            {!! Form::text('secondary_country', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>

                    </div>
                </div>
            </div>
            <!-- Lead Source Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('lead_source', 'Lead Source Id:') !!}
                {{ Form::select('lead_source', (!empty($leadsource) ? $leadsource : null), (!empty($slctdLeadSource) ? $slctdLeadSource : null), ['class' => 'combobox form-control' ,'autocomplete'=>'off']  ) }}
            </div>

            <!-- Campaigns Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('campaign', 'Campaigns:') !!}
                <div class="input-group date">
                    {!! Form::text('campaign', (!empty($contact->Campaigns->name) ? $contact->Campaigns->name : null), ['class' => 'form-control', 'id'=>'txtCampaign']) !!}
                    <div class="input-group-addon"><i class="fa fa-plus" id="plsCampaign"></i></div>
                    {!! Form::hidden('campaign_id', (!empty($contact->Campaigns->id) ? $contact->Campaigns->id : null)) !!}
                </div>
            </div>

            <!-- Assigned To Field --> <!-- Should be dropdown from users > name -->
            <div class="form-group col-sm-6">
                {!! Form::label('assigned_to', 'Assigned To:') !!}
                {!! Form::select('assigned_to', (!empty($users) ? $users : null), (!empty($slctdUser) ? $slctdUser : null), ['class' => 'combobox form-control' ,'autocomplete'=>'off'] ) !!}
            </div>
        </div>
        <!-- END ACCORDION -->
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contacts.index') !!}" class="btn btn-default">Cancel</a>
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

        //trigger modal form Campaigns
        $("#txtCampaign").focus(function ()
        {
            var url = '{{ url('modalCampaigns') }}';
            $.get(url, function (data)
            {
                $('.modal-body').html(data);
            });

            $('#modalform').modal('show');
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
            $('#modalform').modal('toggle');
            $('#txtCampaign').val(this.value);
            $('input[name=campaign_id]').val(this.id);
        });

    //trigger modal form Accounts
    $("#txtAccount").focus(function ()
    {
        var url = '{{ url('modalAccounts') }}';
        $.get(url, function (data)
        {
            $('.modal-body-account').html(data);
        });

        $('#modalAccount').modal('show');
    });
    //trigger modal form Accounts
    $('#plsAccount').click(function(){
        var url = '{{ url('modalAccounts') }}';
        $.get(url, function (data)
        {
            $('.modal-body-account').html(data);
        });

        $('#modalAccount').modal('show');
    });

    //Get name of selected campaign button
    $('.modal-body-account').on('click', 'button', function (e) {
        var id = this.id, value = this.value;
        $('#modalAccount').modal('toggle');
        $('#txtAccount').val(this.value);
        $('input[name=account_id]').val(this.id)
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