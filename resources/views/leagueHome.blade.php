@extends('layouts/app')

@section('content')

    @if($userHasLeague == true)
    <div class="page-header">
            <h1 class="title">Your League<i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h1>
    </div>
    <div class="container">
        
        <div class="membrosLiga">
            <table class="membrosLiga-info">
             @foreach($membros as $membro)
                <center>
                    <tr>
                        <th><u><h4>{{$membro->name}}</h4></u></th>
                    </tr>
                </center>
                
            @endforeach
            </table>
        </div> <!-- DIV LUTADOR -->
    </div>
    @else

    @endif
@endsection