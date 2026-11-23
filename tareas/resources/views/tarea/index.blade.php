<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mostrar</title>
    </head>
    <body>
        
        <form method="post" action="/logout">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
        <h1>Mostrar Registros Tareas</h1>

        <table border="3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Responsable</th>
                    <th>fecha_limite</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tarea as $tareas)
                    <tr>
                        <td>{{$tareas->id}}</td>
                        <td>{{$tareas->titulo}}</td>
                        <td>{{$tareas->descripcion}}</td>
                        <td>{{$tareas->responsable}}</td>
                        <td>{{$tareas->fecha_limite}}</td>
                        <td>{{$tareas->estado}}</td>
                    </tr>
                @empty
                    <td>
                        <p>No hay datos registrados</p>
                    </td>
                @endforelse
            </tbody>
        </table>
    </body>
</html>