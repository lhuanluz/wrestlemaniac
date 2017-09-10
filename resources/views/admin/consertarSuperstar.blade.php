@extends('layouts/adminLayout')
@section('title', 'Fix Superstar')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form action="{{route('fixSuperstar')}}" method="post" name="Fix_Superstar_Form" class="form-create">       
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
                    <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Fix</button>     

                </form>         
                <!-- FORMULARIO [FIM] -->
            </div>
        </div>
    </div>
@endsection 
