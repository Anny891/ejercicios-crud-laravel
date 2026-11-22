<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mascotas Editar</title>
    </head>
    <body>
        <form method="post" action="{{route('mascota.update', $mascota->id)}}">
            @csrf
            @method('put')
            <label>codigo</label>
            <input type="text" id="codigo" name="codigo" value="{{old('codigo', $mascota->codigo)}}" required>

            <br><br>
            <label>nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{old('nombre', $mascota->nombre)}}" required>

            <br><br>
            <label>especie</label>
            <select id="especie" name="especie" required>
                <option value="Perro" @selected(old('especie', $mascota->especie) == 'Perro')>Perro</option>
                <option value="Gato" @selected(old('especie', $mascota->especie) == 'Gato')>Gato</option>
                <option value="Otro" @selected(old('especie', $mascota->especie) == 'Otro')>Otro</option>
            </select>

            <br><br>
            <label>Propietario</label>
             <input type="text" id="propietario" name="propietario" value="{{old('propietario', $mascota->propietario)}}" required>

             <br><br>
             <label>fecha_nacimiento</label>
             <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento', $mascota->fecha_nacimiento)}}" required>
             
             <button type="submit">Editar</button>
             <a href="{{route('mascota.index')}}">Cancelar</a>
        </form>
    </body>
</html>