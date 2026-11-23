<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        
        <form method="post" action="/logout">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
        <h1>Mostrar Registros Tareas</h1>
    </body>
</html>