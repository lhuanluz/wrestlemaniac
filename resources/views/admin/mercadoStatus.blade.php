@extends('layouts/adminLayout')
@section('title', 'Edit Market Status')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="row">
                <div class="wrapper">
                    <!-- FORMULARIO -->
                    <form action="{{route('editMarketStatus')}}" method="post" name="Market_Satus_Form" class="form-signin" id="enviar">       
                        <h1 class="page-header">
                                    Editing Market Status
                                </h1>
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
                            <label>Market:</label>
                            <select name="market" class="form-control">
                                <option value="Raw">Raw</option>
                                <option value="Smackdown">Smackdown</option>
                                <option value="PPV">PPV</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Action:</label>
                            <select name="action" class="form-control">
                                <option value="Aberto">Open</option>
                                <option value="Fechado">Close</option>
                            </select>
                        </div>  
                        <!-- BOTÃO --> 
                    </form>
                    <button class="btn btn-rounded btn-danger btn-block btn-lg"   name="Submit" value="editar" type="Submit" onClick="teste()">Edit</button>
                    <!-- FORMULARIO [FIM] -->
                </div>
            </div>
        </div>
    </div>
@endsection 