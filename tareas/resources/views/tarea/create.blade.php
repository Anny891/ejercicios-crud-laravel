<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Crear</title>
    </head>
    <body>
        <form method="post" action="/tarea">
            @csrf
            <label>titulo</label>
            <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}" required>

            <br><br>
            <label>descripcion</label>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}" required>

            <br><br>
            <label>responsable</label>
            <input type="text" name="responsable" id="responsable" value="{{old('responsable')}}" required>

            <br><br>
            <label>fecha_limite</label>
            <input type="date" name="fecha_limite" id="fecha_limite" value="{{old('fecha_limite')}}" required>

            <br><br>
            <label>estado</label>
            <select id="estado" name="estado" required>
                <option value="pendiente" @selected(old('estado') == 'pendiente')>pendiente</option>
                <option value="proceso" @selected(old('estado') == 'proceso')>proceso</option>
                <option value="completada" @selected(old('estado') == 'completada')>completada</option>
            </select>

            <button type="submit">Guardar</button>
            <a href="{{route('tarea.index')}}">Cancelar</a>
        </form>
    </body>
</html>