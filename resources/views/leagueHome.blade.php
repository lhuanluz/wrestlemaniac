@extends('layouts/app')

@section('content')

    @if($userHasLeague == true)

    <div class="container league-page">
        <div class="row league-profile">

            <div class="col-md-6 league-name">
                <h2>League Name</h2>
                <a href="#"><p><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp</i>Edit League</p></a>
                <a href="#"><p>Leave League</p></a>
            </div>
            
            <div class="col-md-3 league-info">
                <h2>LEAGUE SCORE</h2>
                <h3>50.0</h3>
            </div>

            <div class="col-md-3 league-info">
                <div class="divisor"></div>
                <h2>LEAGUE RANK</h2>
                <h3>999º</h3>
            </div>
        </div> <!-- LEAGUE-PROFILE -->

        <div class="row league-team">
            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
            <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
        </div> <!-- LEAGUE-TEAM -->


        <div class="row league-scores raw">
            
            <div class="col-md-9">
                <ul>
                    <li>RAW</li>
                    <li>
                        <p>1º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <li>
                        <p>2º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>3º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>4º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>5º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>
                    
                </ul>
            </div>

            <div class="col-md-3 league-partial-scores">
                <ul>
                    <li>TOTAL SCORE</li>
                    <div class="divisor"></div>
                    <li>50.0</li>
                </ul>
            </div>

        </div> <!-- LEAGUE-SCORES RAW -->


        <div class="row league-scores smackdown">
            
            <div class="col-md-9">
                <ul>
                    <li>SMACKDOWN</li>
                    <li>
                        <p>1º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <li>
                        <p>2º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>3º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>4º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>5º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>
                    
                </ul>
            </div>

            <div class="col-md-3 league-partial-scores">
                <ul>
                    <li>TOTAL SCORE</li>
                    <div class="divisor"></div>
                    <li>50.0</li>
                </ul>
            </div>

        </div> <!-- LEAGUE-SCORES SMACKDOWN -->


        <div class="row league-scores payperview">
            
            <div class="col-md-9">
                <ul>
                    <li>PAY PER VIEW</li>
                    <li>
                        <p>1º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <li>
                        <p>2º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>3º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>4º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>

                    <div class="divisor"></div>

                    <li>
                        <p>5º</p>
                        <div class="avatar" style="background: url({{Auth::user()->photo}}) center center no-repeat; background-size: cover; background-color: #000"></div>
                        <p>Melquesedeque Gomes</p>
                        <p>14.5</p>
                    </li>
                    
                </ul>
            </div>

            <div class="col-md-3 league-partial-scores">
                <ul>
                    <li>TOTAL SCORE</li>
                    <div class="divisor"></div>
                    <li>50.0</li>
                </ul>
            </div>

        </div> <!-- LEAGUE-SCORES PAY PER VIEW -->


    </div> <!-- LEAGUE-PAGE -->
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