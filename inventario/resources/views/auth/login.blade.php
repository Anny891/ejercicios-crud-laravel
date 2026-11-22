<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form method="post" action="/login">
            @csrf
            @error('usuario')
             <p>{{$message}}</p>
            @enderror
            <label>Usuario</label>
            <input type="text" name="usuario" id="usuario" required>
            <br><br>
            <label>Contraseña</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Ingresar</button>
        </form>
    </body>

</html>