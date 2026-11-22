<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Libros</title>
    </head>
    <body>
        <form method="Post" action="{{route('libro.update', $libro->id)}}">
            @csrf
            @method('Put')

            <label>Codigo</label>
            <input type="text" name="codigo" id="codigo" value="{{old('codigo', $libro->codigo)}}" required>
            <br><br>
            <label>Titulo</label>
            <input type="text" name="titulo" id="titulo" value="{{old('titulo', $libro->titulo)}}" required>
            <br><br>
            <label>Autor</label>
            <input type="text" name="autor" id="autor" value="{{old('autor', $libro->autor)}}" required>
            <br><br>
            <label>anio_publicacion </label>
            <input type="number" name="anio_publicacion" id="anio_publicacion" value="{{old('anio_publicacion', $libro->anio_publicacion)}}" required>

            <button type="submit">Editar</button>
            <a href="{{route('libro.index')}}">Cancelar</a>
        </form>
    </body>
</html>