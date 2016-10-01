@extends('layouts.app')

@section('htmlheader_title') Meeting @endsection

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
                        <h3 class="box-title"> Meetings </h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('meetings.create') !!}">Add New</a>
                        </div>
                    </div>
                    <!-- /.box-head-->

                    <!-- Body start -->
                    <div class="box-body no-padding">

                    @if($meetings->isEmpty())
                        <div class="well text-center">No Meetings found.</div>
                    @else
                        @include('meetings.table')
                    </div>
                    <!-- /.box-body -->
                    
        @include('common.paginate', ['records' => $meetings])

                    @endif
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection