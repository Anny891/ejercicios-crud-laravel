<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <form method="post" action="/login">
            @csrf
            <label>Usuario</label>
            <input type="text" id="usuario" name="usuario" required>
            <br><br>
            <label>Contraseña</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Ingresar</button>
        </form>
    </body>
</html>