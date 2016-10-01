@extends('layouts.app')

@section('htmlheader_title')
    Access Denied
@endsection

@section('contentheader_title')
    <center>Access Denied</center>
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! You are not authorize to access this page.</h3>
            <p>
                Permission is required to access this page.
                Meanwhile, you may <a href='{{ url('/home') }}'>return to dashboard</a> or contact your administrator.
            </p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
    @section('scripts')
        @include('layouts.partials.scripts')
    @show
    <script src="{{ URL::asset('/js/user-modal.js') }}" type="text/javascript"></script>
@endsection