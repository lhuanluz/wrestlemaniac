@extends('layouts/adminLayout')
@section('title', 'Add Points')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="row">
                <div class="wrapper">
                    <!-- FORMULARIO -->
                    <form action="{{route('addPoints')}}" method="post" name="Edit_Superstar_Form" class="form-signin">       
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
                        <div class="form-group">
                            <label>Points:</label>
                            <input type="number" name="points" min="0" step="any" class="pontos form-control">
                        </div>
                        <!-- BOTÃO -->
                        <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="editar" type="Submit">Add</button>     

                    </form>
                    <!-- FORMULARIO [FIM] -->
                </div>
            </div>
        </div>
    </div>
@endsection 