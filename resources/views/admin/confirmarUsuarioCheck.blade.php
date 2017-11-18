@extends('layouts/adminLayout')
@section('title', 'Confirm User')
@section('conteudo_principal')
<div class="card-box">
    <div class="container-fluid">
        <div class="wrapper">
            <!-- FORMULARIO -->
            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>League Name</th>
                                                <th>WC</th>
                                                <th>Verified</th>
                                                <th>Select</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($usuarios as $usuario)
                                            <form method="post" action="{{route('checkUser')}}"  name="Edit_User_Email" class="form-create" id="enviar">
                                                {{ csrf_field()  }}
                                                <tr>
                                                    <td><img src="{{url($usuario->photo)}}" class="img-circle-admin-check" alt=""></td>
                                                    <td>{{$usuario->name}}</td>
                                                    <td>{{$usuario->email}}</td>
                                                    <td>{{$usuario->league_name}}</td>
                                                    <td>{{$usuario->wc}}</td>
                                                    @if($usuario->verified == 1)
                                                        <td>Yes</td>
                                                        <td><button class="btn btn-danger btn-block"  name="Submit" value="dar" type="Submit">Check</button></td>
                                                    @else
                                                        <td>No</td>
                                                        <td><button class="btn btn-danger btn-block"  name="Submit" value="dar" type="Submit">Check</button></td>
                                                    @endif
                                                    <input type="hidden" name="email" value="{{$usuario->email}}"/>
                                                </tr>
                                            </form>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>
</div>
@endsection 