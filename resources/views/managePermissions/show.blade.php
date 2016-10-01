@extends('layouts.app')
@section('htmlheader_title')
    Industry
@endsection
@section('main-content')
    <div class="container spark-screen">
        @include('common.errors')
        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">managePermissions - View</h3>
                    </div>

                    <!-- / .start-body -->
                    <div class="box-body">
                        <!-- Name Field -->
                        @include('managePermissions.show_fields')

                    </div>
                    <!-- /.box-body -->
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection