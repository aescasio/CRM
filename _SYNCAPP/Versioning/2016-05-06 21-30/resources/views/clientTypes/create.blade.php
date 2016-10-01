@extends('layouts.app')

@section('htmlheader_title') ClientType @endsection

@section('main-content')
    <div class="container spark-screen">
        @include('common.errors')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <!-- AdminLTE Vertical Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create New ClientType</h3>
                    </div>

                    @include('core-templates::common.errors')

                    <!-- /.box-header -->

                    <!-- form start -->
                    {!! Form::open(['route' => 'clientTypes.store']) !!}
                        <div class="box-body">

                        @include('clientTypes.fields')

                        </div>
                    <!-- /.box-body -->
                    {!! Form::close() !!}
                 </div>
            </div>
        </div>
    </div>
@endsection;