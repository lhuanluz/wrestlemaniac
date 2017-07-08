@extends('layouts/app')

@section('content')

    @if($userHasLeague == true)
    
    <!--<div class="page-header">
            <h1 class="title">Your League<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
    </div>-->
    <div class="container league-page">
        <div class="row league-name">
            <h2>League Name</h2>
        </div>

        <div class="row league-avatar">
            <div class="col-md-6">
                <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000">
                </div> <!-- .AVATAR -->
                <h3>{{ Auth::user()->name }}</h3>
            </div>

            <div class="col-md-6">
                <ul>
                    <li><a class="league-btn" href="#">Edit League</a></li>            
                    <li><a class="league-btn" href="#">Leave League</a></li>                
                </ul>
            </div>
        </div>

        <div class="row league-members">
            <div class="col-md-6">
                <div>
                    <div class="league-member-avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                    <p>Luan Luz</p>
                </div>
                <div>
                    <div class="league-member-avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                    <p>Arthur Ariza</p>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <div class="league-member-avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                    <p>Melquesedeque Gomes</p>
                </div>
                <div>
                    <div class="league-member-avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                    <p>Silvânio Holanda</p>
                </div>
            </div>
        </div>

        <div class="divisoria"></div>

        <div class="row league-stats">
            <div class="col-md-4">
                <div class="league-brand-score">
                    <div class="score"><h2>50.0</h2></div>
                    <div class="league-rank"><p>#9</p></div>
                </div>
                <div class="league-members-score">
                    <h3>RAW</h3>
                    <ul>
                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">1º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">2º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">3º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">4º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">5º</p>
                            <p class="member-score">14.5</p>                            
                        </li>
                    </ul> <!-- RAW LEAGUE SCORE -->
                </div> <!-- COL-MD-4 -->                
            </div>

            <div class="col-md-4">
                <div class="league-brand-score">
                    <div class="score"><h2>50.0</h2></div>
                    <div class="league-rank"><p>#9</p></div>
                </div>
                <div class="league-members-score">
                    <h3>SMACKDOWN</h3>
                    <ul>
                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">1º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">2º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">3º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">4º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">5º</p>
                            <p class="member-score">14.5</p>                            
                        </li>
                    </ul>
                </div>  <!-- SMACKDOWN LEAGUE SCORE -->              
            </div> <!-- COL-MD-4 -->

            <div class="col-md-4">
                <div class="league-brand-score">
                    <div class="score"><h2>50.0</h2></div>
                    <div class="league-rank"><p>-</p></div>
                </div>
                <div class="league-members-score">
                    <h3>PAY PER VIEW</h3>
                    <ul>
                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">1º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">2º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">3º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">4º</p>
                            <p class="member-score">14.5</p>                            
                        </li>

                        <li>
                            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                            <p class="member-position">5º</p>
                            <p class="member-score">14.5</p>                            
                        </li>
                    </ul>
                </div>  <!-- PPV LEAGUE SCORE -->              
            </div> <!-- COL-MD-4 -->

        </div>

        <!--<div class="membrosLiga">
            <table class="membrosLiga-info">
                <h5 class="btn-danger btn-lg btn-block brandTitle">RAW</h5>
                <center>
                    <tr>
                        
                        <th class="membroLigaNome"><u><h4>Name</h4></u></th>
                        <th class="membroLigaCampo"><h4>Weekly Points</h4></th>
                        <th class="membroLigaCampo"><h4>Total Points</h4></th>
                           
                    </tr>
             
             @foreach($membrosRaw as $membroRaw)
                    <tr>
                        <th class="membroLigaNome"><u><h4>{{$membroRaw->name}}</h4></u></th>
                        <th class="membroLigaCampo"><h4>{{$membroRaw->team_points}}</h4></th>
                        <th class="membroLigaCampo"><h4>{{$membroRaw->team_total_points}}</h4></th>
                    </tr>
            @endforeach

            </center>
            </table>
        </div>  DIV LUTADOR -->
    </div>
    @else

    <section class="container league-form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-title">
                    <h2>Create League</h2>
                </div>
                <form method="post" action="">
                    <label for="league-name">League Name:</label><br>
                    <input class="input-field" name="league-name" type="text"><br>

                    <label for="league-pss">League Password:</label><br>
                    <input class="input-field" type="password"><br>

                    <label for="league-pss">Confirm Password:</label><br>
                    <input class="input-field" type="password"><br>

                    <input class="btn-league-form" type="submit" value="CREATE">
                </form>
            </div>

            <div class="col-md-6">
                <h2>Join a League</h2>
                <form method="post" action="">
                    <label for="league-name">League Name:</label><br>
                    <input class="input-field" name="league-name" type="text"><br>

                    <label for="league-pss">League Password:</label><br>
                    <input class="input-field" name="league-pss" type="password"><br>

                    <input class="btn-league-form" type="submit" value="JOIN">
                </form>
            </div>
        </div>
    </section>

    @endif
@endsection