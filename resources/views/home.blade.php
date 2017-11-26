@extends('layouts/app')

@section('content')
@if (Auth::guest())
<section class="play-free">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <h2>The WWE Wrestling Fantansy Game</h2>
                <p>Made by fans to fans</p>
                <p>Join Us!</p>
                <div class="play-free-btn"><a href="{{url('register')}}">Play Free</a></div>
            </div>
            <div class="col-sm-6 col-md-6 superstars-banner">
                <img src="{{ url($bannerR)}}" alt="John Cena, Roman Reigns and AJ Styles on the main banner">
            </div>
        </div>
    </div>
</section>

<section class="section-2">
    <div class="shadow"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <img src="{{ url('img/devices.png') }}" alt="Devices">
            </div>
            <div class="col-sm-6 col-md-6">
                <h3>Become the advocate of your favorite WWE Superstars</h3>
                <p>In Wrestlemaniac you become the manager and advocate of a team of superstars.</p>
                <p>Your mission is to hire the Superstars you believe in to be part of your selected team.</p>
            </div>
        </div>
    </div>
</section>

<section class="section-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <h3>Watch, Cheers &amp Score</h3>
                <p>There is no roast or event simulation. Wrestlemaniac works with the live WWE events</p>
                <p>Enjoy the shows and cheers for your superstars! The better the performance, the higher you will score!</p>
            </div>
            <div class="col-sm-6 col-md-6">
                <img src="{{ url('img/friends.png') }}" alt="Friends cheering">
            </div>
        </div>
    </div>
</section>

<section class="section-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <img src="{{ url('img/the-bar.png') }}" alt="Cesaro and Sheamus">
            </div>
            <div class="col-sm-6 col-md-6">
                <h3>Challenge your friends!</h3>
                <p>Create your own private league to dispute with your friends and against orther leagues!</p>
            </div>
        </div>
    </div>
</section>

@endif

@if (!Auth::guest())

