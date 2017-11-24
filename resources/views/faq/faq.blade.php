@extends('layouts/app')

@section('content')
<div class="wrapper faq">
    </br>
    <div class="page-header">
        <h1 class="title titleFaq">Frequently Asked Questions <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
    </div>

    <center>
        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta1" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    What is Wrestlemaniac ?
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta1" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                Wrestlemaniac is a wrestling fantasy game inspired on the WWE main shows: Monday Night Raw and Smackdown Live. 
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta2" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    What is a Fantasy Game ?
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta2" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                Fantasy Game is a system where you can bet on real people and real results but using virtual cash.
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta3" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    How do I buy superstas ?
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta3" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                Opening the Market tab on our menu, you can acess three diferent markets: Raw, Smackdown and PPV.
                There you can lookup superstars and your active game cash on that market, then you can buy up to four superstars to compete in your team.
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta10" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    What is WC ?	
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta10" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                    WC is our virtual coin, you can buy icons with it. 
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta11" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    How to get WC ?	
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta11" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                    You earn 2 WC's for each superstars on your team when the market closes.</br>
                    If you're in the TOP 10 you earn 5 WC's more than the usual.   
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta4" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    How the superstar score system works?
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta4" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                We have a whole PDF explaning every detailed rule that we can apply to a superstar, if you want to</br>
                checkout every single rule just check or download our Core Rulebook and enjoy our craziness.
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>
        
        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta5" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    When the Raw Market Opens / Closes?
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta5" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                Raw Market opens at: As Soon as the show ends<br>
                Raw Market closes at: Mondays 10:00 PM UTC
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta6" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    When the Smackdown Market Opens / Closes?
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta6" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                Smackdown Market opens at: As Soon as the show ends<br>
                Smackdown Market closes at: Tuesdays 10:00 PM UTC
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta7" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    When the PPV Market Opens / Closes?
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta7" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                Smackdown Market opens at: Wednesdays (On the PPV week)<br>
	            Smackdown Market closes at: Sundays 10:00 PM UTC
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta8" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    How PPV works ?
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta8" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                Pay-per-views are special events, as such we want to make it special for our system.<br>
                So PPVs that are one branded use you points and cash earned there to boost your Raw or Smackdown team.<br>
                Dual branded PPVs boost both of your brands with cash and points.
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pergunta">
            <button data-toggle="collapse" data-target="#pergunta9" class="btn btn-block perguntaTexto btn-lg">
                <i class="fa fa-question-circle fa-lg navbar-left icon-outside" aria-hidden="true"></i>
                    What is a League ?	
                <i class="fa fa-chevron-down fa-lg navbar-right seta" aria-hidden="true"></i>
            </button>
            <div id="pergunta9" class="collapse alert-info">
                <i class="fa fa-level-up fa-rotate-90 navbar-left icon-inside" aria-hidden="true"></i>
                Leagues are a group of people that play togheter focused in one thing, be the best stable on Wrestlemaniac, 
                <i class="fa fa-level-up invertido navbar-right icon-inside" aria-hidden="true"></i>
            </div>
        </div>
        </br>

    </center>
</div>
    
@endsection