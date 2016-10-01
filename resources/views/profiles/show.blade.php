@extends('layouts.app')
@section('htmlheader_title')
    Industry
@endsection
@section('main-content')
    <div class="container spark-screen">
        <div class="clearfix"></div>
        @include('common.errors')
        <div class="clearfix"></div>

        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Profile - View</h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('profiles.edit',[Auth::user()->id]) !!}">Edit</a>
                        </div>
                    </div>

                    <!-- / .start-body -->
                    <div class="box-body">
                        <!-- Name Field -->
                        @include('profiles.show_fields')

                    </div>
                    <!-- /.box-body -->
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection