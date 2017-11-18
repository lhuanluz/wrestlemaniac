@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Change Email
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="get" action="{{route('sendChangeEmail')}}"  name="Edit" class="form-create">       
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
                    
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Edit Email</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>

    @if(Session::has('message'))
<div class="alert-box success">
    {{ Session::get('message') }}
</div>
@endif

@endsection