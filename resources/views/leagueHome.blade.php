@extends('layouts/app')

@section('content')

    @if($userHasLeague == true)
    
    <div class="page-header">
            <h1 class="title">Your League<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
    </div>
    <div class="container">
        
        <div class="membrosLiga">
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
        </div> <!-- DIV LUTADOR -->
    </div>
    @else

    @endif
@endsection