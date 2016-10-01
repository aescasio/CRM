<!-- Content Header (Page header) -->
<section class="content-header">
    <?php $array = explode("/",Request::path()) ?>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home </a></li>

            @foreach($array as $key => $value)

                @if( is_numeric($value) )
                    <li class="active"> <i> {{ ucwords($value) }} </i>  </li>

                @elseif($value == 'home')

                @elseif( ! empty($value) && $value != end($array) )

                    <li class="active"><a href="{{ url($value) }}"><i> {{ ucwords($value) }} </i></a> </li>

                @elseif ( $value == end($array) )

                    <li class="active"><a href="{{  url(Request::path()) }}"><i> {{ ucwords($value) }} </i></a> </li>
                @endif

            @endforeach
        </ol>
    <div class="row">
        <h1>
            @yield('contentheader_title')
            <small>@yield('contentheader_description')</small>
        </h1>
    </div>
</section>