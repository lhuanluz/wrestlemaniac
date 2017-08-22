@extends('layouts/app')

@section('content')

<div class="container-fluid how-to-play">
    <div class="row">
        <h2>Select Your Photo</h2>
        <form method="post" action="{{route('selectPhoto')}}"  name="Edit_User_Photo" class="form-create">  
        {{ csrf_field()  }}
            @foreach($imagens as $imagem)
            <div class="photoBase">
            <label>
                <input type="radio" name="photo" value="{{$imagem->img_url}}" onChange='this.form.submit();'/>
                <img src="{{$imagem->img_url}}" class="photo"></br>
                <center><h4 class="nomePhoto">{{$imagem->name}}</h4></center>
            </label>
            </div>
            @endforeach    
        </form>
    </div>

</div>

@endsection