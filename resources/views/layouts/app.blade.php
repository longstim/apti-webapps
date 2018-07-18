<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles 
    <link href="/css/app.css" rel="stylesheet">-->
   
    {!! Html::style('asset/css/bootstrap.min.css') !!}

    <!-- Scripts -->
    <style type="text/css">
    	 #header{
            font-family: arial;
            font-size: 15 px;
            background: #1f49a7;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #footer {
            width: 100%;
            bottom: 0px;
            padding-top: 30px;
            padding-bottom: 30px;
            color: #fff;
            background: #222;
        }
        #contentpage
        {

        }
     
    </style>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
          <header id="header">
            <div class="container">
              
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color:#fff;">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}" style="color:#fff;"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
                            <li><a href="{{ url('/register') }}" style="color:#fff;"> <span class="glyphicon glyphicon-user"></span> Register</a></li>
                        @else
                            @if(Auth::user()->role=='admin')
                            <li><a href="{{ url('/home') }}" style="color:#fff;"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
                            
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#" style="color:#fff;"><span class="glyphicon glyphicon-stats"></span>&nbspTarget<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                  <li><a href="{{ url('/target') }}"> <span class="glyphicon glyphicon-refresh"></span>&nbspTambah Target</a></li>
                                  <li><a href="{{ url('/readtarget') }}"> <span class="glyphicon glyphicon-eye-open"></span>&nbspLihat Target</a></li>
                            </ul>
                            </li>

                            <li> <a href="{{ url('/incentive') }}" style="color:#fff;"><span class="glyphicon glyphicon-list-alt"></span>&nbspLaporan</a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#fff;">
                                    <span class="glyphicon glyphicon-user"></span>&nbsp{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}" 
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <span class="glyphicon glyphicon-log-out"></span> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @else

                            <li> <a href="{{ url('/incentive') }}" style="color:#fff;"><span class="glyphicon glyphicon-list-alt"></span>&nbspLaporan</a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#fff;">
                                    <span class="glyphicon glyphicon-user"></span>&nbsp{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}" 
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <span class="glyphicon glyphicon-log-out"></span> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        @endif
                    </ul>
                </div>
               
            </div>
             </header>
        </nav>       
    </div>

    <div id="contentpage">
        @yield('content')
    </div>

    <script>
            function myFunction() {
                document.getElementById("contentpage").style.minHeight = window.outerHeight-237 + 'px';
            }
            myFunction();
    </script>
        
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 Aplikasi Perhitungan Total Insentif.
                </div>

                  <div align="right">
                    Powered by <a href="https://laravel.com"><font color="#fff">Laravel Framework</font></a>.
                </div>
            </div>
        </div>
    </footer>
        {!! Html::script('asset/js/jquery.min.js') !!}
        {!! Html::script('asset/js/bootstrap.min.js') !!}
        {!! Html::script('asset/js/bootstrap-filestyle.js') !!}

</body>
</html>
