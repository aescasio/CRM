@extends('layouts.app')

@section('htmlheader_title') Meeting @endsection

@section('main-content')
    <div class="container spark-screen">
        @include('common.errors')
        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Meeting</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($meeting, ['route' => ['meetings.update', $meeting->id], 'method' => 'patch']) !!}

                    <div class="box-body">
                        @include('meetings.fields')
                    </div>
                    <!-- /.box-body -->
                    {!! Form::close() !!}
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection;