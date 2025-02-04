
# Titulo del Proyecto

_Este sistema permite ingresar y gestionar información básica de los hoteles con los que cuenta la compañía, así como la asignación de tipos de habitaciones con validaciones específicas._

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

### Pre-requisitos 📋

_Para poder ejecutar este proyecto, necesitarás tener instalado:_

- **PHP** -  **composer** - **PostgreSQL**:
    PHP 7.4 o superior
    Composer - Gestor de dependencias para PHP
    MySQL o base de datos compatible

### Instalar PHP y Composer

  ```sh
  php -v
  ```

### Composer: Instala Composer desde  [https://getcomposer.org](getcomposer.org)

```sh
composer -v
```

### Instalación 🔧

1. Clona el repositorio:

   ```sh
   git clone https://github.com/joanOliveros/hotel-api.git
   cd hotel-api
   ```

2. Instala las dependencias:

   ```sh
   composer install
   ```

3. Realiza las migraciones para crear las tablas necesarias en la base de datos

   ```sh
   php artisan migrate
   ```

### Estructura de Archivos

```sh
/hotel-api
  /app                # Lógica de la aplicación (Controladores, Modelos, etc.)
  /database           # Migraciones, seeders, factories
  /public             # Archivos accesibles públicamente (index.php)
  /resources          # Vistas, archivos de lenguaje, archivos de assets
  /routes             # Rutas de la aplicación
  /storage            # Archivos generados (logs, caché, etc.)
  /tests              # Archivos de prueba
  .env                # Configuración de entorno
  composer.json       # Archivo de configuración de Composer
  README.md           # Este archivo
```

### Uso del Sistema 🏨

El sistema permite gestionar los hoteles y sus habitaciones siguiendo estas reglas:

1. Agregar un hotel: Se puede ingresar el nombre del hotel, su dirección, ciudad, y datos tributarios (NIT).

2. Asignar habitaciones:

    Los hoteles pueden tener tipos de habitación: Estándar, Junior, Suite.
    Los tipos de habitación tienen acomodaciones válidas:
    Estándar: Sencilla, Doble
    Junior: Triple, Cuádruple
    Suite: Sencilla, Doble, Triple

    ```sh
    Nombre: DECAMERON CARTAGENA
    Dirección: CALLE 23 58-25
    Ciudad: CARTAGENA
    NIT: 12345678-9
    Número de Habitaciones: 42
    Cantidad    Tipo Habitacion    Acomodación
    25          ESTÁNDAR           SENCILLA
    12          JUNIOR             TRIPLE
    5           ESTÁNDAR           DOBLE
    ```

3. Validaciones

    1. La cantidad de habitaciones configuradas no debe superar el máximo permitido por hotel.
    2. Los hoteles no deben ser duplicados.
    3. Los tipos de habitaciones y acomodaciones no deben repetirse para el mismo hotel.

### Ejecutando las pruebas ⚙️

Para ejecutar las pruebas automatizadas del sistema, puedes usar el siguiente comando:

```sh
php artisan test
```

### Despliegue 📦

Para desplegar el sistema en producción, realiza los siguientes pasos:

1. Asegúrate de tener la base de datos configurada.
2. Ejecuta las migraciones y el seed para poblar datos de ejemplo:

```sh
php artisan migrate --seed
```

3. Inicia el servidor de producción (usando un servidor web como Apache o Nginx) y asegúrate de que los archivos de configuración estén correctamente definidos.

### Construido con 🛠️

- **Laravel** - Framework PHP para aplicaciones web
- **PHP** - Lenguaje de programación para el backend
- **POSTGRESQL** - Base de datos relacional

### Versionado 📌

Uso de  [Github](https://github.com/) para el versionado. Para todas las versiones disponibles, consulta los [tags en este repositorio](https://github.com/joanOliveros/hotel-api/tags).

### Licencia 📄

Este proyecto esta bajo ninguna Licencia MIT

### Autores ✒️

- **Joan Sebastian Oliveros Diaz** - *Trabajo Inicial* - [joanOliveros](https://github.com/joanOliveros)
