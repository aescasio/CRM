<!-- Content Header (Page header) -->
<section class="content-header">
<div class="row">
    <h1>
        @yield('contentheader_title')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
        @foreach(explode("/",Request::path()) as $value)

            @if( is_numeric($value) )
                <li class="active"> <i> {{ ucwords($value) }} </i>  </li>
            @else( ! empty($value ))
                <li class="active"><a href="{{ url($value) }}"><i> {{ ucwords($value) }} </i></a> </li>
            @endif

        @endforeach
    </ol>
</div>
</section>

