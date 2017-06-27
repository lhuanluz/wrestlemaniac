@extends('layouts/app')

@section('content')
    
    <!-- Botões de Controle de Visualização-->
    @if($status == 'Fechado')
    <div class="alert alert-danger" role="alert">RAW Market is Closed!</div>
    @if(Auth::user())
    <div class="page-header">
        <h1 class="title">Your Team<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
    </div>
    <div class="info">
    <center>
        <h3>Info</h3>
        <h5 class="btn-info btn-lg btn-block"><i class="fa fa-star-half-o icon fa-lg" aria-hidden="true"></i> Weekly Points: {{$rawTeam->team_points}}</h5>
        <h5 class="btn-warning btn-lg btn-block"><i class="fa fa-star icon fa-lg" aria-hidden="true"></i> Total Points: {{$rawTeam->team_total_points}}</h5>
        <h5 class="btn-success btn-lg btn-block"><i class="glyphicon glyphicon-piggy-bank icon fa-lg"></i> Cash: {{$rawTeam->team_cash}}</h5>
        
       </center> 
    </div> <!-- DIV INFO-->
        
        @foreach($superstars as $superstar)
        @if($rawTeam->superstar01 != $superstar->id  && $rawTeam->superstar02 != $superstar->id && $rawTeam->superstar03 != $superstar->id && $rawTeam->superstar04 != $superstar->id)
        @else
        <div class="meuTime">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info" action="{{route('venderSuperstarRaw')}}" method="post">
            {{ csrf_field()  }}
                <center>
                <!-- Mostra o nome do Superstar -->
                <u><h4>{{$superstar->name}}</h4></u>
                <input type="hidden" name="name" value="{{$superstar->name}}"/>
                <!-- Verifica se o Superstar apareceu no último show -->
                @if($superstar->last_show == 1)
                    <div class="alert-success">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    Appeard on Last Show
                    </div>
                @else
                    <div class="alert-danger" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    Didn't appeard on Last Show
                    </div>
                @endif
                <!-- Mostra os Pontos Atuais / Últimos -->
                <h2 class="pontos">{{$superstar->points . ' / ' . $superstar->last_points}}</h2>
                <!-- Mostra o Preço -->
                <h2 class="preço" name="price"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
                <!-- Verifica se o Usuário está cadastrado, caso contrário não mostra os botões para comprar -->
                <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Market is Closed!
                </button>
                </center>
            </form>
        </div> <!-- DIV meuTime -->
        @endif
        @endforeach
    @else
    @endif

    <div class="controladores btn-group-justified">
        <div class="page-header">
            <h1 class="title">Market<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
        </div>
        <!-- Sempre veremos o botão Name▲ -->
        <a href="{{route('mercadoRawHome')}}">Name▲</a>
        <!-- Condiciona que os botões Price▲ e Points▲  só irão aparecer quando:
        -> Estivermos vendo a Home do Mercado
        ->Estivermos Vendo o Price▼ ou Points▼
        -->
        @if(Route::is('mercadoRawHome')|| Route::is('mercadoRawPriceDesc') ||Route::is('mercadoRawPointsDesc'))
            <a href="{{route('mercadoRawPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoRawPointsAsc')}}">Points▲</a>
        @endif
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Price▲
        -->
        @if(Route::is('mercadoRawPriceAsc'))
            <a href="{{route('mercadoRawPriceDesc')}}">Price▼</a>
            <a href="{{route('mercadoRawPointsAsc')}}">Points▲</a>
        @endif  
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Points▲
        -->
        @if(Route::is('mercadoRawPointsAsc'))
            <a href="{{route('mercadoRawPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoRawPointsDesc')}}">Points▼</a>
        @endif      
    </div> <!-- DIV CONTROLADORES -->
    
    <!-- Listamento de Superstars-->
    <div class="container market">
    @foreach($superstars as $superstar)
        @if($superstar->id == 999 || $superstar->id == 998 || $superstar->id == 997 || $superstar->id == 996 || $rawTeam->superstar01 == $superstar->id  || $rawTeam->superstar02 == $superstar->id || $rawTeam->superstar03 == $superstar->id || $rawTeam->superstar04 == $superstar->id)
        @else
        <div class="lutador">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info" action="{{route('comprarSuperstarRaw')}}" method="post">
            {{ csrf_field()  }}
                <center>
                <!-- Mostra o nome do Superstar -->
                <u><h4>{{$superstar->name}}</h4></u>
                <input type="hidden" name="name" value="{{$superstar->name}}"/>
                <!-- Verifica se o Superstar apareceu no último show -->
                @if($superstar->last_show == 1)
                    <div class="alert-success">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    Appeard on Last Show
                    </div>
                @else
                    <div class="alert-danger" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    Didn't appeard on Last Show
                    </div>
                @endif
                <!-- Mostra os Pontos Atuais / Últimos -->
                <h2 class="pontos">{{$superstar->points . ' / ' . $superstar->last_points}}</h2>
                <!-- Mostra o Preço -->
                <h2 class="preço" name="price"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
                <!-- Verifica se o Usuário está cadastrado, caso contrário não mostra os botões para comprar -->
                <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Market is Closed!
                </button>
                </center>
            </form>
        </div> <!-- DIV LUTADOR -->
        
        @endif
    @endforeach
    </div> <!-- DIV CONTAINER > LUTADOR -->

    @else
    @if(Auth::user())
    <div class="page-header">
        <h1 class="title">Your Team<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
    </div>
    <div class="info">
    <center>
        <h3>Info</h3>
        <h5 class="btn-info btn-lg btn-block"><i class="fa fa-star-half-o icon fa-lg" aria-hidden="true"></i> Weekly Points: {{$rawTeam->team_points}}</h5>
        <h5 class="btn-warning btn-lg btn-block"><i class="fa fa-star icon fa-lg" aria-hidden="true"></i> Total Points: {{$rawTeam->team_total_points}}</h5>
        <h5 class="btn-success btn-lg btn-block"><i class="glyphicon glyphicon-piggy-bank icon fa-lg"></i> Cash: {{$rawTeam->team_cash}}</h5>
        
       </center> 
    </div> <!-- DIV INFO-->
        
        @foreach($superstars as $superstar)
        @if($rawTeam->superstar01 != $superstar->id  && $rawTeam->superstar02 != $superstar->id && $rawTeam->superstar03 != $superstar->id && $rawTeam->superstar04 != $superstar->id)
        @else
        <div class="meuTime">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info" action="{{route('venderSuperstarRaw')}}" method="post">
            {{ csrf_field()  }}
                <center>
                <!-- Mostra o nome do Superstar -->
                <u><h4>{{$superstar->name}}</h4></u>
                <input type="hidden" name="name" value="{{$superstar->name}}"/>
                <!-- Verifica se o Superstar apareceu no último show -->
                @if($superstar->last_show == 1)
                    <div class="alert-success">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    Appeard on Last Show
                    </div>
                @else
                    <div class="alert-danger" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    Didn't appeard on Last Show
                    </div>
                @endif
                <!-- Mostra os Pontos Atuais / Últimos -->
                <h2 class="pontos">{{$superstar->points . ' / ' . $superstar->last_points}}</h2>
                <!-- Mostra o Preço -->
                <h2 class="preço" name="price"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
                <!-- Verifica se o Usuário está cadastrado, caso contrário não mostra os botões para comprar -->
                @if($superstar->name == 'None')
                <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Can't Sell
                </button>
                @else
                <button type="Submit" class="btn btn-danger btn-group-justified">
                <i class="fa fa-thumbs-o-down fa-lg icon" aria-hidden="true"></i>Sell
                </button>
                @endif
                </center>
            </form>
        </div> <!-- DIV meuTime -->
        @endif
        @endforeach
    @else
    @endif

    <div class="controladores btn-group-justified">
        <div class="page-header">
            <h1 class="title">Market<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
        </div>
        <!-- Sempre veremos o botão Name▲ -->
        <a href="{{route('mercadoRawHome')}}">Name▲</a>
        <!-- Condiciona que os botões Price▲ e Points▲  só irão aparecer quando:
        -> Estivermos vendo a Home do Mercado
        ->Estivermos Vendo o Price▼ ou Points▼
        -->
        @if(Route::is('mercadoRawHome')|| Route::is('mercadoRawPriceDesc') ||Route::is('mercadoRawPointsDesc'))
            <a href="{{route('mercadoRawPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoRawPointsAsc')}}">Points▲</a>
        @endif
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Price▲
        -->
        @if(Route::is('mercadoRawPriceAsc'))
            <a href="{{route('mercadoRawPriceDesc')}}">Price▼</a>
            <a href="{{route('mercadoRawPointsAsc')}}">Points▲</a>
        @endif  
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Points▲
        -->
        @if(Route::is('mercadoRawPointsAsc'))
            <a href="{{route('mercadoRawPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoRawPointsDesc')}}">Points▼</a>
        @endif      
    </div> <!-- DIV CONTROLADORES -->
    
    <!-- Listamento de Superstars-->
    <div class="container market">
    @foreach($superstars as $superstar)
        @if($superstar->id == 999 || $superstar->id == 998 || $superstar->id == 997 || $superstar->id == 996 || $rawTeam->superstar01 == $superstar->id  || $rawTeam->superstar02 == $superstar->id || $rawTeam->superstar03 == $superstar->id || $rawTeam->superstar04 == $superstar->id)
        @else
        <div class="lutador">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info" action="{{route('comprarSuperstarRaw')}}" method="post">
            {{ csrf_field()  }}
                <center>
                <!-- Mostra o nome do Superstar -->
                <u><h4>{{$superstar->name}}</h4></u>
                <input type="hidden" name="name" value="{{$superstar->name}}"/>
                <!-- Verifica se o Superstar apareceu no último show -->
                @if($superstar->last_show == 1)
                    <div class="alert-success">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    Appeard on Last Show
                    </div>
                @else
                    <div class="alert-danger" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    Didn't appeard on Last Show
                    </div>
                @endif
                <!-- Mostra os Pontos Atuais / Últimos -->
                <h2 class="pontos">{{$superstar->points . ' / ' . $superstar->last_points}}</h2>
                <!-- Mostra o Preço -->
                <h2 class="preço" name="price"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
                <!-- Verifica se o Usuário está cadastrado, caso contrário não mostra os botões para comprar -->
                @if(Auth::user())
                    <!-- Caso seja um Superstar do RAW mostra botão vermelho -->
                        @if($rawTeam->superstar01 != 999 && $rawTeam->superstar02 != 998 && $rawTeam->superstar03 != 997 && $rawTeam->superstar04 != 996 )
                            <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                            <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Not enough space
                            </button>
                        @elseif($rawTeam->team_cash < $superstar->price)
                            <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                            <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Not enough cash
                            </button>
                        @else
                            <button type="Submit" class="btn btn-danger btn-group-justified">
                            <i class="fa fa-thumbs-o-up fa-lg icon" aria-hidden="true"></i>Buy
                            </button>
                        @endif
                @endif
                </center>
            </form>
        </div> <!-- DIV LUTADOR -->
        
        @endif
    @endforeach
    </div> <!-- DIV CONTAINER > LUTADOR -->
    @endif
@endsection