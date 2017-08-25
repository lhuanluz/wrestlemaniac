@extends('layouts/adminLayout')

@section('conteudo_principal')
<div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Create
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="post" action="{{route('cWarningR')}}"  name="Create_Warning" class="form-create">       
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
                    <label>Title</label>
                   <input type="title" name="title" class="form-control">                
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <input type="text" name="text" class="form-control">
                </div>
                <div class="form-group">
                        <label>Type:</label>
                        <select name="level" class="form-control">
                            <option value="1">Raw</option>
                            <option value="2">Smackdown</option>
                            <option value="3">PPV</option>
                            <option value="4">System</option>
                            <option value="5">Others</option>
                        </select>
                </div>
                <div class="form-group">
                    <label>Data</label>
                    <input id="datetime" type="datetime-local" name="date">
                </div>
                
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Send Warning</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
@endsection 