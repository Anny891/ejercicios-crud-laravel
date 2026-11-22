<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mascotas</title>
    </head>
    <body>
        <form method="post" action="/mascota">
            @csrf
            <label>codigo</label>
            <input type="text" id="codigo" name="codigo" value="{{old('codigo')}}" required>

            <br><br>
            <label>nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" required>

            <br><br>
            <label>especie</label>
            <select id="especie" name="especie" required>
                <option value="Perro" @selected(old('especie') == 'Perro')>Perro</option>
                <option value="Gato" @selected(old('especie') == 'Gato')>Gato</option>
                <option value="Otro" @selected(old('especie') == 'Otro')>Otro</option>
            </select>

            <br><br>
            <label>Propietario</label>
             <input type="text" id="propietario" name="propietario" value="{{old('propietario')}}" required>

             <br><br>
             <label>fecha_nacimiento</label>
             <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
             
             <button type="submit">Guardar</button>
             <a href="{{route('mascota.index')}}">Cancelar</a>
        </form>
    </body>
</html>