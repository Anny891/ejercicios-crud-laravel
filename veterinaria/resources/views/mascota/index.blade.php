<!DOCTYPE html>
<html lang="es">
    <thead>
        <meta charset="UTF-8">
        <title>Mascotas</title>
    </thead>
    <body>
        <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
    </body>
</html>