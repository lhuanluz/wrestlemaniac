@extends('layouts/app')

@section('content')

    <section class="raw-banner"></section>
    <section class="market">
        @if($status == 'Fechado')
        <div class="alert alert-danger" role="alert">RAW Market is Closed!</div>
        @endif
        <div class="container-fluid market-team">
            <h2>Your Team</h2> 
            <div class="row">
                <div class="col-md-3 your-team">
                    <div class="d1">
                        <img src="http://localhost:8000/img/roman_reigns.png" alt="Roman Reigns">
                        <p>Roman Reigns</p>
                    </div> 

                    <ul class="d2">
                        <li>
                            <p>Score</p>
                            <p>8.5</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Price</p> 
                            <p>$ 1275</p>
                        </li>
                    </ul> 
                    <a href="#">Sell</a>
                </div> 
                
                <div class="col-md-3 your-team">
                    <div class="d1">
                        <img src="http://localhost:8000/img/roman_reigns.png" alt="Roman Reigns"> 
                        <p>Roman Reigns</p>
                    </div> 
                    <ul class="d2">
                        <li>
                            <p>Score</p> 
                            <p>8.5</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Price</p> 
                            <p>$ 1275</p>
                        </li>
                    </ul> 
                    <a href="#">Sell</a>
                </div> 
                
                <div class="col-md-3 your-team">
                    <div class="d1">
                        <img src="http://localhost:8000/img/roman_reigns.png" alt="Roman Reigns"> 
                        <p>Roman Reigns</p>
                    </div> 
                    <ul class="d2">
                        <li>
                            <p>Score</p> 
                            <p>8.5</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Price</p> 
                            <p>$ 1275</p>
                        </li>
                    </ul> 
                    <a href="#">Sell</a>
                </div> 
                
                <div class="col-md-3 your-team">
                    <div class="d1">
                        <img src="http://localhost:8000/img/roman_reigns.png" alt="Roman Reigns"> 
                        <p>Roman Reigns</p>
                    </div> 
                    <ul class="d2">
                        <li>
                            <p>Score</p> 
                            <p>8.5</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Price</p> 
                            <p>$ 1275</p>
                        </li>
                    </ul> 
                    <a href="#">Sell</a>
                </div>
            </div> 
            
            <div class="row">
                <div class="market-info col-md-9">
                    <ul>
                        <li>
                            <p>Total Cash</p> 
                            <p>$ 7112</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Cash Available</p> 
                            <p>$ 68</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Last Show Balance</p> 
                            <p>$ 405</p>
                        </li> 
                        <li class="divisor"></li> 
                        <li>
                            <p>Market Status</p>
                            <p class="market-open">OPEN</p>
                        </li>                    
                    </ul>                
                </div> 
                
                <div class="col-md-3">
                    <a href="#" class="sell-all">Sell all</a> 
                    <a href="#" class="confirm-team">Confirm team</a>
                </div>
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
                <!-- Sempre veremos o botÃ£o Nameâ–² -->
                <a href="{{route('mercadoRawHome')}}">Nameâ–²</a>
                <!-- Condiciona que os botÃµes Priceâ–² e Pointsâ–²  sÃ³ irÃ£o aparecer quando:
                -> Estivermos vendo a Home do Mercado
                ->Estivermos Vendo o Priceâ–¼ ou Pointsâ–¼
                -->
                @if(Route::is('mercadoRawHome')|| Route::is('mercadoRawPriceDesc') ||Route::is('mercadoRawPointsDesc'))
                    <a href="{{route('mercadoRawPriceAsc')}}">Priceâ–²</a>
                    <a href="{{route('mercadoRawPointsAsc')}}">Pointsâ–²</a>
                @endif
                <!-- Condiciona que os botÃµes Priceâ–¼ e Pointsâ–²  sÃ³ irÃ£o aparecer quando:
                -> Estivermos vendo o Priceâ–²
                -->
                @if(Route::is('mercadoRawPriceAsc'))
                    <a href="{{route('mercadoRawPriceDesc')}}">Priceâ–¼</a>
                    <a href="{{route('mercadoRawPointsAsc')}}">Pointsâ–²</a>
                @endif  
                <!-- Condiciona que os botÃµes Priceâ–¼ e Pointsâ–²  sÃ³ irÃ£o aparecer quando:
                -> Estivermos vendo o Pointsâ–²
                -->
                @if(Route::is('mercadoRawPointsAsc'))
                    <a href="{{route('mercadoRawPriceAsc')}}">Priceâ–²</a>
                    <a href="{{route('mercadoRawPointsDesc')}}">Pointsâ–¼</a>
                @endif
            </div>     


            

            <div class="separador"></div>
            <div class="container-fluid market-superstar">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ url('img/roman_reigns2.png') }}" alt="Superstar image">
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Roman Reigns</h3>
                            </div>
                            <div class="col-md-12">
                                <ul>
                                    <li>
                                        <p>Last Show Score</p> 
                                        <p>8.5</p>
                                    </li> 
                                    <li class="divisor"></li> 
                                    <li>
                                        <p>Appreciation</p> 
                                        <p><span>+</span>$ 85</p>
                                    </li> 
                                    <li class="divisor"></li> 
                                    <li>
                                        <p>Price</p> 
                                        <p>$ 1275</p>
                                    </li>   
                                    <li>
                                        <a href="#" class="btn-buy">Buy</a>
                                    </li>               
                                </ul>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <!-- Verifica se o Superstar apareceu no Ãºltimo show -->
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
                    <!-- Mostra os Pontos Atuais / Ãšltimos -->
                    <h2 class="pontos">{{$superstar->points . ' / ' . $superstar->last_points}}</h2>
                    <!-- Mostra o PreÃ§o -->
                    <h2 class="preÃ§o" name="price"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
                    <!-- Verifica se o UsuÃ¡rio estÃ¡ cadastrado, caso contrÃ¡rio nÃ£o mostra os botÃµes para comprar -->
                    @if($superstar->name == 'None')
                    <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                    <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Can't Sell
                    </button>
                    @elseif($status == 'Fechado')
                        <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                            <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Market is Closed!
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

    <div class="controladores btn-group-justified">
        <div class="page-header">
            <h1 class="title">Market<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
        </div>
        <!-- Sempre veremos o botÃ£o Nameâ–² -->
        <a href="{{route('mercadoRawHome')}}">Nameâ–²</a>
        <!-- Condiciona que os botÃµes Priceâ–² e Pointsâ–²  sÃ³ irÃ£o aparecer quando:
        -> Estivermos vendo a Home do Mercado
        ->Estivermos Vendo o Priceâ–¼ ou Pointsâ–¼
        -->
        @if(Route::is('mercadoRawHome')|| Route::is('mercadoRawPriceDesc') ||Route::is('mercadoRawPointsDesc'))
            <a href="{{route('mercadoRawPriceAsc')}}">Priceâ–²</a>
            <a href="{{route('mercadoRawPointsAsc')}}">Pointsâ–²</a>
        @endif
        <!-- Condiciona que os botÃµes Priceâ–¼ e Pointsâ–²  sÃ³ irÃ£o aparecer quando:
        -> Estivermos vendo o Priceâ–²
        -->
        @if(Route::is('mercadoRawPriceAsc'))
            <a href="{{route('mercadoRawPriceDesc')}}">Priceâ–¼</a>
            <a href="{{route('mercadoRawPointsAsc')}}">Pointsâ–²</a>
        @endif  
        <!-- Condiciona que os botÃµes Priceâ–¼ e Pointsâ–²  sÃ³ irÃ£o aparecer quando:
        -> Estivermos vendo o Pointsâ–²
        -->
        @if(Route::is('mercadoRawPointsAsc'))
            <a href="{{route('mercadoRawPriceAsc')}}">Priceâ–²</a>
            <a href="{{route('mercadoRawPointsDesc')}}">Pointsâ–¼</a>
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
                @if($superstar->id == 103 || $superstar->id == 102 || $superstar->id == 101 || $superstar->id == 100 || $rawTeam->superstar01 == $superstar->id  || $rawTeam->superstar02 == $superstar->id || $rawTeam->superstar03 == $superstar->id || $rawTeam->superstar04 == $superstar->id)
                @else
                <div class="lutador">
                    <img src="{{url($superstar->image)}}" alt="Card image cap">
                    <form class="lutador-info" action="{{route('comprarSuperstarRaw')}}" method="post">
                    {{ csrf_field()  }}
                        <center>
                        <!-- Mostra o nome do Superstar -->
                        <u><h4>{{$superstar->name}}</h4></u>
                        <input type="hidden" name="name" value="{{$superstar->name}}"/>
                        <!-- Verifica se o Superstar apareceu no Ãºltimo show -->
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
                        <!-- Mostra os Pontos Atuais / Ãšltimos -->
                        <h2 class="pontos">{{$superstar->points . ' / ' . $superstar->last_points}}</h2>
                        <!-- Mostra o PreÃ§o -->
                        <h2 class="preÃ§o" name="price"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
                        <!-- Verifica se o UsuÃ¡rio estÃ¡ cadastrado, caso contrÃ¡rio nÃ£o mostra os botÃµes para comprar -->
                        @if(Auth::user())
                            <!-- Caso seja um Superstar do RAW mostra botÃ£o vermelho -->
                                @if($rawTeam->superstar01 != 103 && $rawTeam->superstar02 != 102 && $rawTeam->superstar03 != 101 && $rawTeam->superstar04 != 100 )
                                    <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                                    <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Not enough space
                                    </button>
                                @elseif($rawTeam->team_cash < $superstar->price)
                                    <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                                    <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Not enough cash
                                    </button>
                                @elseif($status == 'Fechado')
                                    <button type="Submit" class="btn btn-danger btn-group-justified" disabled>
                                        <i class="fa fa-exclamation-circle fa-lg icon" aria-hidden="true"></i>Market is Closed!
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
                </li>
            @endforeach
        </ul>
    </div> <!-- DIV CONTAINER > LUTADOR -->
@endsection