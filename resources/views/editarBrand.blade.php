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
            <form action="{{route('editarBrand')}}" method="post" name="Edit_Brand_Form" class="form-create">       
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
                <div class="form-group">
                    <label>Brand</label>
                    <select name="brand" class="form-control">
                        <option value="Raw">Raw</option>
                        <option value="Smackdown">Smackdown</option>
                        <option value="None">None</option>
                    </select>
                </div>
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Create</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
@endsection 
