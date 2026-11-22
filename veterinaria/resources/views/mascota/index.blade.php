<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mascotas</title>
    </head>
    <body>
        <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
        <h1>Mostrar registros</h1>

        <a href="{{route('mascota.create')}}">Registrar Mascota</a>

        @if (session('success'))
            <p>{{session('success')}}</p>
        @endif
        <table border="3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Propietario</th>
                    <th>Fecha_Nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mascota as $mascotas)
                    <tr>
                        <td>{{$mascotas->id}}</td>
                        <td>{{$mascotas->codigo}}</td>
                        <td>{{$mascotas->nombre}}</td>
                        <td>{{$mascotas->especie}}</td>
                        <td>{{$mascotas->propietario}}</td>
                        <td>{{$mascotas->fecha_nacimiento}}</td>
                        <td>
                            <a href="{{route('mascota.edit', $mascotas->id)}}">Editar</a>
                            <form method="post" action="{{route('mascota.destroy', $mascotas->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('¿Quieres eliminarlo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <p>No hay datos</p>
                        </tr>
                
            @endforelse
            </tbody>
        </table>
    </body>
</html>