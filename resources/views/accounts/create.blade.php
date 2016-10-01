@extends('layouts.app')

@section('htmlheader_title') Account @endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('common.errors')

                        <!-- AdminLTE Vertical Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create New Account</h3>
                    </div>
                    <!-- /.box-header -->
                    {!! Form::open(['route' => 'accounts.store']) !!}
                            <!-- form start -->
                    @include('accounts.fields')
                            <!-- /.box-body -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
