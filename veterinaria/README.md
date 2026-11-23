# Veterinaria

Sistema para llevar un registro de las mascotas de una veterinaria. Permite identificar a cada animal por su código y consultar su especie, propietario y fecha de nacimiento.

## Funcionalidades

- **Iniciar sesión.** El formulario de `/login` solicita el usuario y la contraseña. Si las credenciales son correctas, el sistema abre el listado en `/mascota`.
- **Cerrar sesión.** El botón del listado finaliza la sesión y devuelve al formulario de acceso.
- **Mostrar.** Consultar la ficha básica de cada mascota en el listado.
- **Crear.** Registrar una mascota con su código, nombre, especie, propietario y fecha de nacimiento.
- **Editar.** Actualizar los datos de identificación o del propietario de una mascota existente.
- **Eliminar.** Eliminar del listado el registro de una mascota.

## Requisitos de instalación

- PHP 8.2 o una versión posterior de la serie 8, con la extensión `pdo_mysql` habilitada.
- Composer para instalar las dependencias de Laravel y Faker.
- MySQL en ejecución y una cuenta con permisos para crear tablas, consultar y modificar registros en la base de datos del proyecto.
- Git, si vas a clonar el repositorio.

## Instalación y ejecución

Si todavía no tenés el repositorio, clonalo y entrá a la carpeta de Veterinaria.

```powershell
git clone https://github.com/Anny891/ejercicios-crud-laravel.git
cd ejercicios-crud-laravel/veterinaria
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
php artisan db:seed --class=MascotaSeeder
php artisan db:seed --class=UsuarioSeeder
php artisan serve
```

Abrí `http://127.0.0.1:8000/`. La página inicial redirige a `/login`.

## Configuración de MySQL

Creá una base de datos vacía en MySQL. Podés usar `veterinaria` como nombre para este proyecto. En `.env`, cambiá la conexión predeterminada de SQLite a MySQL y completá las variables con los datos de tu instalación.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=veterinaria
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD="tu_contraseña_mysql"
```

Reemplazá los valores de ejemplo por los de tu cuenta local y guardá las credenciales privadas únicamente en `.env`. Los datos de acceso a MySQL son independientes de las credenciales de práctica de la aplicación.

## Migraciones

La migración del proyecto crea la tabla `mascotas` con la clave primaria `id`, las marcas de tiempo `created_at` y `updated_at` y los siguientes campos.

| Campo | Tipo y restricciones en la tabla |
| --- | --- |
| `codigo` | Texto, único |
| `nombre` | Texto de hasta 100 caracteres |
| `especie` | Texto |
| `propietario` | Texto de hasta 100 caracteres |
| `fecha_nacimiento` | Fecha |

Las migraciones también crean la tabla `users` para las cuentas de acceso y le agregan la columna única `usuario`.

## Factory

`MascotaFactory` usa Faker para preparar los datos de prueba. Genera un código único de tres dígitos, un nombre ficticio para la mascota, un nombre de propietario, una fecha de nacimiento y una especie elegida entre `gato`, `perro` y `ave`.

## Seeders

- `MascotaSeeder` usa `MascotaFactory` para insertar diez mascotas ficticios en la tabla `mascotas`.
- `UsuarioSeeder` crea la cuenta de práctica `admin` en `users` y guarda la contraseña como un hash.

Ejecutá ambos seeders por separado con los comandos de instalación. El `DatabaseSeeder` predeterminado no los invoca.

## Validaciones

Todos los campos de la tabla siguiente son obligatorios al crear y al editar.

| Campo | Regla aplicada por el controlador |
| --- | --- |
| `codigo` | Texto único en el registro de mascotas. |
| `nombre` | Texto de hasta 80 caracteres. |
| `especie` | Valores permitidos `Perro`, `Gato` u `Otro`. |
| `propietario` | Texto de hasta 100 caracteres. |
| `fecha_nacimiento` | Fecha válida y anterior a mañana. Se admite la fecha de hoy. |

Al editar, la comprobación de unicidad del código excluye la mascota que se está actualizando.

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

- La factory guarda `gato`, `perro` o `ave`, mientras que los formularios y el controlador aceptan `Perro`, `Gato` u `Otro`. Al editar un registro generado, hay que seleccionar la especie válida que corresponda.
- La protección con `auth` cubre el listado. Falta aplicarla a las rutas de los formularios y a las operaciones que guardan, actualizan y eliminan mascotas.
