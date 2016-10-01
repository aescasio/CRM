@extends('layouts.app')

@section('htmlheader_title') ClientType @endsection

@section('main-content')

    <div class="container spark-screen">

        <div class="clearfix"></div>
            @include('common.errors')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="box box-primary">
                    <div class="box-header">

                        <h3 class="box-title"> ClientTypes </h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('clientTypes.create') !!}">Add New</a>
                        </div>

                        <!-- Body start -->
                        <div class="box-body no-padding">

                            @if($clientTypes->isEmpty())
                                <div class="well text-center">No ClientTypes found.</div>
                            @else
                                @include('clientTypes.table')
                            @endif
                            

                        </div>
                        <!-- /.box-body -->
                    </div>

                        @include('common.paginate', ['records' => $clientTypes])
                </div>
            </div>
        </div>
    </div>

@endsection