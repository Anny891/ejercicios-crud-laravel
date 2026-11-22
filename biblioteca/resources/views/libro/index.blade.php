<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Mostrar Libros</h1>
        <form method="Post" action="{{route('logout')}}">
            @csrf
            <button type="submit">Cerrar sesion</button>
        </form>
    </body>

</html>
