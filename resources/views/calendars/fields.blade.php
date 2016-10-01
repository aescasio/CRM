<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">

        <!-- All Day Field -->
        <div class="form-group col-sm-12">

            <div class="checkbox">
                {!! Form::hidden('allDay',0, false) !!}
                {!! Form::checkbox('allDay', 1, $indicator == 'create' ? 1 : $calendar->allday ) !!}
            </div>
            {!! Form::label('allDay', 'All Day' ) !!}
        </div>


        <!-- Title Field -->
        <div class="form-group col-sm-5">
            {!! Form::label('title', 'Title:',['class'=>'required']) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

    </div>
</div>
<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">

        <!-- Start Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('start', 'Start Date:', ['class' => 'required']) !!}
            {!! Form::date('start', (empty($calendar->start) ? \Carbon\Carbon::now() : $calendar->start), ['class' => 'form-control']) !!}
        </div>

        <!-- Start Time Field-->
        <div class="bootstrap-timepicker col-sm-2">
            <div class="form-group">
                {!! Form::label('start_time', 'Start Time:') !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <a><i class="fa fa-clock-o" id="start_time"></i></a>
                    </div>
                    @if($indicator == 'create' )

                        {!! Form::text('start_time', (isset($calendar->start) ? date('H:i A', strtotime($calendar->start)) : null), ['class' => 'form-control timepicker', 'data-inputmask'=>'"alias": "hh:mm t"', 'data-mask', 'disabled'=>true]) !!}

                    @else
                        {!! Form::text('start_time', (isset($calendar->start) ? date('H:i A', strtotime($calendar->start)) : null), ['class' => 'form-control timepicker', 'data-inputmask'=>'"alias": "hh:mm t"', 'data-mask']) !!}
                    @endif

                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
        </div>

        <!-- End Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('end', 'End Date:', ['class' => 'required']) !!}
            {!! Form::date('end', (empty($calendar->end) ? \Carbon\Carbon::now() : $calendar->end), ['class' => 'form-control']) !!}
        </div>

        <!-- End Time Field-->
        <div class="bootstrap-timepicker col-sm-2">
            <div class="form-group">
                {!! Form::label('end_time', 'End Time:') !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <a><i class="fa fa-clock-o" id="end_time"></i></a>
                    </div>
                    @if($indicator == 'create' )
                        {!! Form::text('end_time', (isset($calendar->end) ? date('H:i A', strtotime($calendar->end)) : null), ['class' => 'form-control timepicker', 'data-inputmask'=>'"alias": "hh:mm t"', 'data-mask', 'disabled'=>true]) !!}
                    @else
                        {!! Form::text('end_time', (isset($calendar->end) ? date('H:i A', strtotime($calendar->end)) : null), ['class' => 'form-control timepicker', 'data-inputmask'=>'"alias": "hh:mm t"', 'data-mask']) !!}
                    @endif
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
        </div>

        <!-- Background Color Picker -->
        <div class="form-group col-sm-2">
            {!! Form::label('backgroundColor', 'Background Color:') !!}
            <div class="input-group background-color">
                <input type="text" name="backgroundColor" id="backgroundColor" class="form-control background-color" value="{{ (isset($calendar->backgroundColor) ? $calendar->backgroundColor : null) }}">
                {{--{!! Form::text('backgroundColor', null, ['class' => 'form-control']) !!}--}} {{-- LaravelCollective doesn't work on this color picker--}}
                <div class="input-group-addon">
                    <i></i>
                </div>
            </div>
        </div>

        <!-- Border Color Picker -->
        <div class="form-group col-sm-2">
            {!! Form::label('borderColor', 'Border Color:') !!}
            <div class="input-group border-color">
                <input type="text" name="borderColor" id="borderColor" class="form-control border-color" value="{{ (isset($calendar->borderColor ) ? $calendar->borderColor  : null)}}">
                {{--{!! Form::text('backgroundColor', null, ['class' => 'form-control']) !!}--}}
                <div class="input-group-addon">
                    <i></i>
                </div>
            </div>
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            {!! Form::hidden('url', null, ['class' => 'form-control']) !!}
        </div>

    </div>
</div>
<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">

        <!-- Event Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('assigned_to', 'Assigned Names:') !!}
            {!! Form::select('assigned_to[]', $assigned_to, $selected_users , ['class' => 'form-control','id'=>'assigned_to_dsply','multiple', 'size'=>'10']) !!}
        </div>

    </div>
</div>
<!-- /.box-body -->



<script>//This section is already yield in scripts, this is intentional for IDE code reformat only.
    @section('per_page_script')

        //Colorpicker
        $(".background-color").colorpicker();
        $(".border-color").colorpicker();

        //Timepicker
        $("input[name=start_time]").timepicker({
            showInputs : false,
            minuteStep : 5
        });
        $('#start_time').click(function(){
            $("input[name=start_time]").focus();
        });

        //Timepicker
        $("input[name=end_time]").timepicker({
            showInputs : false,
            minuteStep : 5
        });

        $('#end_time').click(function(){
            $("input[name=end_time]").focus();
        });


    $('input[name=allDay]').on("change", function () {
        if (this.checked) {

            $("input[name='start_time']").prop('disabled',true).val(null);
            $("input[name='end_time']").prop('disabled',true).val(null);

        } else {
            $("input[name='start_time']").prop('disabled', false);
            $("input[name='end_time']").prop('disabled', false);
        }
    });

    $('#assigned_to_dsply').bootstrapDualListbox({
        nonSelectedListLabel: 'Available Users',
        selectedListLabel: 'Selected Users',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true
    });
    @endsection
</script>