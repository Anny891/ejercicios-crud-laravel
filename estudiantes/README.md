# Estudiantes

Sistema para mantener un registro de estudiantes. Guarda el número de cuenta, el nombre, el correo y la fecha de nacimiento de cada estudiante.

## Funcionalidades

- **Iniciar sesión.** El formulario de `/login` solicita el usuario y la contraseña. Si las credenciales son correctas, el sistema abre el listado en `/estudiante`.
- **Cerrar sesión.** El botón del listado finaliza la sesión y devuelve al formulario de acceso.
- **Mostrar.** Consultar el listado de estudiantes y sus datos de registro.
- **Crear.** Inscribir a un estudiante con sus cuatro datos de registro.
- **Editar.** Actualizar los datos del estudiante seleccionado.
- **Eliminar.** Borrar un registro estudiantil del listado.

## Requisitos de instalación

- PHP 8.2 o una versión posterior de la serie 8, con la extensión `pdo_mysql` habilitada.
- Composer para instalar las dependencias de Laravel y Faker.
- MySQL en ejecución y una cuenta con permisos para crear tablas, consultar y modificar registros en la base de datos del proyecto.
- Git, si vas a clonar el repositorio.

## Instalación y ejecución

Si todavía no tenés el repositorio, clonalo y entrá a la carpeta de Estudiantes.

```powershell
git clone https://github.com/Anny891/ejercicios-crud-laravel.git
cd ejercicios-crud-laravel/estudiantes
```

Desde esa carpeta, instalá las dependencias, creá el archivo local `.env` a partir de la plantilla y generá la clave de la aplicación. Si ya tenés un `.env`, conservá el archivo y su clave.

```powershell
composer install
if (-not (Test-Path .env)) {
    Copy-Item .env.example .env
    php artisan key:generate
}
```

Configurá MySQL como se indica abajo y ejecutá estos comandos una vez sobre la base de datos vacía. Dejá la terminal abierta mientras usás la aplicación.

```powershell
php artisan migrate
php artisan db:seed --class=EstudianteSeeder
php artisan db:seed --class=UsuarioSeeder
php artisan serve
```

Abrí `http://127.0.0.1:8000/`. La página inicial redirige a `/login`.

## Configuración de MySQL

Creá una base de datos vacía en MySQL. Podés usar `estudiantes` como nombre para este proyecto. En `.env`, cambiá la conexión predeterminada de SQLite a MySQL y completá las variables con los datos de tu instalación.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=estudiantes
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD="tu_contraseña_mysql"
```

Reemplazá los valores de ejemplo por los de tu cuenta local y guardá las credenciales privadas únicamente en `.env`. Los datos de acceso a MySQL son independientes de las credenciales de práctica de la aplicación.

## Migraciones

La migración del proyecto crea la tabla `estudiantes` con la clave primaria `id`, las marcas de tiempo `created_at` y `updated_at` y los siguientes campos.

| Campo | Tipo y restricciones en la tabla |
| --- | --- |
| `numero_cuenta` | Texto, único |
| `nombre` | Texto de hasta 100 caracteres |
| `correo` | Texto, único |
| `fecha_nacimiento` | Fecha |

Las migraciones también crean la tabla `users` para las cuentas de acceso y le agregan la columna única `usuario`.

## Factory

`EstudianteFactory` usa Faker para preparar los datos de prueba. Genera un número de cuenta único de tres dígitos, un nombre ficticio, un correo de prueba único y una fecha de nacimiento con formato `AAAA-MM-DD` cuyo límite máximo es 18 años antes de la fecha de generación.

## Seeders

- `EstudianteSeeder` usa `EstudianteFactory` para insertar diez estudiantes ficticios en la tabla `estudiantes`.
- `UsuarioSeeder` crea la cuenta de práctica `admin` en `users` y guarda la contraseña como un hash.

Ejecutá ambos seeders por separado con los comandos de instalación. El `DatabaseSeeder` predeterminado no los invoca.

## Validaciones

Todos los campos de la tabla siguiente son obligatorios al crear y al editar.

| Campo | Regla aplicada por el controlador |
| --- | --- |
| `numero_cuenta` | Texto único en el registro de estudiantes. |
| `nombre` | Texto de hasta 100 caracteres. |
| `correo` | Dirección de correo válida y única en el registro. |
| `fecha_nacimiento` | Fecha válida. |

Al editar, las comprobaciones de unicidad del número de cuenta y del correo excluyen al estudiante que se está actualizando.

Para iniciar sesión, el usuario es obligatorio y debe ser texto. La contraseña también es obligatoria.

## Credenciales de práctica

| Dato | Valor |
| --- | --- |
| Usuario | `admin` |
| Contraseña | `12345678` |

## Tecnologías utilizadas

- Laravel 12 y PHP para las rutas, la autenticación y la lógica de la aplicación.
- MySQL para guardar las cuentas y los registros del proyecto.
- Blade para las vistas del listado y los formularios.
- Eloquent ORM para consultar y modificar los registros.
- Faker para generar los datos de prueba.

## Limitaciones de la implementación

- El inicio y el cierre de sesión están implementados. Falta aplicar el middleware `auth` a las rutas del CRUD de estudiantes para que el acceso dependa de una sesión activa.
