@extends('layouts/app')

@section('content')
    <!-- Botões de Controle de Visualização-->
    <div class="controladores btn-group-justified">
        <!-- Sempre veremos o botão Name▲ -->
        <a href="{{route('mercadoHome')}}">Name▲</a>
        <!-- Condiciona que os botões Price▲ e Points▲  só irão aparecer quando:
        -> Estivermos vendo a Home do Mercado
        ->Estivermos Vendo o Price▼ ou Points▼
        -->
        @if(Route::is('mercadoHome')|| Route::is('mercadoPriceDesc') ||Route::is('mercadoPointsDesc'))
            <a href="{{route('mercadoPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoPointsAsc')}}">Points▲</a>
        @endif
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Price▲
        -->
        @if(Route::is('mercadoPriceAsc'))
            <a href="{{route('mercadoPriceDesc')}}">Price▼</a>
            <a href="{{route('mercadoPointsAsc')}}">Points▲</a>
        @endif  
        <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
        -> Estivermos vendo o Points▲
        -->
        @if(Route::is('mercadoPointsAsc'))
            <a href="{{route('mercadoPriceAsc')}}">Price▲</a>
            <a href="{{route('mercadoPointsDesc')}}">Points▼</a>
        @endif      
    </div>
    <!-- Listamento de Superstars-->
    @foreach($superstars as $superstar)
        
        <div class="lutador">
            <img src="{{url($superstar->image)}}" alt="Card image cap">
            <form class="lutador-info">
                <center>
                <!-- Mostra o nome do Superstar -->
                <u><h4 name="name">{{$superstar->name}}</h4></u>
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
                <h2 class="preço"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
                <!-- Verifica se o Usuário está cadastrado, caso contrário não mostra os botões para comprar -->
                @if(Auth::user())
                    <!-- Caso seja um Superstar do RAW mostra botão vermelho -->
                    @if($superstar->brand == 'Raw')
                        <input type=Submit value="Buy" class="btn btn-danger btn-group-justified">
                    <!-- Caso não seja do RAW mostra botão azul -->
                    @else
                        <input type=Submit value="Buy" class="btn btn-primary btn-group-justified">
                    @endif
                @endif
                
                </center>
            </form>
        </div>
    @endforeach
@endsection
