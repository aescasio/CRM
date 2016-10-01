<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <!-- Subject Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('subject', 'Subject:', ['class'=>'required']) !!}
            {!! Form::text('subject', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Status Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('status', 'Status:', ['class'=>'required']) !!}
            {!! Form::select('status', ['Inbound' => 'Inbound', 'Outbound' => 'Outbound'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Status2 Field -->

        <div class="form-group col-sm-3">
            {{--<div class="col-xs-12" style="height:25px;"></div>--}}
            {!! Form::label('status2', 'Type:', ['class'=>'required']) !!}
            {!! Form::select('status2', ['Planned' => 'Planned', 'Held' => 'Held', 'Not Held' => 'Not Held'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Date Time Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('date', 'Date:', ['class'=>'required']) !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <a><i class="fa fa-calendar"></i></a>
                </div>
                {!! Form::date('date_time', (isset($call->date_time)?$call->date_time:null), ['class' => 'form-control pull-right']) !!}
            </div>
        </div>

        <!-- Time Field-->
        <div class="bootstrap-timepicker col-sm-3">
            <div class="form-group">
                {!! Form::label('time', 'Time:', ['class'=>'required']) !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <a><i class="fa fa-clock-o"></i></a>
                    </div>
                    {!! Form::text('time', (isset($call->date_time) ? date('H:i A', strtotime($call->date_time)) : null), ['class' => 'form-control timepicker', 'data-inputmask'=>'"alias": "hh:mm t"', 'data-mask']) !!}
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
        </div>

        <!-- Related To Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('related_to', 'Related To:', ['class'=>'required']) !!}
            {!! Form::select('related_to', ['accounts' => 'Account', 'contacts' => 'Contact', 'leads' => 'Lead', 'opportunities' => 'Opportunity', 'projects'=>'Project' ,'targets' => 'Target', 'tasks' => 'Task'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Related To Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('Select', 'Select Related:') !!}
            <div class="input-group date">
                {!! Form::text('related_results_dummy', (isset($related_results_dummy) ? $related_results_dummy : null) , ['class' => 'form-control', 'id'=>'txtCampaign']) !!}
                <div class="input-group-addon"><a><i class="fa fa-plus" id="plsRelated"></i></a></div>
                {!! Form::hidden('related_results', null) !!}
            </div>
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Assigned To Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('assigned_to', 'Assigned To:') !!}
            {!! Form::select('assigned_to', $assigned_to, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('calls.index') !!}" class="btn btn-default">Cancel</a>
</div>

@include('modals.find')

<script>
    @section('per_page_script')

    //Timepicker
    $(".timepicker").timepicker({
        showInputs : false,
        minuteStep : 5
    });

    $(".fa-clock-o").click(function(){
        $(".timepicker").click();
    });

    $('#plsRelated').click(function(){
        $('input[name=related_results_dummy]').focus();
    });

    $('input[name=related_results_dummy]').focus(function()
    {

        if( $('select[name=related_to] :selected').text() == 'Account'){
            $.get('{{ url('modalAccounts') }}', function (data) {
                $('.modal-body-account').html(data);
            });
            $('#modalAccount').modal('show');
        }else if($('select[name=related_to] :selected').text() == 'Contact'){
            $.get('{{ url('modalContacts') }}', function (data) {
                $('.modal-body-contact').html(data);
            });
            $('#modalContact').modal('show');
        }else if($('select[name=related_to] :selected').text() == 'Lead'){
            $.get('{{ url('modalLeads') }}', function (data) {
                $('.modal-body-lead').html(data);
            });
            $('#modalLead').modal('show');
        }else if($('select[name=related_to] :selected').text() == 'Opportunity'){
            $.get('{{ url('modalOpportunities') }}', function (data) {
                $('.modal-body-opportunities').html(data);
            });
            $('#modalOpportunities').modal('show');
        }else if($('select[name=related_to] :selected').text() == 'Project'){
            $.get('{{ url('modalProjects') }}', function (data) {
                $('.modal-body-projects').html(data);
            });
            $('#modalProjects').modal('show');
        }else if($('select[name=related_to] :selected').text() == 'Target'){
            $.get('{{ url('modalTargets') }}', function (data) {
                $('.modal-body-targets').html(data);
            });
            $('#modalTargets').modal('show');
        }else if($('select[name=related_to] :selected').text() == 'Task'){
            $.get('{{ url('modalTasks') }}', function (data) {
                $('.modal-body-tasks').html(data);
            });
            $('#modalTasks').modal('show');
        }

    });

    //Get name of selected button
    $('.modal-body-account').on('click', 'button', function (e) {
        $('#modalAccount').modal('toggle');
        $('input[name=related_results_dummy]').val(this.value);
        $('input[name=related_results]').val(this.id);
    });

    $('.modal-body-contact').on('click', 'button', function (e) {
        $('#modalContact').modal('toggle');
        $('input[name=related_results_dummy]').val(this.value);
        $('input[name=related_results]').val(this.id);
    });

    $('.modal-body-lead').on('click', 'button', function (e) {
        $('#modalLead').modal('toggle');
        $('input[name=related_results_dummy]').val(this.value);
        $('input[name=related_results]').val(this.id);
    });

    $('.modal-body-opportunities').on('click', 'button', function (e) {
        $('#modalOpportunities').modal('toggle');
        $('input[name=related_results_dummy]').val(this.value);
        $('input[name=related_results]').val(this.id);
    });

    $('.modal-body-projects').on('click', 'button', function (e) {
        $('#modalProjects').modal('toggle');
        $('input[name=related_results_dummy]').val(this.value);
        $('input[name=related_results]').val(this.id);
    });

    $('.modal-body-targets').on('click', 'button', function (e) {
        $('#modalTargets').modal('toggle');
        $('input[name=related_results_dummy]').val(this.value);
        $('input[name=related_results]').val(this.id);
    });

    $('.modal-body-tasks').on('click', 'button', function (e) {
        $('#modalTasks').modal('toggle');
        $('input[name=related_results_dummy]').val(this.value);
        $('input[name=related_results]').val(this.id);
    });

    $('#related_to').change(function(){
        $('input[name=related_results_dummy]').val('');
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

