@extends('layouts.app')

@section('content')
@if (Auth::guest())
<div id="banner" class="container">
    <div class="container main">
        <div class="row">
        <!--<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in CHEGUEI BIRL!!
                </div>
            </div>
        </div>-->

            <div class="presentation">
                <h2>WRESTLEMANIAC is a WWE Fantasy Game!</h2>
                <h3>Made by fans to fans!<h3/>
            </div>
        </div>

    </div>
</div>
        <!--<div class="container play">
            <h2>How to play</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="num odd">1</div>
                    <div class="step">Create your account and receive a inicial amout of game cash</div>                    
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="num">2</div>
                    <div class="step">Go through our Superstar Market and buy 4 Superstars. Challenge your friends to do the same. Let's see who makes the best choices!</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="num odd">3</div>
                    <div class="step">Enjoy WWE shows and cheers for your selected Superstars to performe well and win matches!</div>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="num">4</div>
                    <div class="step">Score points and have fun climbing the Super Rank ladder right to the TOP!</div>
                </div>
            </div>
        
        </div>-->
<div class="container weekly">
    <h2>WEEKLY BEST</h2>
    <div class="separador"></div>
    <div class="best"></div>
</div>

<div class="container news">
    <h2>NEWS</h2>
    <div class="separador"></div>
    <div class="row">
        <div class="col-md-6">
            <h3>WWE PREDICTIONS: Who is going to win Money in the Bank Contracts?</h3>
            <p>After Shane McMahon makes the match official, tensions rise between the participants in the Money in the Bank Ladder Match.</p>
            <p>by Rodolfo Alves <span>June 16, 2017</span></p>
        </div>
        <div class="col-md-6">
            <img src="{{ url('img/news_thumb.jpg') }}"/>
        </div>

    </div>
    <div class="divisor"></div>

    <div class="row">
        <div class="col-md-6">
            <h3>WWE PREDICTIONS: Who is going to win Money in the Bank Contracts?</h3>
            <p>After Shane McMahon makes the match official, tensions rise between the participants in the Money in the Bank Ladder Match.</p>
            <p>by Rodolfo Alves <span>June 16, 2017</span></p>
        </div>
        <div class="col-md-6">
            <img src="{{ url('img/news_thumb.jpg') }}"/>
        </div>
    </div>
    <div class="divisor"></div>
</div>
@endif

@if (!Auth::guest())
<!-- HTML DA PÁGINA INICIAL DO USUÁRIO LOGADO -->
<div class="container login">
    <div class="row">
        <h2>Página Inicial do Usuário Logado</h2>
    </div>
</div>
@endif

@endsection
