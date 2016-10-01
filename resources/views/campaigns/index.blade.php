@extends('layouts.app')

@section('htmlheader_title') Campaign @endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="clearfix"></div>
            @include('common.errors')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-md-offset-0">

                <div class="box box-primary">
                    <!-- Header start -->
                    <div class="box-header">
                        <h3 class="box-title"> Campaigns </h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('campaigns.create') !!}">Add New</a>
                        </div>
                    </div>
                    <!-- /.box-head-->

                    <!-- Body start -->
                    <div class="box-body no-padding">

                    @if($campaigns->isEmpty())
                        <div class="well text-center">No Campaigns found.</div>
                    @else
                        @include('campaigns.table')
                    </div>
                    <!-- /.box-body -->
                    
                    @include('common.paginate', ['records' => $campaigns])

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection