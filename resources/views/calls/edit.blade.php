@extends('layouts.app')

@section('htmlheader_title') Call @endsection

@section('main-content')
    <div class="container spark-screen">
        @include('common.errors')
        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Call</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($call, ['route' => ['calls.update', $call->id], 'method' => 'patch']) !!}

                    <div class="box-body">
                        @include('calls.fields')
                    </div>
                    <!-- /.box-body -->
                    {!! Form::close() !!}
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection;