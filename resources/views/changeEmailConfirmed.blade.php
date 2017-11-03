
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
<br/>
<br/>
<center>
<p>
                Now input the code on the form bellow.
                </p>
                </center>
<!-- FORMULARIO -->
@if(Session::has('message'))
<div class="alert-box success">
    {{ Session::get('message') }}
</div>
@endif
<form method="post" action="{{route('vEmail')}}"  name="" class="form-create form-horizontal">      
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
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
  <input id="newEmail" name="email" type="email" placeholder="" class="form-control input-md" required="">
    
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

</form>

@endsection