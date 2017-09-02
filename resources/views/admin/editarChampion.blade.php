@extends('layouts/adminLayout')
@section('title', 'Edit Champion')
@section('conteudo_principal')
    <div class="card-box">
    <div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form action="{{route('editChampion')}}" method="post" name="Edit_Champion_Form" class="form-signin">       
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
                    <label>Title</label>
                    <select name="belt" class="form-control">
                        <option value="Cruiserweight Champion">Cruiserweight Champion</option>
                        <option value="Intercontinental Champion">Intercontinental Champion</option>
                        <option value="Mr. Money in the Bank">Mr. Money in the Bank</option>
                        <option value="Ms. Money in the Bank">Ms. Money in the Bank</option>
                        <option value="Raw Tag Team Champion 1">Raw Tag Team Champion 1</option>
                        <option value="Raw Tag Team Champion 2">Raw Tag Team Champion 2</option>
                        <option value="Raw Universal Champion">Raw Universal Champion</option>
                        <option value="Raw Women's Champion">Raw Women's Champion</option>
                        <option value="Smackdown Tag Team Champion 1">Smackdown Tag Team Champion 1</option>
                        <option value="Smackdown Tag Team Champion 2">Smackdown Tag Team Champion 2</option>
                        <option value="Smackdown Women's Champion">Smackdown Women's Champion</option>
                        <option value="United States Champion">United States Champion</option>
                        <option value="WWE Champion">WWE Champion</option>
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