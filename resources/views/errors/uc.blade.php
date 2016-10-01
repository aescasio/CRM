@extends('layouts.app')

@section('htmlheader_title')
  Page not found
@endsection

@section('contentheader_title')
  <div class="error-page">
    <div class="header">
      <center>Page Under Contruction</center>
    </div>
  </div>
@endsection

@section('main-content')

  <div class="error-page">
    <div class="error-content">
      <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

    </div><!-- /.error-content -->
    <div class="error-message">
      <p>
        We could not find the page you were looking for.
        Meanwhile, you may <a href='{{ url('/home') }}'>return to dashboard</a> or try using the search form.
      </p>
    </div>
  </div><!-- /.error-page -->
@endsection