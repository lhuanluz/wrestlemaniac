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
            <form action="{{url('admin/superstar/create/confirm')}}" method="post" name="Create_Superstar_Form" class="form-create" enctype="multipart/form-data">       
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
                        <option value="Raw">None</option>
                    </select>
                </div>
                <div class="">
                    <label>Image </label>
                    <input type="file" name="imagem" />
                </div>
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Create</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
@endsection 
