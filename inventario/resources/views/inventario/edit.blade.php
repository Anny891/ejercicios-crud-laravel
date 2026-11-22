<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inventario</title>
    </head>
    <body>
        <form method="post" action="{{route('inventario.update', $inventario->id)}}">
            @csrf
            @method('Put')
            <label>Codigo</label>
            <input type="text" id="codigo" name="codigo" value="{{old('codigo', $inventario->codigo)}}" required>
            <br><br>
            <label>Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $inventario->nombre) }}" required>
            <br><br>

            <label>Precio</label>
            <input type="number" id="precio" name="precio" step="0.01" min="0" value="{{ old('precio', $inventario->precio) }}" required>
            <br><br>

            <label>Existencias</label>
            <input type="number" id="existencias" name="existencias" min="0" step="1" value="{{ old('existencias', $inventario->existencias) }}" required>
            <br><br>

            <button type="submit">Editar</button>
            <a href="{{route('inventario.index')}}">Cancelar</a>
        </form>
    </body>
</html>