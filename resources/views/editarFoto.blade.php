@extends('layouts/adminLayout')

@section('conteudo_principal')

    <div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editing Photo
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form action="{{route('editarFoto')}}" method="post" name="Edit_Photo_Form" class="form-create" enctype="multipart/form-data">       
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
                <div class="">
                    <label>Image </label>
                    <input type="file" name="image" />
                </div>
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Edit</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
@endsection 
