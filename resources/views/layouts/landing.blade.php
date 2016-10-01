<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pratt - Free Bootstrap 3 Theme">
    <meta name="author" content="Alvarez.is - BlackTie.co">

    <title>Enchanted Kingdom - Customer Resource Management</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b>EK - Customer Resource Management</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home" class="smoothScroll">Home</a></li>
                <!--
                <li><a href="#desc" class="smoothScroll">Description</a></li>
                <li><a href="#showcase" class="smoothScroll">About</a></li>
                <li><a href="#contact" class="smoothScroll">Contact</a></li>
                -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><a href="/home">{{ Auth::user()->name }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1>Acacha <b><a href="https://github.com/acacha/adminlte-laravel">adminlte-laravel</a></b></h1>
                <h3>A <a href="https://laravel.com/">Laravel</a> 5 package that switchs default Laravel
                    scaffolding/boilerplate to <a href="https://almsaeedstudio.com/preview">AdminLTE</a> template with
                    <a href="http://getbootstrap.com/">Bootstrap</a> 3.0 and <a href="http://blacktie.co/demo/pratt/">Pratt</a> Landing page</h3>
                <h3><a href="{{ url('/register') }}" class="btn btn-lg btn-success">Get Started!</a></h3>
            </div>
            <div class="col-lg-2">
                <h5>Amazing admin template</h5>
                <p>Based on adminlte bootstrap theme</p>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow1.png') }}">
            </div>
            <div class="col-lg-8">
                <img class="img-responsive" src="{{ asset('/img/app-bg.png') }}" alt="">
            </div>
            <div class="col-lg-2">
                <br>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow2.png') }}">
                <h5>Awesome packaged...</h5>
                <p>... by <a href="http://acacha.org/sergitur">Sergi Tur Badenas</a> at <a href="http://acacha.org">acacha.org</a> ready to use with Laravel!</p>
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->




<section id="contact" name="contact"></section>
<div id="footerwrap">
    <div class="container">
        <div class="col-lg-5">
            <h3>Address</h3>
            <p>
                Av. Greenville 987,<br/>
                New York,<br/>
                90873<br/>
                United States
            </p>
        </div>

        <div class="col-lg-7">
            <h3>Drop Us A Line</h3>
            <br>
            <form role="form" action="#" method="post" enctype="plain">
                <div class="form-group">
                    <label for="name1">Your Name</label>
                    <input type="name" name="Name" class="form-control" id="name1" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="email1">Email address</label>
                    <input type="email" name="Mail" class="form-control" id="email1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Your Text</label>
                    <textarea class="form-control" name="Message" rows="3"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
