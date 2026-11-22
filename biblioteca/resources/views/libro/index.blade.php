<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Libros</title>
    </head>
    <body>
        <h1>Mostrar Libros</h1>
        <form method="Post" action="{{route('logout')}}">
            @csrf
            <button type="submit">Cerrar sesion</button>
        </form>
        <h2>Registro Libros</h2>
        <a href="{{route('libro.create')}}">Registrar Libro</a>

        <table border="3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>anio_publicacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libro as $libros)
                <tr>
                    <td>{{$libros->id}}</td>
                     <td>{{$libros->codigo}}</td>
                     <td>{{$libros->titulo}}</td>
                     <td>{{$libros->autor}}</td>
                     <td>{{$libros->anio_publicacion}}</td>
                     <td>
                        <a href="{{route('libro.edit', $libros->id)}}">
                            Editar
                        </a>
                     </td>
                </tr>
                @empty 
                <tr>
                    <td>No se verifican datos</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </body>

</html>
