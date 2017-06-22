@extends('layouts/app')

@section('content')
    
    <!-- Botões de Controle de Visualização-->

    @if(Auth::user())
    
    <h1 class="title">Your Team</h1>
    <div class="info">
    <center>
        <h3>Info</h3>
        <h5 class="btn-info btn-lg btn-block"><span class="glyphicon glyphicon-star"> Points: {{$rawTeam->team_points}}</h5>
        <h5 class="btn-success btn-lg btn-block"><span class="glyphicon glyphicon-usd"> Cash: {{$rawTeam->team_cash}}</h5>
        
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
                    <input type=Submit value="Sell" class="btn btn-danger btn-group-justified">
                </center>
            </form>
        </div> <!-- DIV meuTime -->
        @endif
        @endforeach
    @else
    @endif

    <div class="controladores btn-group-justified">
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
    <div class="container">
    @foreach($superstars as $superstar)
        @if($superstar->id == 999 || $rawTeam->superstar01 == $superstar->id  || $rawTeam->superstar02 == $superstar->id || $rawTeam->superstar03 == $superstar->id || $rawTeam->superstar04 == $superstar->id)
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
                            <input type=Submit value="Not enough space" class="btn btn-danger btn-group-justified" disabled>
                        @elseif($rawTeam->team_cash < $superstar->price)
                            <input type=Submit value="Not enough cash" class="btn btn-danger btn-group-justified" disabled>
                        @else
                            <input type=Submit value="Buy" class="btn btn-danger btn-group-justified">
                        @endif
                @endif
                </center>
            </form>
        </div> <!-- DIV LUTADOR -->
        
        @endif
    @endforeach
    </div> <!-- DIV CONTAINER > LUTADOR -->
@endsection