<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    
</head>

<body>

    <div id="wrapper">

    <!-- Navigation -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

   <nav class="navbar navbar-default navbar-static-top">
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
                <a class="navbar-brand" href="{{ route('painelAdmin') }}">
                    ADMIN PANEL
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <!--<ul class="nav navbar-nav">
                    &nbsp;
                </ul>-->

                <!-- Right Side Of Navbar -->
                <ul id="menu" class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                        <li class="item-menu"><a href="{{ route('home') }}">Home</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 <i class="fa fa-user-circle fa-lg" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="item-menu">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>Log Out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
            
            <ul id="menu-content" class="menu-content collapse out">
                <ul class="dropdown-menu" role="menu">
                                <li class="item-menu">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                <li class=" {{route::is('painelAdmin') ? 'active' : '' }}">
                    <a href="{{ route('painelAdmin') }}">
                        <i class="fa fa-dashboard fa-lg menu-item"></i> Dashboard
                    </a>
                </li>

                <li  data-toggle="collapse" data-target="#superstars" class="collapsed">
                  <a href="#"><i class="fa fa-star-o fa-lg"></i> Superstars <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="superstars">
                    <li class="{{route::is('criarSuperstar') ? 'active' : '' }}"><a href="{{route('criarSuperstar')}}"><i class="fa fa-plus icon fa-lg"></i>Create Superstar</a></li>
                    <li class="{{route::is('editarSuperstar') ? 'active' : '' }}"><a href="{{route('editarSuperstar')}}"><i class="fa fa-address-card icon fa-lg"></i>Edit Superstar</a></li>
                    <li class="{{route::is('editarChampionRedirect') ? 'active' : '' }}"><a href="{{route('editarChampionRedirect')}}"><i class="fa fa-trophy icon fa-lg"></i>Edit Champion</a></li>
                    <li class="{{route::is('editarFotoRedirect') ? 'active' : '' }}"><a href="{{route('editarFotoRedirect')}}"><i class="fa fa-camera icon fa-lg"></i>Edit Photo</a></li>
                    <li class="{{route::is('editarBrandRedirect') ? 'active' : '' }}"><a href="{{route('editarBrandRedirect')}}"><i class="fa fa-bookmark icon fa-lg"></i>Edit Brand</a></li>
                </ul>

                <li  data-toggle="collapse" data-target="#mercado" class="collapsed">
                  <a href="#"><i class="fa fa-shopping-cart fa-lg"></i> Market <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="mercado">
                    <li class="{{route::is('mercadoStatus') ? 'active' : '' }}"><a href="{{route('mercadoStatusRedirect')}}"><i class="fa fa-lock icon fa-lg"></i>Market Status</a></li>
                    <li class="{{route::is('editarPpv') ? 'active' : '' }}"><a href="{{route('editarPpvRedirect')}}"><i class="fa fa-calendar icon fa-lg"></i>Edit PPV Brand</a></li>
                    <li class="{{route::is('exibirPpv') ? 'active' : '' }}"><a href="{{route('exibirPpvRedirect')}}"><i class="fa fa-eye icon fa-lg"></i>Edit PPV Visibility</a></li>
                </ul>

                <!-- 
                    EM TESTE 
                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li>New Service 1</li>
                  <li>New Service 2</li>
                  <li>New Service 3</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li>New New 1</li>
                  <li>New New 2</li>
                  <li>New New 3</li>
                </ul>


                 <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>
                  -->
                  <li  data-toggle="collapse" data-target="#users" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Users <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="users">
                    <li class="{{route::is('editEmail') ? 'active' : '' }}"><a href="{{route('editEmail')}}"><i class="fa fa-envelope icon fa-lg"></i>Edit E-mail</a></li>
                    <li class="{{route::is('editNome') ? 'active' : '' }}"><a href="{{route('editNome')}}"><i class="fa fa-book icon fa-lg"></i>Edit Name</a></li>
                    <li class="{{route::is('givePro') ? 'active' : '' }}"><a href="{{route('giveProRedirect')}}"><i class="fa fa-gift icon fa-lg"></i>Give Pro</a></li>
                    <li class="{{route::is('editAdmin') ? 'active' : '' }}"><a href="{{route('editAdmin')}}"><i class="fa fa-graduation-cap icon fa-lg"></i>Give Admin</a></li>    
                </ul>

                <li  data-toggle="collapse" data-target="#leagues" class="collapsed">
                  <a href="#"><i class="fa fa-shield fa-lg"></i> Leagues <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="leagues">
                    <li class="{{route::is('atualizarLigas') ? 'active' : '' }}"><a href="{{route('atualizarLigas')}}"><i class="fa fa-refresh icon fa-lg"></i>Update ALL Leaguas</a></li>
                </ul>        

                <li  data-toggle="collapse" data-target="#photos" class="collapsed">
                  <a href="#"><i class="fa fa-camera fa-lg"></i> Photos <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="photos">
                    <li class="{{route::is('addPhoto') ? 'active' : '' }}"><a href="{{route('addPhotoRedirect')}}"><i class="fa fa-plus icon fa-lg"></i>Add Photo</a></li>
                </ul>         
                
                 <li  data-toggle="collapse" data-target="#warnings" class="collapsed">
                  <a href="#"><i class="fa fa-exclamation-triangle"></i> Warnings <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="warnings">
                    <li class="{{route::is('cWarning') ? 'active' : '' }}"><a href="{{route('cWarning')}}"><i class="fa fa-exclamation"></i>Create Warning</a></li>
                    <li class="{{route::is('dWarning') ? 'active' : '' }}"><a href="{{route('dWarning')}}"><i class="fa fa-eraser"></i>Delete Warning</a></li>
                    <li class="{{route::is('dWarning') ? 'active' : '' }}"><a href="{{route('sWarning')}}"><i class="fa fa-eraser"></i>Test Warning</a></li>
                    
                       
                </ul>
            </ul>
     </div>
</div>
        
        
        <!-- CONTEUDO PRINCIPAL -->
        <div id="page-wrapper">
            @yield('conteudo_principal')
        </div>
         <!-- CONTEUDO PRINCIPAL[FIM] -->

    </div>

    <!-- jQuery -->
    <script src="{{ url('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
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
