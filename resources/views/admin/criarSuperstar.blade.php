@extends('layouts/adminLayout')
@section('title', 'Create Superstar')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form action="{{route('createSuperstar')}}" method="post" name="Create_Superstar_Form" class="form-create" enctype="multipart/form-data" id="enviar">       
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
                        <input type="text" name="name" placeholder="Name" autofocus="" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select name="brand" class="form-control">
                            <option value="Raw">Raw</option>
                            <option value="Smackdown">Smackdown</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    <div class="">
                        <label>Image </label>
                        <input type="file" name="imagem" class="dropify upp-superstar"/>
                    </div>
                    
                    <!-- BOTÃO -->
                    <br/>    
                </form>    
                <button class="btn btn-danger btn-block btn-lg btn-rounded"  name="Submit" value="editar" type="Submit" onClick="teste()">Create</button>     
                <!-- FORMULARIO [FIM] -->
            </div>
        </div>
    </div>
    
@endsection 
