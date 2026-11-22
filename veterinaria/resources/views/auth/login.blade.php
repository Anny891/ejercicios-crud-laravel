<!DOCTYPE html>
<html lang="es">
    <thead>
        <meta charset="UTF-8">
        <title>Login</title>
    </thead>
    <body>
        <form method="post" action="/login">
            @csrf
            @error('usuario')
                <p>{{$message}}</p>
            @enderror
            <label>Usuario</label>
            <input type="text" id="usuario" name="usuario" required>
            <br><br>
            <label>Contraseña</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Ingresar</button>
        </form>
    </body>
</html>