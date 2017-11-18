@extends('layouts/adminLayout')
@section('title', 'Add Icon')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="wrapper">
                <!-- FORMULARIO -->
                <form action="{{route('addIcon')}}" method="post" name="Add_Icon_Form" class="form-create" enctype="multipart/form-data">       
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
                        <label>Tier</label>
                        <select name="tier" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="">
                        <label>Image </label>
                        <input type="file" name="imagem" class="dropify upp-superstar"/>
                    </div>
                    
                    <!-- BOTÃO -->
                    <br/>
                    <button class="btn btn-danger btn-block btn-lg btn-rounded"  name="Submit" value="editar" type="Submit">Add Icon</button>    
                </form>    
                     
                <!-- FORMULARIO [FIM] -->
            </div>
        </div>
    </div>
    
@endsection 
