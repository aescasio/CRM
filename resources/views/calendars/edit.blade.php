@extends('layouts.app')

@section('htmlheader_title') Calendar @endsection

@section('main-content')
    <div class="container spark-screen" xmlns="http://www.w3.org/1999/html">
        @include('common.errors')
        <div class="row">
            <!-- <div class="col-md-10 col-md-offset-1"> -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Calendar</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">

                        {!! Form::model($calendar, ['route' => ['calendars.update', $calendar->id], 'method' => 'patch']) !!}
                            @include('calendars.fields')
                            <div class="input-group">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{!! route('calendars.index') !!}" class="btn btn-default">Cancel</a>
                        {!! Form::close() !!}
                                @if(\Auth::user()->hasRole(['admin', 'developer']))
                                <span class="input-group-btn">
                                    {!! Form::open(['route' => ['calendars.destroy', $calendar->id], 'method' => 'delete']) !!}
                                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete $calendar->title?')"]) !!}
                                    {!! Form::close() !!}
                                </span>
                                @endif
                            </div>
                    </div>

                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection;