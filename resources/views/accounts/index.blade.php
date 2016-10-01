@extends('layouts.app')

@section('htmlheader_title') Account @endsection

@section('main-content')

    <div class="container spark-screen">

        <div class="clearfix"></div>

        @include('common.errors')

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-10 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Accounts </h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('accounts.create') !!}">Add New</a>
                        </div>
                    </div>
                    <!-- Body start -->
                    <div class="box-body no-padding">

                        @if($accounts->isEmpty())
                            <div class="well text-center">No Accounts found.</div>
                        @else
                            @include('accounts.table')

                    </div>
                    <!-- /.box-body -->
                    @include('common.paginate', ['records' => $accounts])
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection