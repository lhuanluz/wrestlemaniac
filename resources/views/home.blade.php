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
                <div class="play-free-btn"><a href="#">Play Free</a></div>
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
<div class="container-fluid profile-container">
    <div class="row user-info1">
        <div class="col-sm-5 col-md-5">
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

        <div class="col-sm-7 col-md-7">
            <div class="row">            
                <div class="col-sm-6 col-md-6 raw">
                    <h2>RAW</h2>
                    <h3>{{$rawTeam->team_total_points}}</h3>
                    <p>{{ array_search(Auth::user()->id, $positionRaw) + 1 }}º</p>
                </div>

                <div class="divisor"></div>

                <div class="col-sm-6 col-md-6 smd">
                    
                    <h2>SMACKDOWN</h2>
                    <h3>{{$smackdownTeam->team_total_points}}</h3>
                    <p>{{ array_search(Auth::user()->id, $positionSmackdown) + 1 }}º</p>
                </div>
            </div>            
        </div>

    </div> <!-- USER-INFO -->


</div> <!-- PROFILE-CONTAINER -->


<div class="container-fluid user-panel"> <!-- HTML DA PÁGINA INICIAL DO USUÁRIO LOGADO -->


    <!-- <div class="row profile">
        <div class="col-md-6">
            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000">
            </div> AVATAR 

            <div class="user-info">
                <h2>{{ Auth::user()->name }}</h2>
                @if($liga->id != 1)
                <h3>{{$liga->league_name}}</h3>
                @else
                @endif                
                <p><a href="{{route('selectPhotoRedirect')}}"><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp</i>Edit Photo</a></p> 
            </div>
        </div>

        <div class="profile-smd">
            <h2>SMACKDOWN</h2>
            <h3>{{$smackdownTeam->team_total_points}}</h3>
            <p>#{{ array_search(Auth::user()->id, $positionSmackdown) + 1 }}</p>
        </div>

        <div class="divisor"></div>

        <div class="profile-raw">
            <h2>RAW</h2>
            <h3>{{$rawTeam->team_total_points}}</h3>
            <p>#{{ array_search(Auth::user()->id, $positionRaw) + 1 }}</p>
        </div> -->

        <!-- 
        <div class="divisor"></div>
         
        <div class="profile-srank">
            <h2>SUPER RANK</h2>
            <h3>{{$totalTeam}}</h3>
            <p>#7</p>
        </div> 
        -->
    <!--</div>-->

    <div class="row brand-section"> <!-- RAW .BRAND-SECTION -->
        
        <div class="head"> <!-- .HEAD -->
            <h2>RAW</h2>
            @if($status->statusMercadoRaw == 'Aberto')
                <p class="market-open">OPEN</p>
            @else
                <p class="market-closed">CLOSED</p>
            @endif
        </div>

        <div class="brand-team"> <!-- .BRAND-TEAM -->
            <div class="team-info"> <!-- .TEAM-INFO -->
                <ul>
                    <li>Total Score: <p> {{$rawTeam->team_total_points}}</p></li>
                    <li>Last Show Score: <p>{{$rawTeam->team_points}}</p></li>
                    <li>Rank: <p>{{ array_search(Auth::user()->id, $positionRaw) + 1 }}</p></li>
                    <li class="raw-cash">$ {{number_format($rawTeam->team_cash)}}</li>
                    <a href="{{route('mercadoRawHome')}}"><li>GO TO MARKET</li></a>
                </ul>
            </div> <!-- .TEAM-INFO -->
            @foreach($superstars as $superstar)
            @if($rawTeam->superstar01 != $superstar->id  && $rawTeam->superstar02 != $superstar->id && $rawTeam->superstar03 != $superstar->id && $rawTeam->superstar04 != $superstar->id)
            @else
            <div>
                <img src="{{url($superstar->image)}}"/>
                <div class="star-name raw-bg">
                    <p>{{$superstar->name}}</p>
                </div>
                <!--<img src="{{url($superstar->image)}}"/>-->
            </div>
            @endif
            @endforeach
            <div class="mobile-market-btn raw-btn"><a href="{{route('mercadoRawHome')}}">GO TO MARKET</a></div>
        </div> <!-- .BRAND-TEAM -->

    </div> <!-- RAW .BRAND-SECTION -->


    <div class="row brand-section"> <!-- SMACKDOWN .BRAND-SECTION -->
        
        <div class="head"> <!-- .HEAD -->
            <h2>SMACKDOWN</h2>
            @if($status->statusMercadoSmackdown == 'Aberto')
                <p class="market-open">OPEN</p>
            @else
                <p class="market-closed">CLOSED</p>
            @endif
        </div>

        <div class="brand-team"> <!-- .BRAND-TEAM -->
            <div class="team-info"> <!-- .TEAM-INFO -->
                <ul>
                    <li>Total Score: <p>{{$smackdownTeam->team_total_points}}</p></li>
                    <li>Last Show Score: <p>{{$smackdownTeam->team_points}}</p></li>
                    <li>Rank: <p>{{ array_search(Auth::user()->id, $positionSmackdown) + 1 }}</p></li>
                    <li class="smd-cash">$ {{number_format($smackdownTeam->team_cash)}}</li>
                    <a href="{{route('mercadoSmackdownHome')}}"><li>GO TO MARKET</li></a>
                </ul>
            </div> <!-- .TEAM-INFO -->
            @foreach($superstars as $superstar)
            @if($smackdownTeam->superstar01 != $superstar->id  && $smackdownTeam->superstar02 != $superstar->id && $smackdownTeam->superstar03 != $superstar->id && $smackdownTeam->superstar04 != $superstar->id)
            @else
            <div>
                <img src="{{url($superstar->image)}}"/>
                <div class="star-name smd-bg">
                    <p>{{$superstar->name}}</p>
                </div>
            </div>
            @endif
            @endforeach
            <div class="mobile-market-btn smd-btn"><a href="{{route('mercadoSmackdownHome')}}">GO TO MARKET</a></div>
        </div> <!-- .BRAND-TEAM -->

    </div> <!-- SMACKDOWN .BRAND-SECTION -->

    <div class="row brand-section"> <!-- PPV .BRAND-SECTION -->
        
        <div class="head"> <!-- .HEAD -->
            <h2>PAY PER VIEW</h2>
            @if($status->statusMercadoPPV == 'Aberto')
                <p class="market-open">OPEN</p>
            @else
                <p class="market-closed">CLOSED</p>
            @endif
        </div>

        <div class="brand-team"> <!-- .BRAND-TEAM -->
            <div class="team-info info-ppv"> <!-- .TEAM-INFO -->
                <ul>
                    @if($status->ppvBrand == 'Smackdown')
                    <li>Brand: <p style="color:blue;">{{$status->ppvBrand}}</p></li>
                    @elseif($status->ppvBrand == 'Raw')
                    <li>Brand: <p style="color:red;">{{$status->ppvBrand}}</p></li>
                    @else
                    <li>Brand: <p style="color:black;">{{$status->ppvBrand}}</p></li>
                    @endif
                    <li><p></p></li>
                    <li><p></p></li>
                    <li class="ppv-cash">$ {{number_format($ppvTeam->team_cash)}}</li>
                    <a href="{{route('mercadoPpvHome')}}"><li>GO TO MARKET</li></a>
                </ul>
            </div> <!-- .TEAM-INFO -->
            @foreach($superstars as $superstar)
            @if($ppvTeam->superstar01 != $superstar->id  && $ppvTeam->superstar02 != $superstar->id && $ppvTeam->superstar03 != $superstar->id && $ppvTeam->superstar04 != $superstar->id)
            @else
            <div>
                <img src="{{url($superstar->image)}}"/>
                <div class="star-name ppv-bg">
                    <p>{{$superstar->name}}</p>
                </div>
            </div>
            @endif
            @endforeach

            <div class="mobile-market-btn ppv-btn"><a href="{{route('mercadoPpvHome')}}">GO TO MARKET</a></div>
        </div> <!-- .BRAND-TEAM -->

    </div> <!-- PPV .BRAND-SECTION -->    
</div>
@endif

@endsection