<section class="profile">

    <div class="container-fluid profile-container">
        <div class="row user-info1">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000">
                </div> <!-- .AVATAR -->
                <div class="name">
                    <h2>{{ Auth::user()->name }}</h2>
                    @if($liga->id != 1)
                    <h3><a href="{{route('leagueHome')}}">{{$liga->league_name}}</a></h3>
                    @else
                    @endif                
                    <p><a href="{{route('selectPhotoRedirect')}}"><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp</i>Edit Photo</a></p> 
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="row">            
                    <div class="col-xs-6 col-sm-6 col-md-6 raw">
                        <h2>RAW</h2>
                        <h3>{{$rawTeam->team_total_points}}</h3>
                        <p>{{ array_search(Auth::user()->id, $positionRaw) + 1 }}º</p>
                    </div>

                    <div class="divisor"></div>

                    <div class="col-xs-6 col-sm-6 col-md-6 smd">
                        
                        <h2>SMACKDOWN</h2>
                        <h3>{{$smackdownTeam->team_total_points}}</h3>
                        <p>{{ array_search(Auth::user()->id, $positionSmackdown) + 1 }}º</p>
                    </div>
                </div>            
            </div>

        </div> <!-- USER-INFO -->


    </div> <!-- PROFILE-CONTAINER -->

    <div class="container-fluid">
        <nav class="profile-brand-nav">
            <ul data-toggle="tab">
                <li class="active"><a data-toggle="tab" class="active" href="#raw-profile">RAW</a></li>
                <li><a data-toggle="tab" href="#smd-profile">SMACKDOWN</a></li>
                <li><a data-toggle="tab" href="#ppv-profile">PAY PER VIEW</a></li>
            </ul>
        </nav>
    </div>

    <div class="container-fluid tab-content">
        
        <div id="raw-profile" class="profile-brand-info raw-profile tab-pane fade in active">
            
            <div>
                <ul>
                    <li>
                        <h3>Total Score</h3>
                        <p>{{$rawTeam->team_total_points}}</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Last Show Score</h3>
                        <p>{{$rawTeam->team_points}}</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Ranking</h3>
                        <p>{{ array_search(Auth::user()->id, $positionRaw) + 1 }}</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Total Cash</h3>
                        <p>$ 8012</p>
                    </li>
                </ul>

                <div class="profile-market-status">
                    <h3>Market Status</h3>
                    @if($status->statusMercadoRaw == 'Aberto')
                        <p class="market-open">OPEN</p>
                    @else
                        <p class="market-closed">CLOSED</p>
                    @endif
                </div>
            </div>            

            <div class="profile-team">
                @foreach($superstars as $superstar)
                @if($rawTeam->superstar01 != $superstar->id  && $rawTeam->superstar02 != $superstar->id && $rawTeam->superstar03 != $superstar->id && $rawTeam->superstar04 != $superstar->id)
                @else
                <div>
                    <img src="{{url($superstar->image)}}" alt="">
                    <p>{{$superstar->name}}</p>                    
                </div>
                @endif
                @endforeach
            </div>           

            <a href="{{route('mercadoRawHome')}}">MARKET</a>           

        </div>

        <div id="smd-profile" class="profile-brand-info smd-profile tab-pane fade">
            
            <div>
                <ul>
                    <li>
                        <h3>Total Score</h3>
                        <p>{{$smackdownTeam->team_total_points}}</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Last Show Score</h3>
                        <p>{{$smackdownTeam->team_points}}</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Ranking</h3>
                        <p>{{ array_search(Auth::user()->id, $positionSmackdown) + 1 }}</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Total Cash</h3>
                        <p>$ 8012</p>
                    </li>
                </ul>

                <div class="profile-market-status">
                    <h3>Market Status</h3>
                    @if($status->statusMercadoSmackdown == 'Aberto')
                        <p class="market-open">OPEN</p>
                    @else
                        <p class="market-closed">CLOSED</p>
                    @endif
                </div>
            </div>            

            <div class="profile-team">
                @foreach($superstars as $superstar)
                @if($smackdownTeam->superstar01 != $superstar->id  && $smackdownTeam->superstar02 != $superstar->id && $smackdownTeam->superstar03 != $superstar->id && $smackdownTeam->superstar04 != $superstar->id)
                @else
                <div>
                    <img src="{{url($superstar->image)}}" alt="">
                    <p>{{$superstar->name}}</p>                    
                </div>
                @endif
                @endforeach
            </div>

            <a href="{{route('mercadoSmackdownHome')}}">MARKET</a>

        </div>

        <div id="ppv-profile" class="profile-brand-info ppv-profile tab-pane fade">
            
            <div>
                <ul>
                    <li>
                        <h3>Total Score</h3>
                        <p>278.50</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Last Show Score</h3>
                        <p>21.40</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Total Cash</h3>
                        <p>$ {{$ppvTeam->team_cash}}</p>
                    </li>
                    <li><div class="divisor"></div></li>
                    <li>
                        <h3>Brand</h3>
                        @if($status->ppvBrand == 'Smackdown')
                            <p>{{$status->ppvBrand}}</p>
                        @elseif($status->ppvBrand == 'Raw')
                            <p>{{$status->ppvBrand}}</p>
                        @else
                            <p>{{$status->ppvBrand}}</p>
                        @endif
                    </li>
                </ul>

                <div class="profile-market-status">
                    <h3>Market Status</h3>
                    @if($status->statusMercadoPPV == 'Aberto')
                        <p class="market-open">OPEN</p>
                    @else
                        <p class="market-closed">CLOSED</p>
                    @endif
                </div>
            </div>            

            <div class="profile-team">
                 @foreach($superstars as $superstar)
                @if($ppvTeam->superstar01 != $superstar->id  && $ppvTeam->superstar02 != $superstar->id && $ppvTeam->superstar03 != $superstar->id && $ppvTeam->superstar04 != $superstar->id)
                @else
                <div>
                    <img src="{{url($superstar->image)}}" alt="">
                    <p>{{$superstar->name}}</p>                    
                </div>
                @endif
                @endforeach
            </div>

            <a href="{{route('mercadoPpvHome')}}">MARKET</a>

        </div> <!-- PPV-PROFILE -->

    </div> <!-- TAB-CONTENT -->
    

</section> <!-- PROFILE -->

@endif

@endsection
