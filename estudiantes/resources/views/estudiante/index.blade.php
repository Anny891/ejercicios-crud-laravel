<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mostrar Registro</title>
    </head>
    <body>
        <form method="post" action="/logout">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
        <h2>Estudiantes Registrados</h2>
        <a href="{{route('estudiante.create')}}">Registrar estudiante</a>

        @if(session('success'))
          <p>{{ session('success') }}</p>
        @endif
        <table border="3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>numero_cuenta</th>
                    <th>nombre</th>
                    <th>correo</th>
                    <th>fecha_nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($estudiante as $estudiantes)
                    <tr>
                        <td>{{$estudiantes->id}}</td>
                        <td>{{$estudiantes->numero_cuenta}}</td>
                        <td>{{$estudiantes->nombre}}</td>
                        <td>{{$estudiantes->correo}}</td>
                        <td>{{$estudiantes->fecha_nacimiento}}</td>
                        <td>
                            <a href="{{route('estudiante.edit', $estudiantes->id )}}">
                                Editar
                            </a>
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