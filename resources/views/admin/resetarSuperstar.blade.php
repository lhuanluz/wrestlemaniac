@extends('layouts/adminLayout')
@section('title', 'Reset Superstar')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form action="{{route('resetSuperstar')}}" method="post" name="Reset_Superstar_Form" class="form-create" id="enviar">       
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

                    <!-- Campos -->  
                    <div class="form-group">
                        <label>Name</label>
                        <input list="names" name="name" class="form-control" autofocus="">
                        <datalist id="names">
                            @foreach($superstars as $superstar){
                                <option value="{{$superstar->name}}">
                            }
                            @endforeach
                        </datalist>
                    </div>
                    <!-- BOTÃO -->
                    <br/>
                </form>      
                <button class="btn btn-rounded btn-danger btn-block btn-lg"   name="Submit" value="editar" type="Submit" onClick="teste()">Reset</button>   
                <!-- FORMULARIO [FIM] -->
            </div>
        </div>
    </div>
@endsection 
