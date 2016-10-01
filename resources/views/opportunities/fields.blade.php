<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Name:', ['class' => 'required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Account Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('account_name', 'Account Name:') !!}
            <div class="input-group date">
                {!! Form::text('account_name', (!empty($opportunities->Account->name) ? $opportunities->Account->name : null), ['class' => 'form-control', 'id'=>'txtAccount']) !!}
                {!! Form::hidden('account_id', (!empty($opportunities->Account->id) ? $opportunities->Account->id : null)) !!}
                <div class="input-group-addon"><i class="fa fa-plus" id="plsAccount"></i></div>
            </div>
        </div>

        <!-- Currency Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('currency', 'Currency:') !!}
            {!! Form::select('currency', ['Peso' => 'Peso: PHP', 'Dollar' => 'Dollar: $'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Closed Date Field -->
        <div class="form-group col-sm-6">

            {!! Form::label('closed_date', 'Closed Date:', ['class' => 'required']) !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::date('closed_date', (!empty($opportunities->closed_date ) ? $opportunities->closed_date : null), ['class' => 'form-control', 'type'=>'date']) !!}
            </div>
        </div>

        <!-- Amount Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('amount', 'Opportunity Amount:', ['class' => 'required']) !!}
            {!! Form::text('amount', null, ['class' => 'form-control', 'money-mask']) !!}
        </div>

        <!-- Type Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('type', 'Type:') !!}
            {!! Form::select('type', ['Existing Business' => 'Existing Business', 'New Business' => 'New Business'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Sales Stage Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('sales_stage', 'Sales Stage:', ['class' => 'required']) !!}
            {!! Form::select('sales_stage', [null => 'Pls. Select','Prospecting' => 'Prospecting', 'Qualification' => 'Qualification', 'Need Analysis' => 'Need Analysis', 'Value Proposition' => 'Value Proposition', 'Id. Decision Makers' => 'Id. Decision Makers', 'Perception Analysis' => 'Perception Analysis', 'Proposal/Price Quote' => 'Proposal/Price Quote', 'Negotiation/Review' => 'Negotiation/Review', 'Closed Won' => 'Closed Won', 'Closed Lost' => 'Closed Lost'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Lead Source Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('lead_source', 'Lead Source:') !!}
            {!! Form::select('lead_source', $lead_source, null, ['class' => 'form-control']) !!}
        </div>

        <!-- Probability Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('probability', 'Probability (%):') !!}
            {!! Form::number('probability', '80', ['class' => 'form-control']) !!}
        </div>

        <!-- Campaigns Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('campaign', 'Campaigns:') !!}
            <div class="input-group date">
                {!! Form::text('campaign', (!empty($opportunities->Campaign->name) ? $opportunities->Campaign->name : null), ['class' => 'form-control', 'id'=>'txtCampaign']) !!}
                <div class="input-group-addon"><i class="fa fa-plus" id="plsCampaign"></i></div>

                {!! Form::hidden('campaign_id', (!empty($opportunities->Campaign->id) ? $opportunities->Campaign->id : null)) !!}
            </div>
        </div>

        <!-- Next Step Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('next_step', 'Next Step:') !!}
            {!! Form::text('next_step', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Assigned To Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('assigned_to', 'Assigned To:') !!}
            {!! Form::select('assigned_to', $assigned_to, null, ['class' => 'form-control']) !!}
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('opportunities.index') !!}" class="btn btn-default">Cancel</a>
</div>

@include('modals.find')

<script>
    @section('per_page_script')
    //trigger modal form Campaigns
    $("#txtCampaign").focus(function () {
        var url = '{{ url('modalCampaigns') }}';
        $.get(url, function (data) {
            $('.modal-body').html(data);
        });

        $('#modalform').modal('show');
    });
    //trigger modal form Campaigns
    $('#plsCampaign').click(function () {
        var url = '{{ url('modalCampaigns') }}';
        $.get(url, function (data) {
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
    $("#txtAccount").focus(function () {
        var url = '{{ url('modalAccounts') }}';
        $.get(url, function (data) {
            $('.modal-body-account').html(data);
        });

        $('#modalAccount').modal('show');
    });
    //trigger modal form Accounts
    $('#plsAccount').click(function () {
        var url = '{{ url('modalAccounts') }}';
        $.get(url, function (data) {
            $('.modal-body-account').html(data);
        });

        $('#modalAccount').modal('show');
    });

    //Get name of selected campaign button
    $('.modal-body-account').on('click', 'button', function (e) {
        $('#modalAccount').modal('toggle');
        $('#txtAccount').val(this.value);
        $('input[name=account_id]').val(this.id);

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