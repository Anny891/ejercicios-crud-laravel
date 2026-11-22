<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inventario</title>
    </head>
    <body>
        <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
    </body>
</html>