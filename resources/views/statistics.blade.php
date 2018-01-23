@extends('layouts/app')

@section('content')

<section class="rank-banner">
    <div class="container-fluid">
        <div class="row">
            <h2>RANK</h2>
        </div>
    </div>
</section>

<section class="container-fluid rank-tabs">

    <div class="container-fluid">
        <nav>
            <ul data-toggle="tab">
                <li class="active"><a data-toggle="tab" class="active" href="#raw">RAW</a></li>
                <li><a data-toggle="tab" href="#smd">SMACKDOWN</a></li>
                <li><a data-toggle="tab" href="#leagues">LEAGUES</a></li>
            </ul>
        </nav>
    </div>

    <div class="tab-content">

        <div id="raw" class="rank-player tab-pane fade in active">
            <div class="top3">
                <div class="row">
                    <ul>
                        <li>
                            <img src="{{ url('img/roman_reigns3.png') }}" alt="User Icon">
                            <p>2º</p>
                            <p>Melquesedeque Gomes</p>
                            <p>999.99</p>
                        </li>
                        <li>
                            <img src="{{ url('img/roman_reigns3.png') }}" alt="User Icon">
                            <p>1º</p>
                            <img src="/storage/belts/raw.png" class="belt-icon">
                            <p>Melquesedeque Gomes</p>
                            <p>999.99</p>
                        </li>
                        <li>
                            <img src="{{ url('img/roman_reigns3.png') }}" alt="User Icon">
                            <p>3º</p>
                            <p>Melquesedeque Gomes</p>
                            <p>999.99</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="rank-info">
                <ul>
                    <li>Position</li>
                    <li>Player</li>
                    <li>Score</li>
                </ul>
            </div>

            <div class="top10">

                <ul>
                    <li>4º</li>
                    <li><img src="{{ url('img/roman_reigns3.png') }}" alt=""></li>
                    <li>Melquesedeque Gomes</li>
                    <li>999.99</li>
                </ul>

                <ul>
                    <li>5º</li>
                    <li><img src="{{ url('img/roman_reigns3.png') }}" alt=""></li>
                    <li>Melquesedeque Gomes</li>
                    <li>999.99</li>
                </ul>
            </div>            
        </div>

        <div id="smd" class="tab-pane fade">

            <div class="top3">
                <div class="row smd">
                    <ul>
                        <li>
                            <img src="{{ url('img/roman_reigns3.png') }}" alt="User Icon">
                            <p>2º</p>
                            <p>Luan Luz</p>
                            <p>999.99</p>
                        </li>
                        <li>
                            <img src="{{ url('img/roman_reigns3.png') }}" alt="User Icon">
                            <p>1º</p>
                            <img src="/storage/belts/smackdown.png" class="belt-icon">
                            <p>Luan Luz</p>
                            <p>999.99</p>
                        </li>
                        <li>
                            <img src="{{ url('img/roman_reigns3.png') }}" alt="User Icon">
                            <p>3º</p>
                            <p>Luan Luz</p>
                            <p>999.99</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="rank-info">
                <ul>
                    <li>Position</li>
                    <li>Player</li>
                    <li>Score</li>
                </ul>
            </div>

            <div class="top10">

                <ul class="smd">
                    <li>4º</li>
                    <li><img src="{{ url('img/roman_reigns3.png') }}" alt=""></li>
                    <li>Melquesedeque Gomes</li>
                    <li>999.99</li>
                </ul>

                <ul class="smd">
                    <li>5º</li>
                    <li><img src="{{ url('img/roman_reigns3.png') }}" alt=""></li>
                    <li>Melquesedeque Gomes</li>
                    <li>999.99</li>
                </ul>
            </div>
        </div>

        <div id="leagues" class="tab-pane fade">

            <div class="rank-info">
                <ul>
                    <li>Position</li>
                    <li>League</li>
                    <li>Score</li>
                </ul>
            </div>

            <div class="top10-league">

                <ul class="league-champ">
                    <li>1º</li>
                    <li>Melquesedeque Gomes</li>
                    <li><img src="/storage/belts/league.png" alt=""></li>
                    <li>999.99</li>
                </ul>

                <ul>
                    <li>2º</li>
                    <li>Melquesedeque Gomes</li>
                    <li>999.99</li>
                </ul>
            </div>
        </div>
    </div>

</section>




<!-- PÁGINA RANK ANTIGA -->

<div class="container-fluid rank">
    <div class="row league-rank">
            <ul>
                <li>LEAGUE RANK</li>
                <?php
                $posL = 1; 
                ?>
                @foreach($topLeagues as $topLeague)

                <li>
                    <p>{{$posL}}º</p>
                    @if($posL == 1)
                        <img class="imgRankBeltLeague" src="/storage/belts/league.png"/>
                    @endif
                    <p>{{$topLeague->league_name}}</p>
                    <p>{{number_format($topLeague->league_points, 2, ',', ' ')}}</p>
                </li>

                <?php $posL = $posL+1; ?>
                @endforeach
            </ul>
    </div>

    <div class="row league-brands">
        <div class="league-raw col-md-6">
                <ul>
                    <li>RAW</li>
                    <?php
                    $pos = 1; 
                    ?>
                    @foreach($topRawTotalPoints as $topRawTotalPoint) 
                    <li>
                        <p>{{$pos}}º</p>
                        @if($pos == 1)
                        <img class="imgRankBelt" src="/storage/belts/raw.png"/>
                        @endif
                        <div class="avatar" style="background: url({{$topRawTotalPoint->photo}}) center center no-repeat; background-size: cover;"></div>
                        <p>{{$topRawTotalPoint->name}}</p>
                        <p>{{$topRawTotalPoint->team_total_points}}</p>
                    </li>

                    <?php $pos++; ?>
                    @endforeach
                </ul>
        </div>

        <div class="league-smd col-md-6">
                <ul>
                    <li>SMACKDOWN</li>
                    <?php
                    $pos = 1; 
                    ?>
                    @foreach($topSmackdownTotalPoints as $topSmackdownTotalPoint)
                    
                    <li>
                        <p>{{$pos}}º</p>
                        @if($pos == 1)
                        <img class="imgRankBelt" src="/storage/belts/smackdown.png"/>
                        @endif
                        <div class="avatar" style="background: url({{$topSmackdownTotalPoint->photo}}) center center no-repeat; background-size: cover;"></div>
                        <p>{{$topSmackdownTotalPoint->name}}</p>
                        <p>{{$topSmackdownTotalPoint->team_total_points}}</p>
                    </li>

                    <?php $pos++; ?>
                    @endforeach
                </ul>
        </div>
    </div>







        <!-- <div class="row league-scores raw">

        <div class="col-md-9">
            <ul>
                <li>RAW</li>
                <li>
                    <p>99º</p>
                    <div class="avatar" style="background: url() center center no-repeat; background-size: cover; background-color: #000"></div>
                    <p>Rodolfo Alves</p>
                    <p>9999.99</p>
                </li>

                <li>
                    <p>99º</p>
                    <div class="avatar" style="background: url() center center no-repeat; background-size: cover; background-color: #000"></div>
                    <p>Rodolfo Alves</p>
                    <p>9999.99</p>
                </li>
            </ul>
        </div> -->
    </div>







</div>

@endsection