@extends('layouts/adminLayout')

@section('conteudo_principal')
<div class="container-fluid">
    <div class="row">
     <div class="col-lg-12">
                        <h1 class="page-header">
                            Adding Photos
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form action="{{route('addPhoto')}}" method="post" name="Create_Photo_Form" class="form-create" enctype="multipart/form-data">       
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
                <div>
                    <label>Image </label>
                    <input type="file" name="photo" />
                </div>
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Create</button>     

            </form>                 
            
    </div>
@endsection 