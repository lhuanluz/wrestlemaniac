@extends('layouts/adminLayout')

@section('conteudo_principal')

    <div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form action="{{url('admin/superstar/edit/confirm')}}" method="post" name="Edit_Superstar_Form" class="form-signin">       
                <h1 class="page-header">
                            Editando Superstar
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
                Name:
                <input list="names" name="name"><br/>

                <datalist id="names">
                @foreach($superstars as $superstar){
                    <option value="{{$superstar->name}}">
                }
                @endforeach
                
                </datalist>
                Points: <input type="number" name="points" min="0" step="any" class="pontos"><br/>
                Price: <input type="number" name="price" min="0" step="any" class="preço"><br/><br/>

                <!-- BOTÃO -->
                <button class="btn btn-primary"  name="Submit" value="editar" type="Submit">Editar</button>     

            </form>
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
    </div>
@endsection 