
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
                <a href="{{ URL::route('sEmail') }}" class="btn btn-primary"> Send E-mail </a>  
                </div>
                
                </center>
                    </div>
                </div>
        <div class="wrapper">           
        </div>
    </div>

    @if(Session::has('message'))
<div class="alert-box success">
    {{ Session::get('message') }}
</div>
@endif






<form class="form-horizontal">
<fieldset>

<br/>
<br/>
<center>
<p>
                Now input the code on the form bellow.
                </p>
                </center>
<!-- FORMULARIO -->
<form method="post" action="{{route('vEmail')}}"  name="changeEmail" class="form-create">       
{{ csrf_field()  }}
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="code">Code</label>  
  <div class="col-md-4">
  <input id="code" name="code" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newEmail">New E-Mail</label>  
  <div class="col-md-4">
  <input id="newEmail" name="newEmail" type="email" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Change Email</label>
  <div class="col-md-4">
  <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="submit">Change Email</button>
  </div>
</div>

</fieldset>
</form>

@endsection