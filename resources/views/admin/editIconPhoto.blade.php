@extends('layouts/adminLayout')
@section('title', 'Edit Icon Photo')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form action="{{route('editIconPhoto')}}" method="post" name="Edit_Icon_Photo_Form" class="form-create" enctype="multipart/form-data" id="enviar">       
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
                        <label>Tier</label>
                        <input type="number" name="tier" min="1" max= "6" class="form-control"/>
                    </div>                    
                    <div class="">
                        <label>Image </label>
                        <input type="file" name="imagem" class="dropify upp-superstar"/>
                    </div>
                    
                    <!-- BOTÃO -->
                    <br/>    
                </form>    
                <button class="btn btn-danger btn-block btn-lg btn-rounded"  name="Submit" value="editar" type="Submit" onClick="teste()">Edit Icon Photo</button>     
                <!-- FORMULARIO [FIM] -->
            </div>
        </div>
</div>
@endsection 
