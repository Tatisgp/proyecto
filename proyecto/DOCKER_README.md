# Docker Setup para Laravel

Este proyecto está dockerizado con PHP 8.2, MySQL 8, Nginx y phpMyAdmin.

## Requisitos
- Docker
- Docker Compose

## Instalación y Uso

### 1. Copiar archivo .env
```bash
cp .env.example .env
```

### 2. Construir y levantar los contenedores
```bash
docker-compose up -d --build
```

### 3. Fijar permisos de directorios
```bash
docker-compose exec app chmod -R 777 storage bootstrap/cache
```

### 4. Generar la aplicación key
```bash
docker-compose exec app php artisan key:generate
```

### 5. Ejecutar migraciones
```bash
docker-compose exec app php artisan migrate
```

### 6. Acceder a la aplicación
- **Website**: http://localhost
- **phpMyAdmin**: http://localhost:8080
  - Usuario: `root`
  - Password: `root123`
- **MySQL directo**: localhost:3306
  - Usuario: `root`
  - Password: `root123`
  - Base de datos: `laravel`

## Comandos útiles

### Ver logs
```bash
docker-compose logs -f app
```

### Ejecutar tinker
```bash
docker-compose exec app php artisan tinker
```

### Ejecutar tests
```bash
docker-compose exec app php artisan test
```

### Instalar paquetes npm
```bash
docker-compose exec app npm install
```

### Detener contenedores
```bash
docker-compose down
```

### Eliminar todo (incluyendo base de datos)
```bash
docker-compose down -v
```

## Estructura

- **app**: Contenedor PHP-FPM con Laravel
- **db**: Contenedor MySQL 8
- **nginx**: Servidor web Nginx
- **phpmyadmin**: Interfaz web para administrar MySQL (puerto 8080)

Los datos de la base de datos se persisten en un volumen llamado `db_data`.
