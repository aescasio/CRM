@extends('layouts.app')

@section('htmlheader_title') ManageUser @endsection

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
                        <h3 class="box-title"> ManageUsers </h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('manageUsers.create') !!}">Add New</a>
                        </div>
                    </div>
                    <!-- /.box-head-->

                    <!-- Body start -->
                    <div class="box-body no-padding">

                    @if($manageUsers->isEmpty())
                        <div class="well text-center">No ManageUsers found.</div>
                    @else
                        @include('manageUsers.table')
                    </div>
                    <!-- /.box-body -->
                    
                    @include('common.paginate', ['records' => $manageUsers])

                    @endif
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection