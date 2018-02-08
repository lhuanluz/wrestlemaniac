<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wrestlemaniac</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('css/lutador.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Home CSS -->
    <link href="{{ url('css/home.css') }}" rel="stylesheet">

    <!-- Profile CSS -->
    <link href="{{ url('css/profile.css') }}" rel="stylesheet">

    <!-- Market CSS -->
    <link href="{{ url('css/market.css') }}" rel="stylesheet">

    <!-- Shop CSS -->
    <link href="{{ url('css/shop.css') }}" rel="stylesheet">

    <!-- FAQ CSS -->
    <link href="{{ url('css/faq.css') }}" rel="stylesheet">

    <!-- League CSS -->
    <link href="{{ url('css/league.css') }}" rel="stylesheet">

    <!-- Rank CSS -->
    <link href="{{ url('css/statistics.css') }}" rel="stylesheet">

    <!-- Select Photo CSS -->
    <link href="{{ url('css/selectPhoto.css') }}" rel="stylesheet">



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid nav-container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ url('img/logo.png') }}"/>
                        <!--WRESTLEMANIAC-->
                    </a>
                </div>

                <!-- ÍCONE DE NOTIFICAÇÃO
                <div class="notification-div">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-bell" aria-hidden="true"></i><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="">Notification 01</a></li>
                        <li><a href="">Notification 02</a></li>
                        <li><a href="">Notification 03</a></li>
                    </ul>
                </div>
                -->

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <!--<ul class="nav navbar-nav">
                        &nbsp;
                    </ul>-->

                    <!-- Right Side Of Navbar -->
                    <!-- <ul id="menu" class="nav navbar-nav navbar-right"> -->
                        <!-- Authentication Links -->

                        @if (Auth::guest())
                        <ul id="menu-public" class="nav navbar-nav navbar-right">
                            <!-- <li><a href="{{ route('home') }}">Home</a></li> -->
                            <!-- <li><a href="{{ route('howToPlay') }}">How to Play</a></li> -->
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('register') }}">SIGN UP</a></li>
                            <li><a href="{{ route('login') }}">LOG IN</a></li>
                         <ul>   
                        @else
                            <!-- Verificação Admin-->
                    <ul id="menu-user" class="nav navbar-nav navbar-left">
                            <li><a href="{{ route('home') }}">Home</a></li>

                            <li><a href="{{route('leagueHome')}}">League</a></li>

                             <li><a href="{{route('statistics')}}">Rank</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Market <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('mercadoRawHome')}}">Raw</a></li>
                                    <li><a href="{{route('mercadoSmackdownHome')}}">Smackdown</a></li>
                                    <li><a href="{{route('mercadoPpvHome')}}">Pay Per View</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="{{route('iconStore')}}">Icon Store</a></li>
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Help <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('gameRules') }}">Games Rules</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                </ul>
                            </li>
                    </ul><!-- menu-user navbar-left -->

                    
                            <ul id="menu-user" class="nav navbar-nav navbar-right">                               
                                <li class="dropdown user-dropdown"> 
                                                
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <div class="avatar-nav" style="background: url(/{{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                                        <i aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>                                    

                                    <ul class="dropdown-menu" role="menu">
                                        @if(Auth::user()->user_power >= 1)
                                        <li><a href="{{ route('painelAdmin') }}"><i class="fa fa-birthday-cake"></i> Admin</a></li>
                                        @endif
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> Log Out
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul> <!-- menu-user navbar-right -->
                            
                        @endif
                    <!--</ul>-->
                </div>
            </div>
        </nav>

        @yield('content')
            <footer>
                <div class="container-fluid">
                    <div class="row">                        

                        <div class="col-xs-3 col-sm-3 col-md-3 footer-logo">
                            <ul>
                                <li><a href="{{ url('/') }}">Wrestlemaniac Inc.</a></li>
                                <li>Los Angeles, CA</li>
                            </ul>
                            <a href="https://www.facebook.com/TheWrestlemaniac/" target="_blank"><img src="{{ url('img/facebook-icon.png') }}" alt="Facebook" ></a>
                        </div>

                        <div class="col-xs-9 col-sm-9 col-md-9 footer-menu">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <ul>
                                        <li>Company</li>
                                        <li><a href="#">Contact us</a></li>
                                        <li><a href="#">About Wrestlemaniac</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <ul>
                                        <li>Help</li>
                                        <li><a href="#">How it Works</a></li>
                                        <li><a href="#">How to Play</a></li>
                                        <li><a href="#">Rules and Scoring</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <ul>
                                        <li>MORE</li>
                                        <li><a href="#">Wrestlemaniac is a fan product with no relationship with WWE, all images are property of World Wrestling Entertainment, Inc</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </footer>
           
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-104800147-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
