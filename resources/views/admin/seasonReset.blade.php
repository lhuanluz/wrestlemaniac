@extends('layouts/adminLayout')
@section('title', 'Reset Season')
@section('conteudo_principal')
<div class="card-box">
    <div class="container-fluid">
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="post" action="{{route('seasonReset')}}" class="form-create" id="enviar">       
                {{ csrf_field()  }}

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <br/>
            </form>
            <button class="btn btn-danger btn-block btn-lg btn-rounded"  name="Submit" value="dar" type="Submit" onClick="teste()">RESET</button>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
</div>
@endsection 