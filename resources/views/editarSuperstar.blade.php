<!DOCTYPE html>
<html lang="pt-BR">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro de Superstar</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <style>
        .pontos {
            width: 60px;
        }
        .preço {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form action="{{url('admin/superstar/edit/confirm')}}" method="post" name="Edit_Superstar_Form" class="form-signin">       
                <h3 class="header-login">Editar Superstar</h3>
                <hr class="colorgraph"><br>
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
                <font color="white">Name: </font><input type="text" name="name" placeholder="Name" autofocus=""/><br/>
                <font color="white">Points: </font><input type="number" name="points" min="0" step="any" class="pontos"><br/>
                <font color="white">Price: </font><input type="number" name="price" min="0" step="any" class="preço"><br/>

                <!-- BOTÃO -->
                <button class="btn btn-primary"  name="Submit" value="editar" type="Submit">Editar</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>

</body>

</html>
