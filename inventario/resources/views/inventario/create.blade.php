<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inventario</title>
    </head>
    <body>
        <form method="post" action="/inventario">
            @csrf
            <label>Codigo</label>
            <input type="text" id="codigo" name="codigo" value="{{old('codigo')}}" required>
            <br><br>
            <label>Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            <br><br>

            <label>Precio</label>
            <input type="number" id="precio" name="precio" step="0.01" min="0" value="{{ old('precio') }}" required>
            <br><br>

            <label>Existencias</label>
            <input type="number" id="existencias" name="existencias" min="0" step="1" value="{{ old('existencias') }}" required>
            <br><br>

            <button type="submit">Guardar</button>
            <a href="{{route('inventario.index')}}">Cancelar</a>
        </form>
    </body>
</html>