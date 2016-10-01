@extends('layouts.app')
@section('htmlheader_title')
    Industry
@endsection
@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Industry - View</h3>
                    </div>
                    @include('core-templates::common.errors')
                    <div class="box-body">
                    <!-- /.box-header -->
                        <!-- Name Field -->
                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            <p>{!! $industry->name !!}</p>
                        </div>

                        <!-- Description Field -->
                        <div class="form-group">
                            {!! Form::label('description', 'Description:') !!}
                            <p>{!! $industry->description !!}</p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
@endsection