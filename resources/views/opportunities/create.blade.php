@extends('layouts.app')

@section('htmlheader_title') Opportunities @endsection

@section('main-content')
    <div class="container spark-screen">

        @include('common.errors')

        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->

                <!-- AdminLTE Vertical Form -->
                <div class="box box-primary">
                    <!-- box-header start -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Create New Opportunities</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start here -->
                    {!! Form::open(['route' => 'opportunities.store']) !!}

                        @include('opportunities.fields')

                    {!! Form::close() !!}
                    <!-- form close -->
                 </div>
            <!-- </div> -->
        </div>
    </div>
@endsection;