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
<div class="form-group">
  <label class="col-md-4 control-label" for="angle">Angle</label>
  <div class="col-md-4">
    <select id="angle" name="angle" class="form-control">
      <option value="2">Sair por cima</option>
      <option value="1">Sair por baixo</option>
      <option value="1.5">Neutro</option>
      <option value="3">Beatdown</option>
      <option value="0">Recebeu Beatdown</option>
    </select>
  </div>
</div>

<br><br><br>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="match">Match</label>
  <div class="col-md-4">
    <select id="match" name="match" class="form-control">
      <option value="1">Sofrer Pinfall</option>
      <option value="3">Aplicar Pinfall</option>
      <option value="3.5">Aplicar Submission</option>
      <option value="0.5">Sofrer Submission</option>
      <option value="1.5">Ganhar por DQ</option>
      <option value="2.5">Perder por DQ</option>
      <option value="2.5">Ganhar por Count Out</option>
      <option value="1">Perder por Count Out</option>
      <option value="1.5">Double Count Out</option>
    </select>
  </div>
</div>

<br><br><br>
<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tagteam">Tag Team</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="tagteam-0">
      <input type="checkbox" name="tagteam" id="tagteam-0" value="0.5">
      Vitoria
    </label>
    <label class="checkbox-inline" for="tagteam-1">
      <input type="checkbox" name="tagteam" id="tagteam-1" value="-0.5">
      Derrota
    </label>
  </div>
</div>
<br><br><br>
<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="estipulacao">Estipulação de Número(Triple Threat, etc)</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="estipulacao-0">
      <input type="checkbox" name="estipulacao" id="estipulacao-0" value="0.5">
      3
    </label>
    <label class="checkbox-inline" for="estipulacao-1">
      <input type="checkbox" name="estipulacao" id="estipulacao-1" value="1">
      4
    </label>
    <label class="checkbox-inline" for="estipulacao-2">
      <input type="checkbox" name="estipulacao" id="estipulacao-2" value="1.5">
      5
    </label>
    <label class="checkbox-inline" for="estipulacao-3">
      <input type="checkbox" name="estipulacao" id="estipulacao-3" value="2">
      6
    </label>
  </div>
</div>
<br><br><br>
<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="squash">Squash</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="squash-0">
      <input type="checkbox" name="squash" id="squash-0" value="0.5">
      Vitoria
    </label>
    <label class="checkbox-inline" for="squash-1">
      <input type="checkbox" name="squash" id="squash-1" value="-1">
      Derrota
    </label>
  </div>
</div>
<br><br><br>
<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cage">Cage Match</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="cage-0">
      <input type="checkbox" name="cage" id="cage-0" value="1">
      Vitoria
    </label>
    <label class="checkbox-inline" for="cage-1">
      <input type="checkbox" name="cage" id="cage-1" value="-1">
      Derrota
    </label>
  </div>
</div>
<br><br><br>
<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="extra">Extras</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="extra-0">
      <input type="checkbox" name='mainevent' id="extra-0" value="2">
      Main Event
    </label>
	</div>
  <div class="checkbox">
    <label for="extra-1">
      <input type="checkbox" name='title' id="extra-1" value="2">
      Title Match/Maleta
    </label>
	</div>
  <div class="checkbox">
    <label for="extra-2">
      <input type="checkbox" name='champ' id="extra-2" value='2'>
      Champion
    </label>
	</div>
  
  </div>
</div>               
                </div>
                
                <!-- BOTÃO -->
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="editar" type="Submit">Edit</button>     

            </form>
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
    </div>
@endsection 