<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi Perhitungan Total Insentif</title>
	{!! Html::style('asset/css/bootstrap.min.css') !!}

		<style>
  
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #header{
	            font-family: arial;
	            font-size: 15 px;
	            background: #2e2e2e;
	            padding-top: 10px;
	            padding-bottom: 10px;
        	}
            .navbar-brand
            {
                padding-top: 7px;
            }
        </style>
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
                        <font color="#fff"><img src="asset/logo.png" width="40px"> PT Taisho Pharmaceutical Indonesia</font>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                	 <ul class="nav navbar-nav navbar-right">

                     @if (Route::has('login'))
                		
                    	@if (Auth::check())
                            @if(Auth::user()->role=='admin')
                        	   <li><a href="{{ url('/home') }}" style="color:#fff;"> <span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
                            @else
                                <li><a href="{{ url('/incentive') }}" style="color:#fff;"> <span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
                            @endif
                    	@else
                        	<li><a href="{{ url('/login') }}" style="color:#fff;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <li><a href="{{ url('/register') }}" style="color:#fff;"> <span class="glyphicon glyphicon-user"></span> Register</a></li>
                   		@endif
            		@endif
                </div>
            </div>
        </header>
      </nav>
  </div>
	@yield('content')
    {!! Html::script('asset/js/jquery.min.js') !!}
    {!! Html::script('asset/js/bootstrap.min.js') !!}
</body>
</html>