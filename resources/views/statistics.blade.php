@extends('layouts/app')

@section('content')

<div class="container-fluid rank">
    <div class="row league-rank">
            <ul>
                <li>LEAGUE RANK</li>
                @foreach($topLeagues as $topLeague)
                <?php
                $posL = 1; 
                ?>
                
                <li>
                    <p>{{ array_search($topLeague->id, $positionLeague) + 1}}º</p>
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
                    @foreach($topRawTotalPoints as $topRawTotalPoint)
                    <?php
                    $pos = 1; 
                    ?>
                    <li>
                        <p>{{ array_search($topRawTotalPoint->id, $positionRaw) + 1}}º</p>
                        <div class="avatar" style="background: url({{$topRawTotalPoint->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
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
                    @foreach($topSmackdownTotalPoints as $topSmackdownTotalPoint)
                    <?php
                    $pos = 1; 
                    ?>
                    <li>
                        <p>{{ array_search($topSmackdownTotalPoint->id, $positionSmack) + 1}}º</p>
                        <div class="avatar" style="background: url({{$topSmackdownTotalPoint->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
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