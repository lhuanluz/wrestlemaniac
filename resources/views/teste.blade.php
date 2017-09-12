<div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Name
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="post" action="{{route('passR')}}"  name="Edit_User_Pass" class="form-create">       
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
                    <label>Old Pass</label>
                   <input type="password" name="oldPass" min = 6 class="form-control">                
                </div>   
                <div class="form-group">
                    <label>New Pass</label>
                   <input type="password" name="newPass" min = 6 class="form-control">                
                </div>            
                <!-- BOTÃO -->
                <br/>
                <button class="btn btn-primary btn-block btn-lg"  name="Submit" value="criar" type="Submit">Edit Pass</button>     

            </form>         
            <!-- FORMULARIO [FIM] -->
        </div>
    </div>

    @if(Session::has('message'))
<div class="alert-box success">
    {{ Session::get('message') }}
</div>
@endif