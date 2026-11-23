<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Tarea</title>
    </head>
    <body>
        <form method="post" action="{{route('tarea.update', $tarea->id)}}">
            @csrf
            @method('Put')
            <label>titulo</label>
            <input type="text" name="titulo" id="titulo" value="{{old('titulo',$tarea->titulo)}}" required>

            <br><br>
            <label>descripcion</label>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion', $tarea->descripcion)}}" required>

            <br><br>
            <label>responsable</label>
            <input type="text" name="responsable" id="responsable" value="{{old('responsable', $tarea->responsable)}}" required>

            <br><br>
            <label>fecha_limite</label>
            <input type="date" name="fecha_limite" id="fecha_limite" value="{{old('fecha_limite', $tarea->fecha_limite)}}" required>

            <br><br>
            <label>estado</label>
            <select id="estado" name="estado" required>
                <option value="pendiente" @selected(old('estado',$tarea->estado) == 'pendiente')>pendiente</option>
                <option value="proceso" @selected(old('estado',$tarea->estado) == 'proceso')>proceso</option>
                <option value="completada" @selected(old('estado',$tarea->estado) == 'completada')>completada</option>
            </select>

            <button type="submit">Editar</button>
            <a href="{{route('tarea.index')}}">Cancelar</a>
        </form>
    </body>
</html>