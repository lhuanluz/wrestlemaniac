@extends('layouts/app')

@section('content')

    @if($userHasLeague == true)

    <div class="container league-page">
        <div class="row league-profile">

            <div class="col-md-6 league-name">
                <h2>{{$liga->league_name}}</h2>
                @if($liga->owner == Auth::user()->id)
                <a href="{{route('deletarLiga')}}"><p><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp</i>DELETE! League</p></a>
                @else
                <a href="{{route('leagueQuit')}}"><p>Leave League</p></a>
                @endif
            </div>
            
            <div class="col-md-3 league-info">
                <h2>LEAGUE SCORE</h2>
                <h3>{{number_format($liga->league_points, 2, ',', ' ')}}</h3>
            </div>

            <div class="col-md-3 league-info">
                <div class="divisor"></div>
                <h2>LEAGUE RANK</h2>
                <h3>{{ array_search($liga->id, $positionLeague) + 1}}º</h3>
            </div>
        </div> <!-- LEAGUE-PROFILE -->

        <div class="row league-scores raw">
            
            <div class="col-md-9">
                <ul>
                    <li>RAW</li>
                    <?php
                        $pos = 1;
                        $total_raw = 0.0;
                    ?>
                    @foreach($membrosRaw as $membroRaw)
                    <li>
                        <p>{{$pos}}º</p>
                        <div class="avatar" style="background: url({{$membroRaw->photo}}) center center no-repeat; background-size: cover;"></div>
                        <p>{{$membroRaw->name}}</p>
                        <p>{{$membroRaw->team_total_points}}</p>
                    </li>
                    <?php
                    $pos++;
                    $total_raw += $membroRaw->team_total_points;
                    ?>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-3 league-partial-scores">
                <ul>
                    <li>TOTAL SCORE</li>
                    <div class="divisor"></div>
                    <li>{{number_format($total_raw/$quantidade, 2, ',', ' ')}}</li>
                </ul>
            </div>

        </div> <!-- LEAGUE-SCORES RAW -->


        <div class="row league-scores smackdown">
            
            <div class="col-md-9">
                <ul>
                    <li>SMACKDOWN</li>
                    <?php
                        $pos = 1;
                        $total_smack = 0.0;
                    ?>
                    @foreach($membrosSmackdown as $membroSmackdown)
                    <li>
                        <p>{{$pos}}º</p>
                        <div class="avatar" style="background: url({{$membroSmackdown->photo}}) center center no-repeat; background-size: cover;"></div>
                        <p>{{$membroSmackdown->name}}</p>
                        <p>{{$membroSmackdown->team_total_points}}</p>
                    </li>
                    <?php
                    $pos++;
                    $total_smack += $membroSmackdown->team_total_points;
                    ?>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-3 league-partial-scores">
                <ul>
                    <li>TOTAL SCORE</li>
                    <div class="divisor"></div>
                    <li>{{number_format($total_smack/$quantidade, 2, ',', ' ')}}</li>
                </ul>
            </div>

        </div> <!-- LEAGUE-SCORES SMACKDOWN -->

    </div> <!-- LEAGUE-PAGE -->
    @else

    <section class="container league-form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-title">
                    <h2>Create League</h2>
                </div>
                <form method="post" action="{{route('criarLiga')}}">
                {{ csrf_field()  }}
                    <label for="league-name">League Name:</label><br>
                    <input class="input-field" name="name" type="text"><br>

                    <label for="league-pss">League Password:</label><br>
                    <input class="input-field" type="password" name="secret_password"><br>

                    <label for="league-pss">Confirm Password:</label><br>
                    <input class="input-field" type="password" name="secret_password_confirmation"><br>

                    <input class="btn-league-form" type="submit" value="CREATE">
                </form>
            </div>

            <div class="col-md-6">
                <h2>Join a League</h2>
                <form method="post" action="{{route('entrarLiga')}}">
                {{ csrf_field()  }}
                    <label for="league-name">League Name:</label><br>
                    <input class="input-field" name="name" type="text"><br>

                    <label for="league-pss">League Password:</label><br>
                    <input class="input-field" name="secret_password" type="password"><br>

                    <input class="btn-league-form" type="submit" value="JOIN">
                </form>
            </div>
        </div>
    </section>

    @endif
@endsection