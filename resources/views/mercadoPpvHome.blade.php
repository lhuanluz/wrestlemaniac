@extends('layouts/app')

@section('content')
    
    <!-- Botões de Controle de Visualização-->
    @if($status == 'Fechado')
    <div class="alert alert-danger" role="alert">PPV Market is Closed!</div>
    @if(Auth::user())
    <div class="page-header">
        <h1 class="title">Your Team<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
    </div>
    <div class="info">
    <center>
        <h3>Info</h3>
        <h5 class="btn-info btn-lg btn-block"><i class="fa fa-star-half-o icon fa-lg" aria-hidden="true"></i> Weekly Points: {{$ppvTeam->team_points}}</h5>
        <h5 class="btn-warning btn-lg btn-block"><i class="fa fa-star icon fa-lg" aria-hidden="true"></i> Total Points: {{$ppvTeam->team_total_points}}</h5>
        <h5 class="btn-success btn-lg btn-block"><i class="glyphicon glyphicon-piggy-bank icon fa-lg"></i> Cash: {{$ppvTeam->team_cash}}</h5>
        
       </center> 
    </div> <!-- DIV INFO-->
        
        @foreach($superstars as $superstar)
        @if($ppvTeam->superstar01 != $superstar->id  && $ppvTeam->superstar02 != $superstar->id && $ppvTeam->superstar03 != $superstar->id && $ppvTeam->superstar04 != $superstar->id)
        @else
        <div class="meuTime">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info" action="{{route('venderSuperstarPpv')}}" method="post">
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
                <button type="Submit" class="btn ppv btn-group-justified" disabled>
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
        <a href="{{route('mercadoPpvHome')}}">Name▲</a>
        <!-- Condiciona que os botões Price▲ e Points▲  só irão aparecer quando:
        -> Estivermos vendo a Home do Mercado
        ->Estivermos Vendo o Price▼ ou Points▼
        -->
        @if(Route::is('mercadoPpvHome')|| Route::is('mercadoPpvPriceDesc') ||Route::is('mercadoPpvPointsDesc'))
            <a href="{{route('mercadoPpvPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoPpvPointsAsc')}}">Points▲</a>
        @endif
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Price▲
        -->
        @if(Route::is('mercadoPpvPriceAsc'))
            <a href="{{route('mercadoPpvPriceDesc')}}">Price▼</a>
            <a href="{{route('mercadoPpvPointsAsc')}}">Points▲</a>
        @endif  
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Points▲
        -->
        @if(Route::is('mercadoPpvPointsAsc'))
            <a href="{{route('mercadoPpvPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoPpvPointsDesc')}}">Points▼</a>
        @endif      
    </div> <!-- DIV CONTROLADORES -->
    
    <!-- Listamento de Superstars-->
    <div class="container market">
    @foreach($superstars as $superstar)
        @if($superstar->id == 103 || $superstar->id == 102 || $superstar->id == 101 || $superstar->id == 100 || $ppvTeam->superstar01 == $superstar->id  || $ppvTeam->superstar02 == $superstar->id || $ppvTeam->superstar03 == $superstar->id || $ppvTeam->superstar04 == $superstar->id)
        @else
        <div class="lutador">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info" action="{{route('comprarSuperstarPpv')}}" method="post">
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
                <button type="Submit" class="btn ppv btn-group-justified" disabled>
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
        <h5 class="btn-info btn-lg btn-block"><i class="fa fa-star-half-o icon fa-lg" aria-hidden="true"></i> Weekly Points: {{$ppvTeam->team_points}}</h5>
        <h5 class="btn-warning btn-lg btn-block"><i class="fa fa-star icon fa-lg" aria-hidden="true"></i> Total Points: {{$ppvTeam->team_total_points}}</h5>
        <h5 class="btn-success btn-lg btn-block"><i class="glyphicon glyphicon-piggy-bank icon fa-lg"></i> Cash: {{$ppvTeam->team_cash}}</h5>
        
       </center> 
    </div> <!-- DIV INFO-->
        
        @foreach($superstars as $superstar)
        @if($ppvTeam->superstar01 != $superstar->id  && $ppvTeam->superstar02 != $superstar->id && $ppvTeam->superstar03 != $superstar->id && $ppvTeam->superstar04 != $superstar->id)
        @else
        <div class="meuTime">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info" action="{{route('venderSuperstarPpv')}}" method="post">
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
                <button type="Submit" class="btn ppv btn-group-justified" disabled>
                <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Can't Sell
                </button>
                @else
                <button type="Submit" class="btn ppv btn-group-justified">
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
        <a href="{{route('mercadoPpvHome')}}">Name▲</a>
        <!-- Condiciona que os botões Price▲ e Points▲  só irão aparecer quando:
        -> Estivermos vendo a Home do Mercado
        ->Estivermos Vendo o Price▼ ou Points▼
        -->
        @if(Route::is('mercadoPpvHome')|| Route::is('mercadoPpvPriceDesc') ||Route::is('mercadoPpvPointsDesc'))
            <a href="{{route('mercadoPpvPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoPpvPointsAsc')}}">Points▲</a>
        @endif
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Price▲
        -->
        @if(Route::is('mercadoPpvPriceAsc'))
            <a href="{{route('mercadoPpvPriceDesc')}}">Price▼</a>
            <a href="{{route('mercadoPpvPointsAsc')}}">Points▲</a>
        @endif  
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Points▲
        -->
        @if(Route::is('mercadoPpvPointsAsc'))
            <a href="{{route('mercadoPpvPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoPpvPointsDesc')}}">Points▼</a>
        @endif      
    </div> <!-- DIV CONTROLADORES -->
    
    <!-- Listamento de Superstars-->
    <div class="container market">
    @foreach($superstars as $superstar)
        @if($superstar->id == 103 || $superstar->id == 102 || $superstar->id == 101 || $superstar->id == 100 || $ppvTeam->superstar01 == $superstar->id  || $ppvTeam->superstar02 == $superstar->id || $ppvTeam->superstar03 == $superstar->id || $ppvTeam->superstar04 == $superstar->id)
        @else
        <div class="lutador">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info" action="{{route('comprarSuperstarPpv')}}" method="post">
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
                        @if($ppvTeam->superstar01 != 103 && $ppvTeam->superstar02 != 102 && $ppvTeam->superstar03 != 101 && $ppvTeam->superstar04 != 100 )
                            <button type="Submit" class="btn ppv btn-group-justified" disabled>
                            <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Not enough space
                            </button>
                        @elseif($ppvTeam->team_cash < $superstar->price)
                            <button type="Submit" class="btn ppv btn-group-justified" disabled>
                            <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Not enough cash
                            </button>
                        @else
                            <button type="Submit" class="btn ppv btn-group-justified">
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