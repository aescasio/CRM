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

        <!-- Last Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('last_name', 'Last Name:', ['class' => 'required']) !!}
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Title Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Department Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('department', 'Department:') !!}
            {!! Form::text('department', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Company Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('company_name', 'Company Name:') !!}
            <div class="input-group date">
                {!! Form::text('company_name', (!empty($target->company_name) ? $target->company_name : null), ['class' => 'form-control', 'id' => 'company_name']) !!}
                {!! Form::hidden('account_id', (!empty($target->Account->id) ? $target->Account->id : null)) !!}
                <div class="input-group-addon"><i class="fa fa-plus" id="find"></i></div>
            </div>
        </div>

        <!-- Contact Office Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('contact_office', 'Contact Office:') !!}
            {!! Form::text('contact_office', null, ['class' => 'form-control', 'data-inputmask'=>'"mask": "(999)999-9999"', 'data-mask']) !!}
        </div>

        <!-- Contact Mobile Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('contact_mobile', 'Contact Mobile:') !!}
            {!! Form::text('contact_mobile', null, ['class' => 'form-control','data-inputmask'=>'"mask": "(9999)999-9999"', 'data-mask']) !!}
        </div>

        <!-- Contact Fax Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('contact_fax', 'Contact Fax:') !!}
            {!! Form::text('contact_fax', null, ['class' => 'form-control','data-inputmask'=>'"mask": "(999)999-9999"', 'data-mask']) !!}
        </div>

        <!-- Email Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <div class="box-group" id="accordion">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#moreInfo">More Information (click me!)</a>
                    </h4>
                </div>
                <div id="moreInfo" class="panel-collapse collapse">
                    <!-- Body Content starts here -->
                    <div class="box-body">

                        <div class="form-group col-sm-6">
                            <div class="form-group col-sm-12">
                                {!! Form::label('primaryaddress', 'Primary Address:' ) !!}
                            </div>

                            <!-- Primary City Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_address', 'Primary Address:') !!}
                                {!! Form::textarea('primary_address', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Primary City Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_city', 'Primary City:') !!}
                                {!! Form::text('primary_city', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Primary State Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_state', 'Primary State:') !!}
                                {!! Form::text('primary_state', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Primary Postal Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_postal', 'Primary Postal:') !!}
                                {!! Form::text('primary_postal', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Primary Country Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('primary_country', 'Primary Country:') !!}
                                {!! Form::text('primary_country', null, ['class' => 'form-control']) !!}
                            </div>

                        </div>
                        <div class="form-group col-sm-6">

                            <!-- Same Address-->
                            <div class="form-group col-sm-12">
                                <div class="checkbox inline">
                                    {!! Form::hidden('same_address', false) !!}
                                    {!! Form::checkbox('same_address', 1, true) !!}
                                </div>
                                {!! Form::label('sameaddress', 'Same Address:' ) !!}
                            </div>

                            <!-- Primary City Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_address', 'Primary Address:') !!}
                                {!! Form::textarea('secondary_address', null, ['class' => 'form-control', 'readonly'=>true]) !!}
                            </div>

                            <!-- Secondary City Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_city', 'Secondary City:') !!}
                                {!! Form::text('secondary_city', null, ['class' => 'form-control', 'readonly'=>true]) !!}
                            </div>

                            <!-- Secondary State Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_state', 'Secondary State:') !!}
                                {!! Form::text('secondary_state', null, ['class' => 'form-control', 'readonly'=>true]) !!}
                            </div>

                            <!-- Secondary Postal Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_postal', 'Secondary Postal:') !!}
                                {!! Form::text('secondary_postal', null, ['class' => 'form-control', 'readonly'=>true]) !!}
                            </div>

                            <!-- Secondary Country Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('secondary_country', 'Secondary Country:') !!}
                                {!! Form::text('secondary_country', null, ['class' => 'form-control', 'readonly'=>true]) !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Assigned To Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('assigned_to', 'Assigned To:', ['class'=>'required']) !!}
            {{ Form::select('assigned_to', $users , null, ['class' => 'combobox form-control' ,'autocomplete'=>'off']  ) }}
        </div>

    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('targets.index') !!}" class="btn btn-default">Cancel</a>
</div>


@include('modals.find')

<script>//This section is already yield in scripts, this is intentional for IDE code reformat only.
    @section('per_page_script')


    $("[name='same_address']").on("change", function () {
        if (this.checked) {
            $("[name='secondary_address']").attr('readonly', true).val(null);
            $("[name='secondary_street']").attr('readonly', true).val(null);
            $("[name='secondary_city']").attr('readonly',true).val(null);
            $("[name='secondary_state']").attr('readonly',true).val(null);
            $("[name='secondary_postal']").attr('readonly',true).val(null);
            $("[name='secondary_country']").attr('readonly',true).val(null);

        } else {
            $("[name='secondary_address']").prop('readonly', false);
            $("[name='secondary_street']").prop('readonly', false);
            $("[name='secondary_city']").prop('readonly', false);
            $("[name='secondary_state']").prop('readonly', false);
            $("[name='secondary_postal']").prop('readonly', false);
            $("[name='secondary_country']").prop('readonly', false);
        }
    });

    //get all value of text value of campaign name
    oldCompanyName = '';
    $("#company_name").focus(function ()
    {
        oldCompanyName =  this.value;
    });
    //Change the value to 0 on focusout event since campaign were not coming from campaign table
    $("#company_name").focusout(function ()
    {
        if(oldCompanyName != this.value){
            $('input[name=account_id]').val('0');
        }
    });

    //trigger modal form
    $("#find").click(function () {
        var url = '{{ url('modalAccounts') }}';
        $.get(url, function (data) {
            $('.modal-body-account').html(data);
        });

        $('#modalAccount').modal('show');
    });


    //Get name of selected button
    $('.modal-body-account').on('click', 'button', function (e) {
        $('#modalAccount').modal('toggle');
        $('input[name=company_name]').val(this.value);
        $('input[name=account_id]').val(this.id);
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

