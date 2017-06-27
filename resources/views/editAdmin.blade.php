@extends('layouts/adminLayout')

@section('conteudo_principal')
<div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Level
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="post" action="{{route('editAdminR')}}"  name="Edit_User_Email" class="form-create">       
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
                    <label>ADM Level(0= Normal, 1= ADM)</label>
                    <input type="number" name="nivel" min="0" max="1" class="form-control">
                </div>
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Edit Level</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
@endsection 