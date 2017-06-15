<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ url('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @foreach($superstars as $superstar){
            <img src="{{url($superstar->image)}}">
        }
        @endforeach
    </body>
</html>