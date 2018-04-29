@extends('layouts/app')

@section('content')
    <section class="raw-banner"></section>
    <section class="market">
        @if($status == 'Fechado')
        <div class="alert alert-danger" role="alert">RAW Market is Closed!</div>
        @endif
        <div class="container-fluid market-team">
            <h2>Your Team</h2> 
            <?php $precoASerAbatido = 0; ?>
            <div class="row">
                @foreach($superstars as $superstar)
                    @if($rawTeam->superstar01 != $superstar->id  && $rawTeam->superstar02 != $superstar->id && $rawTeam->superstar03 != $superstar->id && $rawTeam->superstar04 != $superstar->id)
                    @else
                    <?php
                    $precoASerAbatido += $superstar->price;
                    ?>
                
                    <div class="col-md-3 your-team" id="{{ $superstar->id }}">
                        <div class="d1">
                            <img src="{{ url($superstar->image) }}" alt="{{$superstar->name}}">
                            <p>{{$superstar->name}}</p>
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
                        <form id="vender{{$superstar->id}}" class="lutador-info" action="{{route('venderSuperstarRaw')}}" method="post">
                            {{ csrf_field()  }}
                            <input type="hidden" name="name" value="{{$superstar->name}}"/>
                            @if($superstar->name == 'None' || $status == 'Fechado') 
                            <a disabled>Can't Sell</a>
                            @else
                            <a href="javascript:{}" onclick="document.getElementById('vender{{$superstar->id}}').submit(); return false;" class="btn-buy">Sell</a>
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
                            <p>$ {{$rawTeam->team_cash + $precoASerAbatido}}</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Cash Available</p> 
                            <p>$ {{$rawTeam->team_cash}}</p>
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
        <div class="user-img">
        @foreach($superstarsFavoritos as $superstarFavorito)
                <a href="#{{ $superstarFavorito->id }}">
                    <img src="{{ url($superstarFavorito->image) }}" class="img-circle img-thumbnail img-responsive superstarFavorito">
                </a>
            
        @endforeach
        </div>
    
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
                <a href="{{route('mercadoRawHome')}}">Name ▲</a>
                <!-- Condiciona que os botões Price▲ e Points▲  só irão aparecer quando:
                -> Estivermos vendo a Home do Mercado
                ->Estivermos Vendo o Price▼ ou Points▼
                -->
                @if(Route::is('mercadoRawHome')|| Route::is('mercadoRawPriceDesc') ||Route::is('mercadoRawPointsDesc'))
                    <a href="{{route('mercadoRawPriceAsc')}}">Price ▲</a>
                    <a href="{{route('mercadoRawPointsAsc')}}">Points ▲</a>
                @endif
                <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
                -> Estivermos vendo o Price▲
                -->
                @if(Route::is('mercadoRawPriceAsc'))
                    <a href="{{route('mercadoRawPriceDesc')}}">Price ▼</a>
                    <a href="{{route('mercadoRawPointsAsc')}}">Points ▲</a>
                @endif  
                <!-- Condiciona que os botões Price▼ e Points▲  só irão aparecer quando:
                -> Estivermos vendo o Points▲
                -->
                @if(Route::is('mercadoRawPointsAsc'))
                    <a href="{{route('mercadoRawPriceAsc')}}">Price ▲</a>
                    <a href="{{route('mercadoRawPointsDesc')}}">Points ▼</a>
                @endif  
            </div> <!-- DIV CONTROLES -->
            
            <div class="separador"></div>
            <ul id="ulItens">
            @foreach($superstars as $superstar)
                <li class="pontosSelect">
                @if($superstar->id == 103 || $superstar->id == 102 || $superstar->id == 101 || $superstar->id == 100 || $rawTeam->superstar01 == $superstar->id  || $rawTeam->superstar02 == $superstar->id || $rawTeam->superstar03 == $superstar->id || $rawTeam->superstar04 == $superstar->id)
                @else
                <div class="container-fluid market-superstar" id="{{ $superstar->id }}">
                    <div class="row">
                            <div class="col-md-2 col-xs-12 superstar-img">
                                <img src="{{ url($superstar->image) }}" alt="Superstar image">
                            </div>
                            <div class="col-md-10 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>{{$superstar->name}}</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <ul>
                                            <li>
                                                <p>Last Show Score</p>
                                                @if($superstar->last_show == 1)
                                                <p>{{$superstar->points}}</p>
                                                @else
                                                <p class="didnAppear">Didn't Appear</p>
                                                @endif
                                                
                                            </li> 
                                            <li class="divisor"></li> 
                                            <li>
                                                <p>Appreciation</p>
                                                @if($superstar->last_show == 1)
                                                    @if($superstar->points < 3.0)
                                                        @if($superstar->price - (100 - $superstar->points * 10) <= 500)
                                                            <p><span class="positive">+</span>$ 0</p>
                                                        @else
                                                            <p><span class="negative">-</span>$ {{(100 - $superstar->points * 10)}}</p>
                                                        @endif
                                                    @else 
                                                    <p><span class="positive">+</span>$ {{$superstar->points * 10}}</p>
                                                    @endif
                                                @else
                                                <p><span class="negative">-</span>$ 5%</p>
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
                                                    <form id="comprar{{$superstar->id}}" class="lutador-info" action="{{route('comprarSuperstarRaw')}}" method="post">
                                                        {{ csrf_field()  }}
                                                    <input type="hidden" name="name" value="{{$superstar->name}}"/>
                                                    @if($rawTeam->superstar01 != 103 && $rawTeam->superstar02 != 102 && $rawTeam->superstar03 != 101 && $rawTeam->superstar04 != 100 )
                                                        
                                                    @elseif($rawTeam->team_cash < $superstar->price)
                                                        
                                                    @elseif($status == 'Fechado')
                                                        
                                                    @else
                                                        
                                                        <a href="javascript:{}" onclick="document.getElementById('comprar{{$superstar->id}}').submit(); return false;" class="btn-buy">Buy</a>
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
                    
                    $("#ulItens li.pontosSelect").css("display", "inline");
                    $("#ulItens li.pontosSelect").each(function(){
                        if($(this).text().toUpperCase().indexOf(texto.toUpperCase()) < 0)
                            $(this).css("display", "none");
                    });
                });
            });

    </script>
@endsection