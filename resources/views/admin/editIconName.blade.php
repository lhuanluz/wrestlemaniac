@extends('layouts/adminLayout')
@section('title', 'Edit Icon Name')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form action="{{route('editIconName')}}" method="post" name="Edit_Icon_Name_Form" class="form-create" enctype="multipart/form-data" id="enviar">       
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
                        <input type="text" name="oldName" placeholder="Name" autofocus="" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Tier</label>
                        <select name="tier" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>New Name</label>
                        <input type="text" name="newName" placeholder="New Name" autofocus="" class="form-control"/>
                    </div>                    
                    
                    <!-- BOTÃO -->
                    <br/>    
                </form>    
                <button class="btn btn-danger btn-block btn-lg btn-rounded"  name="Submit" value="editar" type="Submit" onClick="teste()">Edit Icon Name</button>     
                <!-- FORMULARIO [FIM] -->
            </div>
        </div>
    </div>
    
@endsection 
