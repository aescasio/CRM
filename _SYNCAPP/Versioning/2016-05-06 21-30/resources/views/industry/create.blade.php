@extends('layouts.app')

@section('htmlheader_title')
    Industry
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!-- AdminLTE Vertical Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Industry - Create</h3>
                    </div>
                    <!-- /.box-header -->
                    @include('core-templates::common.errors')
                    <!-- form start -->
                    {!! Form::open(array('role' => 'form','url' => 'industry', 'method' => 'post')) !!}
                        <div class="box-body">
                            <!--  Form Input -->
                            <div class="form-group">
                                {{ Form::label('name','Name:')}}
                                {{ Form::text('name', null, array_merge(['class' => 'form-control'])) }}
                            </div>
                            <!-- description Form Input -->
                            <div class="form-group">
                                {{ Form::label('description','Description:')}}
                                {{ Form::text('description', null, array_merge(['class' => 'form-control'])) }}
                            </div>
                        </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{ Form::submit('Submit!',['class' => 'btn btn-primary']) }}

                    </div>
                    {!! Form::close() !!}
                 </div>
            </div>
        </div>
    </div>
@endsection;