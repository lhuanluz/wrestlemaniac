@extends('layouts/app')

@section('content')
@if (Auth::guest())
<div id="" class="banner"> <!-- BANNER -->
    <div class="container-fluid main">
        <div class="row">
            <div class="presentation">
                <h2>WRESTLEMANIAC is a WWE Fantasy Game!</h2>
                <h3>Made by fans to fans!<h3/>
            </div>
        </div>
    </div>
</div>
        
<!-- <div class="container weekly">  WEEKLY BEST 
    <h2>WEEKLY BEST</h2>
    <div class="separador"></div>
    <img src="{{ url('img/weekly_best.jpg') }}"/>
</div> -->

<div id="play" class="container-fluid play"> <!-- HOW TO PLAY -->
    <h2>HOW TO PLAY</h2>
    <div class="separador"></div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 account">
            <img src="{{ url('img/account_icon.png') }}"/>
            <h3>Create your account</h3>
            <p>Earn your initial amount of game cash</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 team">
            <img src="{{ url('img/team_icon.png') }}"/>
            <h3>Build your team</h3>
            <p>Go through our market and buy Superstars</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wwe">
            <img src="{{ url('img/wwe_icon.png') }}"/>
            <h3>Enjoy WWE shows</h3>
            <p>Cheers for your Superstars to performe well and win matches!</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 score">
            <img src="{{ url('img/score_icon.png') }}"/>
            <h3>Score<br/>points</h3>
            <p>Have fun climbing de the Rank right to the TOP!</p>
        </div>
    </div>
</div>
@endif

@if (!Auth::guest())
<div class="container-fluid user-panel"> <!-- HTML DA PÁGINA INICIAL DO USUÁRIO LOGADO -->
    <div class="row profile">

        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000">
        </div> <!-- .AVATAR -->

        <div class="user-info">
            <h3>Welcome,</h3>
            <h2>{{ Auth::user()->name }}</h2>
            <p><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp</i>Edit profile</a></p>
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
        </div>

        <!-- 
        <div class="divisor"></div>
         
        <div class="profile-srank">
            <h2>SUPER RANK</h2>
            <h3>{{$totalTeam}}</h3>
            <p>#7</p>
        </div> 
        -->
    </div>

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
                    <li>Last Show Score: <p>{{$smackdownTeam->team_total_points}}</p></li>
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
            <div class="team-info"> <!-- .TEAM-INFO -->
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
        </div> <!-- .BRAND-TEAM -->

    </div> <!-- PPV .BRAND-SECTION -->    
</div>
@endif

@endsection
