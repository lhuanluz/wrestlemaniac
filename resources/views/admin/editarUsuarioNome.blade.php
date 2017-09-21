@extends('layouts/adminLayout')
@section('title', 'Edit User Name')
@section('conteudo_principal')
<div class="card-box">
    <div class="container-fluid">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form method="post" action="{{route('editUserName')}}"  name="Edit_User_Email" class="form-create" id="enviar">       
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
                        <label>New name</label>
                        <input type="text" name="nome" class="form-control">
                    </div>
                    <!-- BOTÃO -->
                    <br/>
                </form>
                <button class="btn btn-rounded btn-danger btn-block btn-lg"   name="Submit" value="editar" type="Submit" onClick="teste()">Edit</button>         
                <!-- FORMULARIO [FIM] -->
        </div>
    </div>
</div>
@endsection 