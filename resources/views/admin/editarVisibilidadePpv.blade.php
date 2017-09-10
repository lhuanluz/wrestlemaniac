@extends('layouts/adminLayout')
@section('title', 'Edit PPV Visibility')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="row">
                <div class="wrapper">
                    <!-- FORMULARIO -->
                    <form action="{{route('editPpvVisibility')}}" method="post" name="Market_Satus_Form" class="form-signin">       
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
                            <label>State:</label>
                            <select name="acao" class="form-control">
                                <option value="Aberto">Open</option>
                                <option value="Fechado">Closed</option>
                            </select>
                        </div>
                        <!-- BOTÃO -->
                        <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="editar" type="Submit">Edit</button>     

                    </form>
                    <!-- FORMULARIO [FIM] -->
                </div>
            </div>
        </div>
    </div>
@endsection 