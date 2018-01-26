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
                        <?php
                        $posRaw = 1; 
                        ?>
                        @foreach($topRawTotalPoints as $topRawTotalPoint) 
                            @if($posRaw == 2)
                                <li>
                                    <img src="{{ url($topRawTotalPoint->photo) }}" alt="User Icon">
                                    <p>2º</p>
                                    <p>{{$topRawTotalPoint->name}}</p>
                                    <p>{{$topRawTotalPoint->team_total_points}}</p>
                                </li>
                            @endif
                            <?php $posRaw++; ?>
                        @endforeach

                        <?php
                        $posRaw = 1; 
                        ?>

                        @foreach($topRawTotalPoints as $topRawTotalPoint) 
                            @if($posRaw == 1)
                                <li>
                                    <img src="{{ url($topRawTotalPoint->photo) }}" alt="User Icon">
                                    <p>1º</p>
                                    <img src="/storage/belts/raw.png" class="belt-icon">
                                    <p>{{$topRawTotalPoint->name}}</p>
                                    <p>{{$topRawTotalPoint->team_total_points}}</p>
                                    <p>{{$RawChampionData->days}} day(s) as Champion</p>
                                </li>
                            @endif
                            <?php $posRaw++; ?>
                        @endforeach

                        <?php
                        $posRaw = 1; 
                        ?>

                        @foreach($topRawTotalPoints as $topRawTotalPoint) 
                            @if($posRaw == 3)
                                <li>
                                    <img src="{{ url($topRawTotalPoint->photo) }}" alt="User Icon">
                                    <p>3º</p>
                                    <p>{{$topRawTotalPoint->name}}</p>
                                    <p>{{$topRawTotalPoint->team_total_points}}</p>
                                </li>
                            @endif
                            <?php $posRaw++; ?>
                        @endforeach
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
                <?php
                $posRaw = 1; 
                ?>
                @foreach($topRawTotalPoints as $topRawTotalPoint) 
                    @if($posRaw < 4)
                    @else
                        <ul>
                            <li>{{$posRaw}}º</li>
                            <li><img src="{{ url($topRawTotalPoint->photo) }}" alt=""></li>
                            <li>{{$topRawTotalPoint->name}}</li>
                            <li>{{$topRawTotalPoint->team_total_points}}</li>
                        </ul>
                    @endif
                    <?php $posRaw++; ?>
                @endforeach
            </div>            
        </div>

        <div id="smd" class="tab-pane fade">

            <div class="top3">
                <div class="row smd">
                        <ul>
                                <?php
                                $posSmack = 1; 
                                ?>
                                @foreach($topSmackdownTotalPoints as $topSmackdownTotalPoint)
                                    @if($posSmack == 2)
                                        <li>
                                            <img src="{{ url($topSmackdownTotalPoint->photo) }}" alt="User Icon">
                                            <p>2º</p>
                                            <p>{{$topSmackdownTotalPoint->name}}</p>
                                            <p>{{$topSmackdownTotalPoint->team_total_points}}</p>
                                        </li>
                                    @endif
                                    <?php $posSmack++; ?>
                                @endforeach
        
                                <?php
                                $posSmack = 1; 
                                ?>
        
                                @foreach($topSmackdownTotalPoints as $topSmackdownTotalPoint)
                                    @if($posSmack == 1)
                                        <li>
                                            <img src="{{ url($topSmackdownTotalPoint->photo) }}" alt="User Icon">
                                            <p>1º</p>
                                            <img src="/storage/belts/smackdown.png" class="belt-icon">
                                            <p>{{$topSmackdownTotalPoint->name}}</p>
                                            <p>{{$topSmackdownTotalPoint->team_total_points}}</p>
                                            <p>{{$SmackdownChampionData->days}} day(s) as Champion</p>
                                        </li>
                                    @endif
                                    <?php $posSmack++; ?>
                                @endforeach
        
                                <?php
                                $posSmack = 1; 
                                ?>
        
                                @foreach($topSmackdownTotalPoints as $topSmackdownTotalPoint)
                                    @if($posSmack == 3)
                                        <li>
                                            <img src="{{ url($topSmackdownTotalPoint->photo) }}" alt="User Icon">
                                            <p>3º</p>
                                            <p>{{$topSmackdownTotalPoint->name}}</p>
                                            <p>{{$topSmackdownTotalPoint->team_total_points}}</p>
                                        </li>
                                    @endif
                                    <?php $posSmack++; ?>
                                @endforeach
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
                    <?php
                    $posSmack = 1; 
                    ?>
                    @foreach($topSmackdownTotalPoints as $topSmackdownTotalPoint)
                        @if($posSmack < 4)
                        @else
                        <ul class="smd">
                                <li>{{$posSmack}}º</li>
                                <li><img src="{{ url($topSmackdownTotalPoint->photo) }}" alt=""></li>
                                <li>{{$topSmackdownTotalPoint->name}}</li>
                                <li>{{$topSmackdownTotalPoint->team_total_points}}</li>
                        </ul>
                        @endif
                        <?php $posSmack++; ?>
                    @endforeach
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
                <?php
                $posL = 1; 
                ?>
                @foreach($topLeagues as $topLeague)
                    @if($posL == 1)
                        <ul class="league-champ">
                            <li>{{$posL}}º</li>
                            <li>{{$topLeague->league_name}}</li>
                            <li><img src="/storage/belts/league.png" alt=""></li>
                            <li>{{$LeagueChampionData->days}} day(s) as Champions</li>
                            <li>{{number_format($topLeague->league_points, 2, ',', ' ')}}</li>
                        </ul>
                    @else
                    <ul>
                        <li>{{$posL}}º</li>
                        <li>{{$topLeague->league_name}}</li>
                        <li>{{number_format($topLeague->league_points, 2, ',', ' ')}}</li>
                    </ul>
                    @endif
                <?php $posL = $posL+1; ?>
                @endforeach
            </div>
        </div>
    </div>

</section>

@endsection