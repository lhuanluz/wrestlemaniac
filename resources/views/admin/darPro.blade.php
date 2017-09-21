@extends('layouts/adminLayout')
@section('title', 'Give Pro')
@section('conteudo_principal')
<div class="card-box">
    <div class="container-fluid">
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="post" action="{{route('givePro')}}"  name="Edit_User_Email" class="form-create" id="enviar">       
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
                        <select name="tipo" class="form-control">
                            <option value="Pro">Pro</option>
                            <option value="Free">Free</option>
                        </select>
                </div>
                <!-- BOTÃO -->
                <br/>
            </form>
            <button class="btn btn-danger btn-block btn-lg btn-rounded"  name="Submit" value="dar" type="Submit" onClick="teste()">Give</button>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
</div>
@endsection 