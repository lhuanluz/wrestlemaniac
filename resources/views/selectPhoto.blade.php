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

<div class="container-fluid select-photo">
    <div class="row">
        
        @if($iconsComprados == NULL)
            <center>
                <h2>You don't have any icons yet, buy some on the <a href="{{route('iconStore')}}">Icon Store</a></h2>
            </center>
            
        @else
        <h2>Select Your Photo</h2>
        <div id="wrapSearch">
            <form action="" autocomplete="on">
                <input id="txtBusca" name="search" type="text" placeholder="Search for an icon"><input id="search_submit" value="Rechercher" type="submit">
            </form>
        </div>
        <div class="iconsPos">
        <form method="post" action="{{route('selectPhoto')}}"  name="Edit_User_Photo" class="form-create">  
        {{ csrf_field()  }}
            <ul id="ulItens">
                @foreach($iconsComprados as $iconComprado)
                <li class="pontos">
                    <div class="photoBase">
                    <label>
                        <input type="radio" name="photo" value="{{$iconComprado->img_url}}" onChange='this.form.submit();'/>
                        <img src="{{$iconComprado->img_url}}" class="photo"></br>
                        <center>
                            <h4 class="nomePhoto">{{$iconComprado->name}}</h4>
                        </center>
                        
                    </label>
                    </div>
                </li>
                @endforeach
            </ul>    
        </form>
        </div>
        
        @endif
    </div>

</div>

@endsection