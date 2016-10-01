@extends('layouts.app')

@section('htmlheader_title') Calendar @endsection

@section('main-content')
    <div class="container spark-screen">

        @include('common.errors')

        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->

                <!-- AdminLTE Vertical Form -->
                <div class="box box-primary">
                    <!-- box-header start -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Create New Events</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start here -->
                    {!! Form::open(['route' => 'calendars.store']) !!}

                        @include('calendars.fields')
                        <div class="box-footer centered clearfix">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('calendars.index') !!}" class="btn btn-default">Cancel</a>
                            {!! Form::close() !!}
                        </div>
                    <!-- form close -->
                 </div>
            <!-- </div> -->
        </div>
    </div>
@endsection;