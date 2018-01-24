@extends('layouts/app')

@section('content')

    <section class="ppv-banner"></section>
    
    <section class="market">
        @if($status == 'Fechado')
        <div class="alert alert-danger" role="alert">PAY PER VIEW Market is Closed!</div>
        @endif
        <div class="container-fluid market-team">
            <h2>Your Team</h2> 
            <?php $precoASerAbatido = 0; ?>
            <div class="row">
                @foreach($superstars as $superstar)
                    @if($ppvTeam->superstar01 != $superstar->id  && $ppvTeam->superstar02 != $superstar->id && $ppvTeam->superstar03 != $superstar->id && $ppvTeam->superstar04 != $superstar->id)
                    @else
                    <?php
                    $precoASerAbatido += $superstar->price;
                    ?>
                
                    <div class="col-md-3 your-team">
                        <div class="d1">
                            <img src="{{ url($superstar->image) }}" alt="{{$superstar->name}}">
                            <p class="ppv">{{$superstar->name}}</p>
                        </div> 

                        <ul class="d2">
                            <li>
                                <p>Score</p>
                                <p>{{$superstar->points}}</p>
                            </li> 
                            <li class="divisor"></li> 
                            <li>
                                <p>Price</p> 
                                <p>$ {{$superstar->price}}</p>
                            </li>
                        </ul>
                        <form id="vender{{$superstar->name}}" class="lutador-info" action="{{route('venderSuperstarPpv')}}" method="post">
                            {{ csrf_field()  }}
                            <input type="hidden" name="name" value="{{$superstar->name}}"/>
                            @if($superstar->name == 'None') 
                            <a disabled>Can't Sell</a>
                            @else
                            <a href="javascript:{}" onclick="document.getElementById('vender{{$superstar->name}}').submit(); return false;" class="btn-buy">Sell</a>
                            @endif
                        </form> 
                    </div>
                
                    @endif
                @endforeach
                
                
            </div> 
            
            <div class="row"> <!-- MARKET INFO -->
                <div class="market-info col-md-9">
                    <ul>
                        <li>
                            <p>Total Cash</p> 
                            <p>$ {{$ppvTeam->team_cash + $precoASerAbatido}}</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Cash Available</p> 
                            <p>$ {{$ppvTeam->team_cash}}</p>
                        </li> 
                        <li class="divisor"></li> 

                        <li>
                            <p>Market Status</p>
                            @if($status == 'Aberto')
                            <p class="market-open">OPEN</p>
                            @else
                            <p class="market-close">CLOSED</p>
                            @endif
                        </li>                    
                    </ul>                
                </div> 
                
                <!-- <div class="col-md-3">
                    <a href="#" class="sell-all">Sell all</a> 
                    <a href="#" class="confirm-team">Confirm team</a>
                </div> -->
            </div>
        </div>
    </section>

    <section class="container-fluid marketplace">
        <div class="row">
            <h2>Market</h2>
            
            <div id="wrapSearch" class="mercadoSearch">
                <form action="" autocomplete="on">
                    <input id="txtBusca" name="search" type="text" placeholder="Search for a superstar"><input id="search_submit" value="Rechercher" type="">
                </form>
            </div>

            <div class="controles">
                <!-- Sempre veremos o botão Name▲ -->
                <a href="{{route('mercadoPpvHome')}}">Name ▲</a>
                <!-- Condiciona que os botões Price▲ e Points▲  só irão aparecer quando:
                -> Estivermos vendo a Home do Mercado
                ->Estivermos Vendo o Price▼ ou Points▼
                -->
                @if(Route::is('mercadoPpvHome')|| Route::is('mercadoPpvPriceDesc') ||Route::is('mercadoPpvPointsDesc'))
                    <a href="{{route('mercadoPpvPriceAsc')}}">Price ▲</a>
                    <a href="{{route('mercadoPpvPointsAsc')}}">Points ▲</a>
                @endif
                <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
                -> Estivermos vendo o Price▲
                -->
                @if(Route::is('mercadoPpvPriceAsc'))
                    <a href="{{route('mercadoPpvPriceDesc')}}">Price ▼</a>
                    <a href="{{route('mercadoPpvPointsAsc')}}">Points ▲</a>
                @endif  
                <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
                -> Estivermos vendo o Points▲
                -->
                @if(Route::is('mercadoPpvPointsAsc'))
                    <a href="{{route('mercadoPpvPriceAsc')}}">Price ▲</a>
                    <a href="{{route('mercadoPpvPointsDesc')}}">Points ▼</a>
                @endif  
            </div> <!-- DIV CONTROLES -->  


            

            <div class="separador"></div>
            <ul id="ulItens">
            @foreach($superstars as $superstar)
                <li class="pontosSelect">
                @if($superstar->id == 103 || $superstar->id == 102 || $superstar->id == 101 || $superstar->id == 100 || $ppvTeam->superstar01 == $superstar->id  || $ppvTeam->superstar02 == $superstar->id || $ppvTeam->superstar03 == $superstar->id || $ppvTeam->superstar04 == $superstar->id)
                @else
                <div class="container-fluid market-superstar">
                    <div class="row">
                            <div class="col-md-2 superstar-img">
                                <img src="{{ url($superstar->image) }}" alt="Superstar image">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>{{$superstar->name}}</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <ul>
                                            <li>
                                                <p>Last Show Score</p> 
                                                <p>{{$superstar->points}}</p>
                                            </li> 
                                            <li class="divisor"></li> 
                                            <li>
                                                <p>Appreciation</p>

                                                @if($superstar->points < 3.0)
                                                    @if($superstar->price - (100 - $superstar->points * 10) <= 500)
                                                        <p><span class="positive">+</span>$ 0</p>
                                                    @else
                                                        <p><span class="negative">-</span>$ {{(100 - $superstar->points * 10)}}</p>
                                                    @endif
                                                @else 
                                                <p><span>+</span>$ {{$superstar->points * 10}}</p>
                                                @endif
                                                
                                            </li>
                                            @if($superstar->champion >= 1)
                                            <li hidden>champion</li> 
                                            @endif
                                            <li class="divisor"></li> 
                                            <li>
                                                <p>Price</p> 
                                                <p>$ {{$superstar->price}}</p>
                                            </li>   
                                            <li>
                                                @if(Auth::user())
                                                    <form id="comprar{{$superstar->name}}" class="lutador-info" action="{{route('comprarSuperstarPpv')}}" method="post">
                                                        {{ csrf_field()  }}
                                                    <input type="hidden" name="name" value="{{$superstar->name}}"/>
                                                    @if($ppvTeam->superstar01 != 103 && $ppvTeam->superstar02 != 102 && $ppvTeam->superstar03 != 101 && $ppvTeam->superstar04 != 100 )
                                                        
                                                    @elseif($ppvTeam->team_cash < $superstar->price)
                                                        
                                                    @elseif($status == 'Fechado')
                                                        
                                                    @else
                                                        
                                                        <a href="javascript:{}" onclick="document.getElementById('comprar{{$superstar->name}}').submit(); return false;" class="btn-buy">Buy</a>
                                                    @endif
                                                    </form>
                                                @endif
                                            </li>               
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </li>
            @endforeach
            </ul>    
            
        </div>
        
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
            $(function(){
                $("#txtBusca").keyup(function(){
                    var texto = $(this).val();
                    
                    $("#ulItens li").css("display", "inline");
                    $("#ulItens li").each(function(){
                        if($(this).text().toUpperCase().indexOf(texto.toUpperCase()) < 0)
                            $(this).css("display", "none");
                    });
                });
            });

    </script>
    


    
    <!-- PÁGINA ANTIGA -->

    @if($status == 'Fechado')
        <div class="alert alert-danger" role="alert">RAW Market is Closed!</div>
    @endif

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
                    <button type="Submit" class="btn ppv  btn-group-justified" disabled>
                    <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Can't Sell
                    </button>
                    @elseif($status == 'Fechado')
                        <button type="Submit" class="btn ppv  btn-group-justified" disabled>
                            <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Market is Closed!
                        </button>
                    @else
                    <button type="Submit" class="btn ppv  btn-group-justified">
                    <i class="fa fa-thumbs-o-down fa-lg icon" aria-hidden="true"></i>Sell
                    </button>
                    @endif
                    </center>
                </form>
            </div> <!-- DIV meuTime -->
            @endif
        @endforeach

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
        <div id="wrapSearch" class="mercadoSearch">
            <form action="" autocomplete="on">
                <input id="txtBusca" name="search" type="text" placeholder="Search for a superstar"><input id="search_submit" value="Rechercher" type="">
            </form>
        </div>      
    </div> <!-- DIV CONTROLADORES -->
    
    <!-- Listamento de Superstars-->
    <div class="container market">
        <ul id="ulItens">
            @foreach($superstars as $superstar)
                <li class="pontosSelect">
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
                                    <button type="Submit" class="btn ppv  btn-group-justified" disabled>
                                    <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Not enough space
                                    </button>
                                @elseif($ppvTeam->team_cash < $superstar->price)
                                    <button type="Submit" class="btn ppv  btn-group-justified" disabled>
                                    <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Not enough cash
                                    </button>
                                @elseif($status == 'Fechado')
                                    <button type="Submit" class="btn ppv  btn-group-justified" disabled>
                                        <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Market is Closed!
                                    </button>
                                @else
                                    <button type="Submit" class="btn ppv  btn-group-justified">
                                    <i class="fa fa-thumbs-o-up fa-lg icon" aria-hidden="true"></i>Buy
                                    </button>
                                @endif
                        @endif
                        </center>
                    </form>
                </div> <!-- DIV LUTADOR -->
                @endif
                </li>
            @endforeach
        </ul>
    </div> <!-- DIV CONTAINER > LUTADOR -->
@endsection