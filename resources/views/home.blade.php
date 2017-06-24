@extends('layouts.app')

@section('content')
@if (Auth::guest())
<div id="banner" class="container"> <!-- BANNER -->
    <div class="container main">
        <div class="row">
            <div class="presentation">
                <h2>WRESTLEMANIAC is a WWE Fantasy Game!</h2>
                <h3>Made by fans to fans!<h3/>
            </div>
        </div>
    </div>
</div>
        
<div class="container weekly"> <!-- WEEKLY BEST -->
    <h2>WEEKLY BEST</h2>
    <div class="separador"></div>
    <img src="{{ url('img/weekly_best.jpg') }}"/>
</div>

<div id="play" class="container-fluid play"> <!-- HOW TO PLAY -->
    <h2>HOW TO PLAY</h2>
    <div class="separador"></div>
    <div class="row">
        <div class="col-md-3 account">
            <img src="{{ url('img/account_icon.png') }}"/>
            <h3>Create your account</h3>
            <p>Earn your initial amount of game cash</p>
        </div>
        <div class="col-md-3 team">
            <img src="{{ url('img/team_icon.png') }}"/>
            <h3>Build your team</h3>
            <p>Go through our market and buy Superstars</p>
        </div>
        <div class="col-md-3 wwe">
            <img src="{{ url('img/wwe_icon.png') }}"/>
            <h3>Enjoy WWE shows</h3>
            <p>Cheers for your Superstars to performe well and win matches!</p>
        </div>
        <div class="col-md-3 score">
            <img src="{{ url('img/score_icon.png') }}"/>
            <h3>Score<br/>points</h3>
            <p>Have fun climbing de the Rank right to the TOP!</p>
        </div>
    </div>
</div>
@endif

@if (!Auth::guest())
<div class="container login"> <!-- HTML DA PÁGINA INICIAL DO USUÁRIO LOGADO -->
    <div class="row">
        <h2>Página Inicial do Usuário Logado</h2>
    </div>
</div>
@endif

@endsection
