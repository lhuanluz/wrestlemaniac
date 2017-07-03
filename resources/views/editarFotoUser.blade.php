@extends('layouts/adminLayout')

@section('conteudo_principal')
<div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit E-mail
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="post" action="{{route('editPhotoR')}}"  name="Edit_User_Photo" class="form-create">       
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
                    <labele>E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <select name="photo" class="form-control">
                        <option value="storage/users/papa-shango.png">Papa Shango</option>
                        <option value="storage/users/hulk-hogan.png">Hulk Hogan</option>
                        <option value="storage/users/andre-the-giant.png">Andre The Giant</option>
                        <option value="storage/users/bret-hart.png">Bret Hart</option>
                        <option value="storage/users/bruno-sammartino.png">Bruno Sammartino</option>
                        <option value="storage/users/dusty-rhodes.png">Dusty Rhodes</option>
                        <option value="storage/users/eddie-guerrero.png">Eddie Guerrero</option>
                        <option value="storage/users/mick-foley.png">Mick Foley</option>
                        <option value="storage/users/randy-savage.png">Randy Savage</option>
                        <option value="storage/users/razor-ramon.png">Razor Ramon</option>
                        <option value="storage/users/ric-flair.png">Ric Flair</option>
                        <option value="storage/users/shawn-michales.png">Shawn Michaels</option>
                        <option value="storage/users/stone-cold.png">Stone Cold Steve Austin</option>
                        
                    </select>
                </div>
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Edit E-mail</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
@endsection 