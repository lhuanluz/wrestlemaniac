@extends('layouts/app')

@section('content')

@foreach($superstars as $superstar)

     <div class="lutador">
        <img src="{{url($superstar->image)}}" alt="Card image cap">
        <form class="lutador-info" action="#">
            <center>
            <u><h4>{{$superstar->name}}</h4></u>
            <h2 class="pontos">{{$superstar->points . ' / ' . $superstar->last_points}}</h2>
            <h2 class="preço"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
            <input type=Submit value="Comprar" class="btn btn-danger btn-group-justified">
            </center>
        </form>
    </div>
@endforeach

@endsection
