@extends('layouts.app')

@section('htmlheader_title') Department @endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="clearfix"></div>
            @include('common.errors')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="box box-primary">
                    <!-- Header start -->
                    <div class="box-header">
                        <h3 class="box-title"> Departments </h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('departments.create') !!}">Add New</a>
                        </div>
                    </div>
                    <!-- /.box-head-->

                    <!-- Body start -->
                    <div class="box-body no-padding">

                    @if($departments->isEmpty())
                        <div class="well text-center">No Departments found.</div>
                    @else
                        @include('departments.table')
                    </div>
                    <!-- /.box-body -->
                    
        @include('common.paginate', ['records' => $departments])

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection