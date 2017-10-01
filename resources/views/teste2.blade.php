<div class="container-fluid">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Email
                        </h1>
                    </div>
                </div>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form method="post" action="{{route('sendChangeEmail')}}"  name="Edit" class="form-create">       
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
                <div class="form-group">
                    <label>New E-mail</label>
                   <input type="email" name="newEmail"  class="form-control">                
                </div>            
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