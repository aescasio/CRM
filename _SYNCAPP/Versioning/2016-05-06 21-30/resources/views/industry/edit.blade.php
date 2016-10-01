@extends('layouts.app')
@section('htmlheader_title')
    Industry - Edit
@endsection
@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div>
                    @include('core-templates::common.errors')
                </div>
                <!-- AdminLTE Vertical Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Industry - Edit</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($industry, ['route' => ['industry.update', $industry->id], 'method' => 'patch']) !!}

                    <div class="box-body">
                        <!--  Form Input -->
                        <div class="form-group">
                            {{ Form::label('name','Name:')}}
                            {{ Form::text('name', $industry->name, array_merge(['class' => 'form-control'])) }}
                        </div>
                        <!-- description Form Input -->
                        <div class="form-group">
                            {{ Form::label('description','Description:')}}
                            {{ Form::text('description', $industry->description, array_merge(['class' => 'form-control'])) }}
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