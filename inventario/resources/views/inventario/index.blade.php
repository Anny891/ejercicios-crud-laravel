<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inventario</title>
    </head>
    <body>
        <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>

        <h1>Mostrar Inventario</h1>
        <br><br>
        <a href="{{route('inventario.create')}}">Registrar Producto</a>
        <table border="3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inventario as $inventarios)
                <tr>
                    <td>{{$inventarios->id}}</td>
                    <td>{{$inventarios->codigo}}</td>
                    <td>{{$inventarios->nombre}}</td>
                    <td>{{$inventarios->precio}}</td>
                    <td>{{$inventarios->existencias}}</td>
                    <td>
                        <a href="{{route('inventario.edit',$inventarios->id )}}">Editar</a>

                        <form method="post" action="{{route('inventario.destroy',$inventarios->id )}}">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('¿Deseas Eliminar este dato?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No hay datos</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </body>
</html>