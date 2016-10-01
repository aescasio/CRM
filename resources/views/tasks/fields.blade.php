<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">
        <!-- Subject Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('subject', 'Subject:') !!}
            {!! Form::text('subject', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Status Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Completed' => 'Completed', 'Pending Input' => 'Pending Input', 'Deferred' => 'Deferred'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Priority Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('priority', 'Priority:') !!}
            {!! Form::select('priority', ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Start Date Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('start_date', 'Start Date:') !!}
            {!! Form::date('start_date',(isset($task->start_date) ? $task->start_date : null), ['class' => 'form-control']) !!}

        </div>

        <!-- Time Field-->
        <div class="bootstrap-timepicker col-sm-3">
            <div class="form-group">
                {!! Form::label('start_time', 'Time:', ['class'=>'required']) !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <a><i class="fa fa-clock-o" id="start_time"></i></a>
                    </div>
                    {!! Form::text('start_time', (isset($task->start_date) ? date('H:i A', strtotime($task->start_date)) : null ), ['class' => 'form-control timepicker', 'data-inputmask'=>'"alias": "hh:mm t"', 'data-mask']) !!}
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
        </div>

        <!-- Due Date Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('due_date', 'Due Date:') !!}
            {!! Form::date('due_date', (isset($task->due_date) ? $task->due_date : null), ['class' => 'form-control']) !!}
        </div>

        <!-- Time Field-->
        <div class="bootstrap-timepicker col-sm-3">
            <div class="form-group">
                {!! Form::label('due_time', 'Time:', ['class'=>'required']) !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <a><i class="fa fa-clock-o" id="due_time"></i></a>
                    </div>
                    {!! Form::text('due_time', (isset($task->due_date) ? date('H:i A', strtotime($task->due_date)) : date('H:i')), ['class' => 'form-control timepicker', 'data-inputmask'=>'"alias": "hh:mm t"', 'data-mask']) !!}
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
        </div>

        <!-- Related To Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('related_to', 'Related To:') !!}
            {!! Form::select('related_to', [''=>'Pls. Select','accounts' => 'Account', 'contacts' => 'Contact', 'leads' => 'Lead', 'opportunities' => 'Opportunity',  'projects' => 'Project', 'targets' => 'Target', 'tasks' => 'Task'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Related Result Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('related_result', 'Related Result:') !!}
            <div class="input-group date">
                {!! Form::text('related_result', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon"><a><i class="fa fa-plus" id="related_results_dummy"></i></a></div>
                {!! Form::hidden('related_result_id', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Contact Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('contact_name', 'Contact Name:') !!}
            <div class="input-group date">
                {!! Form::text('contact_name', (isset($task->contact_id) ? $task->Contact['full_name'] : null), ['class' => 'form-control']) !!}
                <div class="input-group-addon"><a><i class="fa fa-plus" id="contact_name_plus"></i></a></div>
                {!! Form::hidden('contact_id', (isset($task->contact_id) ? $task->contact_id : null), ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Assigned To Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('assigned_to', 'Assigned To:') !!}
            {!! Form::select('assigned_to', $assigned_to, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tasks.index') !!}" class="btn btn-default">Cancel</a>
</div>


@include('modals.find')

<script>
    @section('per_page_script')

    //Timepicker
    $("input[name=start_time]").timepicker({
        showInputs : false,
        minuteStep : 5
    });

    $("#start_time").click(function(){
        $("input[name=start_time]").focus();
    });

    $("input[name=due_time]").timepicker({
        showInputs : false,
        minuteStep : 5
    });

    $("#due_time").click(function(){
        $("input[name=due_time]").focus();
    });

    $('#related_results_dummy').click(function(){
        if( $('select[name=related_to] :selected').text() == 'Account'){
            $.get('{{ url('modalAccounts') }}', function (data) {
                $('.modal-body-account').html(data);
            });
            $('#modalAccount').modal('show');
        }else if($('select[name=related_to] :selected').text() == 'Contact'){
            $.get('{{ url('modalContacts') }}', function (data) {
                $('.modal-body-contact-select').html(data);
            });
            $('#modalContactSelect').modal('show');
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
        }else if($('select[name=related_to] :selected').text() == 'Project'){
            $.get('{{ url('modalProjects') }}', function (data) {
                $('.modal-body-projects').html(data);
            });
            $('#modalProjects').modal('show');
        }
    });

    $('#contact_name_plus').click(function(){
        $('input[name=contact_name]').focus();
    });

    $('input[name=contact_name]').focus(function(){
        $.get('{{ url('modalContacts') }}', function (data) {
            $('.modal-body-contact').html(data);
        });
        $('#modalContact').modal('show');
    });

    //Get name of selected button
    $('.modal-body-account').on('click', 'button', function (e) {
        $('#modalAccount').modal('toggle');
        $('input[name=related_result]').val(this.value);
        $('input[name=related_result_id]').val(this.id);
    });

    $('.modal-body-contact-select').on('click', 'button', function (e) {
        $('#modalContactSelect').modal('toggle');
        $('input[name=related_result]').val(this.value);
        $('input[name=related_result_id]').val(this.id);
    });

    $('.modal-body-lead').on('click', 'button', function (e) {
        $('#modalLead').modal('toggle');
        $('input[name=related_result]').val(this.value);
        $('input[name=related_result_id]').val(this.id);
    });

    $('.modal-body-opportunities').on('click', 'button', function (e) {
        $('#modalOpportunities').modal('toggle');
        $('input[name=related_result]').val(this.value);
        $('input[name=related_result_id]').val(this.id);
    });

    $('.modal-body-projects').on('click', 'button', function (e) {
        $('#modalProjects').modal('toggle');
        $('input[name=related_result]').val(this.value);
        $('input[name=related_result_id]').val(this.id);
    });

    $('.modal-body-targets').on('click', 'button', function (e) {
        $('#modalTargets').modal('toggle');
        $('input[name=related_result]').val(this.value);
        $('input[name=related_result_id]').val(this.id);
    });

    $('.modal-body-tasks').on('click', 'button', function (e) {
        $('#modalTasks').modal('toggle');
        $('input[name=related_result]').val(this.value);
        $('input[name=related_result_id]').val(this.id);
    });

    $('.modal-body-contact').on('click', 'button', function (e) {
        $('#modalContact').modal('toggle');
        $('input[name=contact_name]').val(this.value);
        $('input[name=contact_id]').val(this.id);
    });
    //prevent modal form to reload page when pagination change page
    $('body').on('click', '.pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.get(url, function (data) {
            $('#table').html(data);
        });
    });

    $('#related_to').change(function(){
        $('input[name=related_results]').val('');
    });

    //get all value of text value of campaign name
    oldValue = '';
    $("input[name=related_result]").focus(function ()
    {
        oldValue =  this.value;
    });
    //Change the value to 0 on focusout event since campaign were not coming from campaign table
    $('input[name=related_result]').focusout(function ()
    {

        if(oldValue != this.value){
            $('input[name=related_result_id]').val('0');
            $('#related_to').val('')
        }

        if(($('#related_to option:selected').text() == 'Account' && oldValue != this.value)
                || ($('#related_to option:selected').text() == 'Contact' && oldValue != this.value)
                || ($('#related_to option:selected').text() == 'Lead' && oldValue != this.value)
                || ($('#related_to option:selected').text() == 'Opportunity' && oldValue != this.value)
                || ($('#related_to option:selected').text() == 'Project' && oldValue != this.value)
                || ($('#related_to option:selected').text() == 'Target' && oldValue != this.value)
                || ($('#related_to option:selected').text() == 'Task' && oldValue != this.value)){
            $('input[name=related_result_id]').val('0');
            $('#related_to').val('')
        }
    });

    @endsection

</script>