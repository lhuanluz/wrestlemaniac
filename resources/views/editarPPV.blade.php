@extends('layouts/adminLayout')

@section('conteudo_principal')
    <div class="container-fluid">
        <div class="row">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form action="{{route('editarPpv')}}" method="post" name="Market_Satus_Form" class="form-signin">       
                    <h1 class="page-header">
                               Editing PPV
                            </h1>
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
                        <label>Brand:</label>
                        <select name="brand" class="form-control">
                            <option value="Raw">Raw</option>
                            <option value="Smackdown">Smackdown</option>
                            <option value="Both">Both</option>
                        </select>
                    </div>
                    <!-- BOTÃO -->
                    <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="editar" type="Submit">Edit</button>     

                </form>
                <!-- FORMULARIO [FIM] -->
            </div>
        </div>
    </div>
@endsection 