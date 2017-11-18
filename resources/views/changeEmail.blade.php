
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Change Email
                        </h1>
                        <br/>
                <center>
                <p>
                Click the button bellow to get an e-mail with the confirmation code.
                </p>
                <div class="col-lg-12">                  
                <a href="{{route('sEmail') }}" class="btn btn-primary"> Send E-mail </a>  
                <br><br>
                </div>
                
                </center>
                    </div>
                </div>
    </div>

    @if(Session::has('message'))
<div class="alert-box success">
    {{ Session::get('message') }}
</div>
@endif



@endsection