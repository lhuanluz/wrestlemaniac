@extends('layouts/app')

@section('content')
    
    <div class="controladores btn-group-justified">
        <a href="{{route('mercadoHome')}}">Name▲</a>
        @if(Route::is('mercadoHome')|| Route::is('mercadoPriceDesc') ||Route::is('mercadoPointsDesc'))
        <a href="{{route('mercadoPriceAsc')}}">Price▲</a>
        <a href="{{route('mercadoPointsAsc')}}">Points▲</a>
        @endif
        @if(Route::is('mercadoPriceAsc'))
        <a href="{{route('mercadoPriceDesc')}}">Price▼</a>
        <a href="{{route('mercadoPointsAsc')}}">Points▲</a>
        @endif  
        @if(Route::is('mercadoPointsAsc'))
        <a href="{{route('mercadoPriceAsc')}}">Price▲</a>
        <a href="{{route('mercadoPointsDesc')}}">Points▼</a>
        @endif      
    </div>
@foreach($superstars as $superstar)
    
    <div class="lutador">
        <img src="{{url($superstar->image)}}" alt="Card image cap">
        <form class="lutador-info" action="#">
            <center>
            <u><h4 name="name">{{$superstar->name}}</h4></u>
            @if($superstar->last_show == 1)
            <div class="alert-success">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            Appeard on Last Show
            </div>
            @else
            <div class="alert-danger" >
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            Didn't appeard on Last Show
            </div>
            @endif
            
            <h2 class="pontos">{{$superstar->points . ' / ' . $superstar->last_points}}</h2>
            <h2 class="preço"><span class="glyphicon glyphicon-usd"></span>{{$superstar->price}}</h2>
            @if(Auth::user())
            @if($superstar->brand == 'Raw')
                <input type=Submit value="Buy" class="btn btn-danger btn-group-justified">
            @else
                <input type=Submit value="Buy" class="btn btn-primary btn-group-justified">
            @endif
            @endif
            
            </center>
        </form>
    </div>
@endforeach
@endsection
