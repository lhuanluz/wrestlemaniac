@extends('layouts/adminLayout')
@section('title', 'Edit PPV Name')
@section('conteudo_principal')
<div class="card-box">
    <div class="container-fluid">
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="post" action="{{route('editPpvName')}}"  name="Edit_User_Email" class="form-create" id="enviar">       
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
                   <input type="text" name="name" class="form-control">                
                </div>
                <!-- BOTÃO -->
                <br/>
            </form>
            <button class="btn btn-danger btn-block btn-lg btn-rounded"  name="Submit" value="dar" type="Submit" onClick="teste()">Edit</button>
                     
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
</div>
@endsection 