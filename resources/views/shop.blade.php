@extends('layouts/app')

@section('content')

<section class="shop-banner">
    <div class="container-fluid">
        <div class="row">
            <h2>SHOP</h2>
        </div>
    </div>
</section>

<section class="container-fluid showcase">

    <div class="row">
        <div class="col-sm-6 col-md-6 user-wc">
            <img src="{{ ('img/wc.png') }}" alt="Wrestling Coin">
            <p>150</p>
        </div>
        <div class="col-sm-6 col-md-6">

        </div>       
    </div>

    

    <div class="row">
        <div class="separador"></div>

        <div class="icon-block">       
            <img class="icon-img" src="{{ ('img/roman_reigns.png') }}" alt="Icone">
            <p>Roman Reigns</p>
            <div>
                <img src="{{ ('img/wc.png') }}" alt="Wrestling Coin">
                <p>150</p>
            </div>
            <div class="btn-shop"><a >BUY</a></div>
        </div>  
        
        <div class="icon-block">       
            <img class="icon-img" src="{{ ('img/roman_reigns.png') }}" alt="Icone">
            <p>Roman Reigns</p>
            <div>
                <img src="{{ ('img/wc.png') }}" alt="Wrestling Coin">
                <p>150</p>
            </div>
            <div class="btn-shop"><a >BUY</a></div>
        </div>   

        <div class="icon-block">       
            <img class="icon-img" src="{{ ('img/roman_reigns.png') }}" alt="Icone">
            <p>Roman Reigns</p>
            <div>
                <img src="{{ ('img/wc.png') }}" alt="Wrestling Coin">
                <p>150</p>
            </div>
            <div class="btn-shop"><a >BUY</a></div>
        </div>   

        <div class="icon-block">       
            <img class="icon-img" src="{{ ('img/roman_reigns.png') }}" alt="Icone">
            <p>Roman Reigns</p>
            <div>
                <img src="{{ ('img/wc.png') }}" alt="Wrestling Coin">
                <p>150</p>
            </div>
            <div class="btn-shop"><a >BUY</a></div>
        </div>   

        <div class="icon-block">       
            <img class="icon-img" src="{{ ('img/roman_reigns.png') }}" alt="Icone">
            <p>Roman Reigns</p>
            <div>
                <img src="{{ ('img/wc.png') }}" alt="Wrestling Coin">
                <p>150</p>
            </div>
            <div class="btn-shop"><a >BUY</a></div>
        </div> 

    </div>

</section>





@endsection