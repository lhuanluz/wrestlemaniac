@extends('layouts/adminLayout')

@section('conteudo_principal')

    <div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Criando Superstar
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form action="{{url('admin/superstar/create/confirm')}}" method="post" name="Create_Superstar_Form" class="form-signin" enctype="multipart/form-data">       
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
                <font color="black">Name: </font><input type="text" name="name" placeholder="Name" autofocus=""/><br/>
                <font color="black">Brand: </font><select name="brand">
                    <option value="Raw">Raw</option>
                    <option value="Smackdown">Smackdown</option>
                </select><br/>
                <font color="black">Imagem: </font><input type="file" name="imagem"/><br/>

                <!-- BOTÃO -->
                <button class="btn btn-primary"  name="Submit" value="criar" type="Submit">Criar</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
@endsection 
