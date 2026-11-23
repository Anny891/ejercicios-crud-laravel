# Tareas

Sistema para organizar tareas según su responsable, fecha límite y estado. Cada registro incluye un título y una descripción del trabajo por realizar.

## Funcionalidades

- **Iniciar sesión.** El formulario de `/login` solicita el usuario y la contraseña. Si las credenciales son correctas, el sistema abre el listado en `/tarea`.
- **Cerrar sesión.** El botón del listado finaliza la sesión y devuelve al formulario de acceso.
- **Mostrar.** Consultar el listado con la descripción, el responsable, la fecha límite y el estado de cada tarea.
- **Crear.** Registrar una tarea y asignarle un responsable, una fecha límite y un estado.
- **Editar.** Actualizar la información de una tarea o cambiar su estado a medida que avanza.
- **Eliminar.** Eliminar una tarea del listado.

## Requisitos de instalación

- PHP 8.2 o una versión posterior de la serie 8, con la extensión `pdo_mysql` habilitada.
- Composer para instalar las dependencias de Laravel y Faker.
- MySQL en ejecución y una cuenta con permisos para crear tablas, consultar y modificar registros en la base de datos del proyecto.
- Git, si vas a clonar el repositorio.

## Instalación y ejecución

Si todavía no tenés el repositorio, clonalo y entrá a la carpeta de Tareas.

```powershell
git clone https://github.com/Anny891/ejercicios-crud-laravel.git
cd ejercicios-crud-laravel/tareas
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
php artisan db:seed --class=TareaSeeder
php artisan db:seed --class=UsuarioSeeder
php artisan serve
```

Con el servidor en ejecución, abrí `http://127.0.0.1:8000/login`.

## Configuración de MySQL

Creá una base de datos vacía en MySQL. Podés usar `tareas` como nombre para este proyecto. En `.env`, cambiá la conexión predeterminada de SQLite a MySQL y completá las variables con los datos de tu instalación.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tareas
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD="tu_contraseña_mysql"
```

Reemplazá los valores de ejemplo por los de tu cuenta local y guardá las credenciales privadas únicamente en `.env`. Los datos de acceso a MySQL son independientes de las credenciales de práctica de la aplicación.

## Migraciones

La migración del proyecto crea la tabla `tareas` con la clave primaria `id`, las marcas de tiempo `created_at` y `updated_at` y los siguientes campos.

| Campo | Tipo y restricciones en la tabla |
| --- | --- |
| `titulo` | Texto de hasta 150 caracteres |
| `descripcion` | Texto de hasta 500 caracteres |
| `responsable` | Texto de hasta 100 caracteres |
| `fecha_limite` | Fecha |
| `estado` | Texto |

Las migraciones también crean la tabla `users` para las cuentas de acceso y le agregan la columna única `usuario`.

## Factory

`TareaFactory` usa Faker para preparar los datos de prueba. Genera títulos de tres palabras, descripciones de una oración, nombres de responsables, fechas límite aleatorias y estados elegidos entre `pendiente`, `proceso` y `completada`.

## Seeders

- `TareaSeeder` usa `TareaFactory` para insertar diez tareas ficticios en la tabla `tareas`.
- `UsuarioSeeder` crea la cuenta de práctica `admin` en `users` y guarda la contraseña como un hash.

Ejecutá ambos seeders por separado con los comandos de instalación. El `DatabaseSeeder` predeterminado no los invoca.

## Validaciones

Todos los campos de la tabla siguiente son obligatorios al crear y al editar.

| Campo | Regla aplicada por el controlador |
| --- | --- |
| `titulo` | Texto de hasta 150 caracteres. |
| `descripcion` | Texto de hasta 500 caracteres. |
| `responsable` | Texto de hasta 100 caracteres. |
| `fecha_limite` | Fecha válida. |
| `estado` | Valores permitidos `pendiente`, `proceso` o `completada`. |

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

- La protección con `auth` cubre el listado, los formularios de creación y edición y la actualización. Falta aplicarla a las rutas que guardan nuevas tareas y eliminan registros.
