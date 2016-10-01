@extends('layouts.app')

@section('htmlheader_title')Industry @endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->
                <div>

                    @include('core-templates::common.errors')
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Industry - List</h3>
                        <div class="box-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{!! route('industry.create') !!}">Add New</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th style="width: 55%">Description</th>
                                    <th style="width: 14%">Actions</th>
                                </tr>

                                @foreach($industry_type as $value)

                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $value->name }} </td>
                                    <td> {{ $value->description }} </td>
                                    <td>
                                        {{ Form::open(['route' => ['industry.destroy', $value->id], 'method' => 'delete']) }}
                                            <a href="{{ route('industry.show', [$value->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            <a href="{{ route('industry.edit',$value->id) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) }}
                                        {{ Form::close() }}
                                    </td>
                                <tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection
