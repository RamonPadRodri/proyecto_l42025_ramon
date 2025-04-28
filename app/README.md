# Sistema de Gestión de Equipos de Fútbol

Este proyecto es una aplicación web desarrollada con Laravel para gestionar equipos de fútbol y jugadores asociados.

## Requisitos
- PHP 7.4 o superior
- Composer
- MySQL o cualquier otro sistema de bases de datos compatible con Laravel

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/RamonPadRodri/REPO_NAME.git
   ```

2. Navega a la carpeta del proyecto:
   ```bash
   cd REPO_NAME
   ```

3. Instala las dependencias:
   ```bash
   composer install
   ```

4. Crea el archivo `.env` copiando el archivo `.env.example`:
   ```bash
   cp .env.example .env
   ```

5. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

6. Configura la base de datos en el archivo `.env`.

7. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

8. Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

Ahora puedes acceder al sistema en `http://localhost:8000`.

## Funcionalidades
- Registro de usuarios
- Gestión de equipos de fútbol
- Gestión de jugadores
- Seguimiento de estadísticas


 AUTOR
- Ramón Andrés Padilla Rodríguez
