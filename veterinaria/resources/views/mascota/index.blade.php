<!DOCTYPE html>
<html lang="es">
    <thead>
        <meta charset="UTF-8">
        <title>Mascotas</title>
    </thead>
    <body>
        <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
        <h1>Mostrar registros</h1>

        <a href="{{route('mascota.create')}}">Registrar Mascota</a>
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
                @forelse ($mascota as $mascota)
                    <tr>
                        <td>{{$mascota->id}}</td>
                        <td>{{$mascota->codigo}}</td>
                        <td>{{$mascota->nombre}}</td>
                        <td>{{$mascota->especie}}</td>
                        <td>{{$mascota->propietario}}</td>
                        <td>{{$mascota->fecha_nacimiento}}</td>
                    </tr>
                    @empty
                        <td>
                            <p>No hay datos</p>
                        </td>
                
            @endforelse
            </tbody>
        </table>
    </body>
</html>