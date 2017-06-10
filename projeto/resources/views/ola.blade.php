<html>
<body>
    <form action='/minha-pagina' method='post'>
         {{ csrf_field() }}

        <input type='text' name='nome'>
        <input type='password' name='senha' placehold='senha'>
        <input type='submit' value='enviar'/>
    </form>
</body>
</html>
