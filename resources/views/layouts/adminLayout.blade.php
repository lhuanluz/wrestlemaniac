<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Painel Admin</title>

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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- TOGGLE  -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('painelAdmin')}}">Painel Admin</a>
            </div>

            <!-- MENU DO USUÁRIO -->
            <ul class="nav navbar-right top-nav">
                <li><a href="{{ route('inicio') }}">Home</a></li>
                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
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
                            </li>
            </ul>
            <!-- MENU DO USUÁRIO[FIM] -->

            <!-- SIDEBAR -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                @if(Route::is('criarSuperstar'))
                    <li class="active">
                @else
                    <li class="">     
                @endif
                         <a href="{{url('admin/superstar/create')}}"><i class="fa fa-fw fa-table"></i> Criar Superstar</a>
                    </li>

                @if(Route::is('editarSuperstar'))
                    <li class="active">
                @else
                    <li class="">     
                @endif
                         <a href="{{url('/admin/superstar/edit')}}"><i class="fa fa-fw fa-table"></i> Editar Superstar</a>
                    </li>
                </ul>
            </div>
            <!-- SIDEBAR[FIM] -->
        </nav>

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

</body>

</html>
