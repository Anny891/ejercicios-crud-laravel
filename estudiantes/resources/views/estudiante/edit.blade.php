<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Registro Estudiantes</title>
    </head>
    <body>
        <form method="post" action="{{route('estudiante.update', $estudiante->id)}}">
            @csrf
            @method('put')
            
            <label>numero_cuenta</label>
            <input type="text" name="numero_cuenta" id="numero_cuenta" value="{{old('numero_cuenta', $estudiante->numero_cuenta)}}" required>
            <br><br>
            <label>nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre', $estudiante->nombre)}}" required>

            <br><br>
            <label>correo</label>
            <input type="email" name="correo" id="correo" value="{{old('correo', $estudiante->correo)}}" required>
            
            <br><br>
            <label>Fecha Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nacimiento', $estudiante->fecha_nacimiento)}}" required>

            <button type="submit">Editar</button>
            <a href="{{route('estudiante.index')}}">Cancelar</a>
        </form>
    </body>
</html>