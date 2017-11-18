@extends('layouts/adminLayout')
@section('title', 'Create Admin')
@section('conteudo_principal')
<div class="card-box">
    <div class="container-fluid">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form method="post" action="{{route('createAdmin')}}"  name="Edit_User_Email" class="form-create" id="enviar">       
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
                        <label>E-mail</label>
                    <input type="email" name="email" class="form-control">                
                    </div>
                    <div class="form-group">
                            <label>Type:</label>
                            <select name="nivel" class="form-control">
                                <option value="0">Normal</option>
                                <option value="1">Admin: Level 1</option>
                                <option value="2">Admin: Level 2 </option>
                                <option value="3">Admin: Level 3 </option>
                            </select>
                    </div>
                    <div class="form-group">
                            <label>Role:</label>
                            <input type="text" name="role" class="form-control">     
                            
                    </div>
                    <!-- BOTÃO -->
                    <br/>

                </form>
                <button class="btn btn-rounded btn-danger btn-block btn-lg"   name="Submit" value="editar" type="Submit" onClick="teste()">Create</button>         
                <!-- FORMULARIO [FIM] -->
        </div>
    </div>
</div>
@endsection 