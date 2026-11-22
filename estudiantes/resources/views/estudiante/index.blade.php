<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mostrar Registro</title>
    </head>
    <body>
        <form method="post" action="/logout">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
    </body>
</html>