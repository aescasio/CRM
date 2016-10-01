@extends('layouts.app')

@section('htmlheader_title') Call @endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="clearfix"></div>
            @include('common.errors')
        <div class="clearfix"></div>

        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->

                <div class="box box-primary">
                    <!-- Header start -->
                    <div class="box-header">
                        <h3 class="box-title"> Calls </h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('calls.create') !!}">Add New</a>
                        </div>
                    </div>
                    <!-- /.box-head-->

                    <!-- Body start -->
                    <div class="box-body no-padding">

                    @if($calls->isEmpty())
                        <div class="well text-center">No Calls found.</div>
                    @else
                        @include('calls.table')
                    </div>
                    <!-- /.box-body -->
                    
        @include('common.paginate', ['records' => $calls])

                    @endif
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection