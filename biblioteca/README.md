# Biblioteca

Sistema para llevar el catálogo de una biblioteca. Cada libro se identifica por un código y se registra con su título, autor y año de publicación.

## Funcionalidades

- **Iniciar sesión.** El formulario de `/login` solicita el usuario y la contraseña. Si las credenciales son correctas, el sistema abre el listado en `/libro`.
- **Cerrar sesión.** El botón del listado finaliza la sesión y devuelve al formulario de acceso.
- **Mostrar.** Consultar el catálogo y ver los datos de cada libro en la tabla.
- **Crear.** Registrar un libro con su código, título, autor y año de publicación.
- **Editar.** Corregir los datos de un libro existente.
- **Eliminar.** Quitar un libro del catálogo.

## Requisitos de instalación

- PHP 8.2 o una versión posterior de la serie 8, con la extensión `pdo_mysql` habilitada.
- Composer para instalar las dependencias de Laravel y Faker.
- MySQL en ejecución y una cuenta con permisos para crear tablas, consultar y modificar registros en la base de datos del proyecto.
- Git, si vas a clonar el repositorio.

## Instalación y ejecución

Si todavía no tenés el repositorio, clonalo y entrá a la carpeta de Biblioteca.

```powershell
git clone https://github.com/Anny891/ejercicios-crud-laravel.git
cd ejercicios-crud-laravel/biblioteca
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
php artisan db:seed --class=LibroSeeder
php artisan db:seed --class=UsuarioSeeder
php artisan serve
```

Con el servidor en ejecución, abrí `http://127.0.0.1:8000/login`.

## Configuración de MySQL

Creá una base de datos vacía en MySQL. Podés usar `biblioteca` como nombre para este proyecto. En `.env`, cambiá la conexión predeterminada de SQLite a MySQL y completá las variables con los datos de tu instalación.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD="tu_contraseña_mysql"
```

Reemplazá los valores de ejemplo por los de tu cuenta local y guardá las credenciales privadas únicamente en `.env`. Los datos de acceso a MySQL son independientes de las credenciales de práctica de la aplicación.

## Migraciones

La migración del proyecto crea la tabla `libros` con la clave primaria `id`, las marcas de tiempo `created_at` y `updated_at` y los siguientes campos.

| Campo | Tipo y restricciones en la tabla |
| --- | --- |
| `codigo` | Texto, único |
| `titulo` | Texto de hasta 150 caracteres |
| `autor` | Texto de hasta 100 caracteres |
| `anio_publicacion` | Entero |

Las migraciones también crean la tabla `users` para las cuentas de acceso y le agregan la columna única `usuario`.

## Factory

`LibroFactory` usa Faker para preparar los datos de prueba. Genera un código único con el prefijo `LIB-` seguido de ocho dígitos, un título de cuatro palabras, un nombre de autor y un año entre 1450 y 2026.

## Seeders

- `LibroSeeder` usa `LibroFactory` para insertar diez libros ficticios en la tabla `libros`.
- `UsuarioSeeder` crea la cuenta de práctica `admin` en `users` y guarda la contraseña como un hash.

Ejecutá ambos seeders por separado con los comandos de instalación. El `DatabaseSeeder` predeterminado no los invoca.

## Validaciones

Todos los campos de la tabla siguiente son obligatorios al crear y al editar.

| Campo | Regla aplicada por el controlador |
| --- | --- |
| `codigo` | Texto único en el catálogo. |
| `titulo` | Texto de hasta 150 caracteres. |
| `autor` | Texto de hasta 100 caracteres. |
| `anio_publicacion` | Entero entre 1450 y 2026, inclusive. |

Al editar, la comprobación de unicidad del código excluye el libro que se está actualizando.

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

- La protección con `auth` cubre el listado y los formularios de creación y edición. Falta aplicarla a las rutas que guardan, actualizan y eliminan libros.
