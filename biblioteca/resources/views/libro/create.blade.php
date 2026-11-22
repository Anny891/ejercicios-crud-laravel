<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Libros</title>
    </head>
    <body>
        <form method="post" action="/libro">
            @csrf
            <label>Codigo</label>
            <input type="text" name="codigo" id="codigo" value="{{old('codigo')}}" required>
            <br><br>
            <label>Titulo</label>
            <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}" required>
            <br><br>
            <label>Autor</label>
            <input type="text" name="autor" id="autor" value="{{old('autor')}}" required>
            <br><br>
            <label>anio_publicacion </label>
            <input type="number" name="anio_publicacion" id="anio_publicacion" value="{{old('anio_publicacion')}}" required>

            <button type="submit">Guardar</button>
            <a href="{{route('libro.index')}}">Cancelar</a>
        </form>
    </body>
</html>