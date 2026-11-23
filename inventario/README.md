# Inventario

Sistema para registrar productos y consultar su disponibilidad. Por cada producto se guardan su código, nombre, precio y cantidad de unidades en existencia.

## Funcionalidades

- **Iniciar sesión.** El controlador valida el usuario y la contraseña y dirige al listado `/inventario` cuando las credenciales son correctas. El acceso al formulario presenta la limitación indicada al final.
- **Cerrar sesión.** El botón del listado finaliza la sesión y devuelve al formulario de acceso.
- **Mostrar.** Consultar los productos y sus precios y existencias en `/inventario`.
- **Crear.** Agregar un producto con su código, nombre, precio y existencias.
- **Editar.** Actualizar los datos de un producto, incluido su precio o la cantidad disponible.
- **Eliminar.** Retirar un producto del inventario.

## Requisitos de instalación

- PHP 8.2 o una versión posterior de la serie 8, con la extensión `pdo_mysql` habilitada.
- Composer para instalar las dependencias de Laravel y Faker.
- MySQL en ejecución y una cuenta con permisos para crear tablas, consultar y modificar registros en la base de datos del proyecto.
- Git, si vas a clonar el repositorio.

## Instalación y ejecución

Si todavía no tenés el repositorio, clonalo y entrá a la carpeta de Inventario.

```powershell
git clone https://github.com/Anny891/ejercicios-crud-laravel.git
cd ejercicios-crud-laravel/inventario
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
php artisan db:seed --class=InventarioSeeder
php artisan db:seed --class=UsuarioSeeder
php artisan serve
```

La página de bienvenida está en `http://127.0.0.1:8000/`. El formulario de acceso está en `/login` y el listado está en `/inventario`. La sección de limitaciones explica por qué el acceso de un visitante queda bloqueado.

## Configuración de MySQL

Creá una base de datos vacía en MySQL. Podés usar `inventario` como nombre para este proyecto. En `.env`, cambiá la conexión predeterminada de SQLite a MySQL y completá las variables con los datos de tu instalación.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventario
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD="tu_contraseña_mysql"
```

Reemplazá los valores de ejemplo por los de tu cuenta local y guardá las credenciales privadas únicamente en `.env`. Los datos de acceso a MySQL son independientes de las credenciales de práctica de la aplicación.

## Migraciones

La migración del proyecto crea la tabla `inventarios` con la clave primaria `id`, las marcas de tiempo `created_at` y `updated_at` y los siguientes campos.

| Campo | Tipo y restricciones en la tabla |
| --- | --- |
| `codigo` | Texto, único |
| `nombre` | Texto de hasta 100 caracteres |
| `precio` | Decimal `DECIMAL(10,2)` |
| `existencias` | Entero |

Las migraciones también crean la tabla `users` para las cuentas de acceso y le agregan la columna única `usuario`.

## Factory

`InventarioFactory` usa Faker para preparar los datos de prueba. Genera un código único de tres dígitos, un nombre de tres palabras, un precio entre 10 y 5000 con hasta dos decimales y una cantidad entera de 0 a 100 unidades.

## Seeders

- `InventarioSeeder` usa `InventarioFactory` para insertar diez productos ficticios en la tabla `inventarios`.
- `UsuarioSeeder` crea la cuenta de práctica `admin` en `users` y guarda la contraseña como un hash.

Ejecutá ambos seeders por separado con los comandos de instalación. El `DatabaseSeeder` predeterminado no los invoca.

## Validaciones

Todos los campos de la tabla siguiente son obligatorios al crear y al editar.

| Campo | Regla aplicada por el controlador |
| --- | --- |
| `codigo` | Texto único en el inventario. |
| `nombre` | Texto de hasta 100 caracteres. |
| `precio` | Número igual o mayor que cero. |
| `existencias` | Entero igual o mayor que cero. |

Al editar, la comprobación de unicidad del código excluye el producto que se está actualizando.

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

- El formulario `GET /login` tiene el middleware `auth`. Un visitante sin sesión es redirigido al mismo formulario, lo que impide iniciar sesión desde el navegador por el flujo normal.
- La protección con `auth` cubre el listado, el formulario de creación y la eliminación. Falta aplicarla a las rutas que guardan productos, muestran el formulario de edición y actualizan los datos.
