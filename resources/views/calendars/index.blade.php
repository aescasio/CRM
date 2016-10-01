@extends('layouts.app')

@section('htmlheader_title') Calendar @endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="clearfix"></div>
            @include('common.errors')
        <div class="clearfix"></div>

        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->

                <div class="box box-primary">
                    <!-- Header start -->
                    <div class="box-header">
                        <h3 class="box-title"> Calendars </h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('calendars.create') !!}">Add New</a>
                        </div>
                    </div>
                    <!-- /.box-head-->

                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <div id="calendar"></div>
                    </div>
                    <!-- /.box-body -->
                    
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection

<script>//This section is already yield in scripts, this is intentional for IDE code reformat only.
    @section('per_page_script')

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        //Random default events

            events: {!! $calendars->content() !!}

        ,
        editable: false,
        droppable: false, // this allows things to be dropped onto the calendar !!!
    });

    @endsection
</script>