<!DOCTYPE html>
<html lang="pt-BR">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prova II</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container">
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form action="{{ route('logar') }}" method="post" name="Login_Form" class="form-signin">       
                <h3 class="header-login">Login - Prova II</h3>
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



                <!-- LOGIN -->  
                <input type="text" name='login' class="form-control" placeholder="Login" autofocus="" />
                
                <!-- SENHA -->
                <input type="password" name='senha' class="form-control" placeholder="Senha"/>
                <input type="password" name='confirmar_senha' class="form-control" placeholder="Confirmar Senha"/> <br/>           
                
                <!-- BOTÃO -->
                <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Logar</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>

</body>

</html>
