@extends('layouts/app')

@section('content')
<!-- MELQUEXON-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
		$(function(){
			$("#txtBusca").keyup(function(){
				var texto = $(this).val();
				
				$("#ulItens li").css("display", "inline");
				$("#ulItens li").each(function(){
					if($(this).text().toUpperCase().indexOf(texto.toUpperCase()) < 0)
   						$(this).css("display", "none");
				});
			});
		});

	</script>
<section class="shop-banner">
    <div class="container-fluid">
        <div class="row">
            <h2>ICON STORE</h2>
        </div>
    </div>
</section>

<section class="container-fluid showcase">

    <div class="row">
        <div class="col-sm-6 col-md-6 user-wc">
            <img src="{{ ('img/wc.png') }}" alt="Wrestling Coin">
            <p>{{Auth::user()->wc}}</p>
            <div id="wrapSearchShop">
            <form action="" autocomplete="on">
                <input id="txtBusca" name="search" type="text" placeholder="Search for an icon"><input id="search_submit" value="Rechercher" type="submit">
            </form>
        </div>
        </div>
        <div class="col-sm-6 col-md-6">

        </div>       
    </div>

    <div class="row">
        <div class="separador"></div> 
            <ul id="ulItens">
                @foreach($iconsNaoComprados as $iconNaoComprado)
                <li class="pontosSelect">
                    <form method="post" action="{{route('buyIcon')}}"  name="Edit_User_Photo" class="form-create">
                    {{ csrf_field()  }}
                        
                            <div class="icon-block">       
                                <img class="icon-img" src="{{ $iconNaoComprado->img_url }}" alt="Icone">
                                <p>{{ $iconNaoComprado->name }}</p>
                                <input type="hidden" name="iconID" value="{{ $iconNaoComprado->id }}"/>
                                <div>
                                    <img src="{{ ('img/wc.png') }}" alt="Wrestling Coin">
                                    <p>{{ $iconNaoComprado->price }}</p>
                                </div>
                                @if(Auth::user()->wc < $iconNaoComprado->price)
                                <button type="submit" class="btn btn-shop" disabled>BUY</button>
                                @else
                                <button type="submit" class="btn btn-shop">BUY</button>
                                @endif
                            </div>  
                        </form>
                    </li>
                @endforeach
            </ul>    
    </div>

</section>





@endsection