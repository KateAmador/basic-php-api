# API REST Básica en PHP

API REST simple para gestión de usuarios desarrollada en PHP puro con MySQL.

## Estructura del Proyecto

```
api-php/
├── conexion.php    # Configuración de conexión a base de datos
├── consultas.php   # Funciones CRUD para usuarios
├── index.php       # Punto de entrada de la API
└── README.md       # Documentación
```

## Requisitos

- PHP 7.4+
- MySQL/MariaDB
- Servidor web (Apache/Nginx) o XAMPP

## Configuración

1. **Base de datos**: Crear base de datos `api` con tabla `usuarios`:
```sql
CREATE DATABASE api;
USE api;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);
```

2. **Configuración de conexión** (`conexion.php`):
```php
$host = "localhost";
$user = "root";
$pass = "";
$db = "api";
```

## Endpoints

### GET - Obtener usuarios
- **URL**: `GET /index.php`
- **Descripción**: Obtiene todos los usuarios
- **Respuesta**: Array JSON con todos los usuarios

### GET - Obtener usuario específico
- **URL**: `GET /index.php?id=123`
- **Parámetros**: `id` (ID del usuario)
- **Respuesta**: Array JSON con el usuario específico

### POST - Crear usuario
- **URL**: `POST /index.php`
- **Body** (JSON):
```json
{
    "nombre": "Juan Pérez"
}
```
- **Respuesta**: JSON con el usuario creado incluyendo su ID

### PUT - Actualizar usuario
- **URL**: `PUT /index.php?id=123`
- **Parámetros**: `id` (ID del usuario a actualizar)
- **Body** (JSON):
```json
{
    "nombre": "Juan Carlos Pérez"
}
```
- **Respuesta**: JSON con mensaje de confirmación

### DELETE - Eliminar usuario
- **URL**: `DELETE /index.php?id=123`
- **Parámetros**: `id` (ID del usuario a eliminar)
- **Respuesta**: JSON con mensaje de confirmación

## Ejemplos de Uso

### Thunder Client / Postman

**Obtener todos los usuarios:**
```
GET http://localhost/api-php/index.php
```

**Obtener usuario específico:**
```
GET http://localhost/api-php/index.php?id=1
```

**Crear usuario:**
```
POST http://localhost/api-php/index.php
Content-Type: application/json

{
    "nombre": "María García"
}
```

**Actualizar usuario:**
```
PUT http://localhost/api-php/index.php?id=1
Content-Type: application/json

{
    "nombre": "María García López"
}
```

**Eliminar usuario:**
```
DELETE http://localhost/api-php/index.php?id=1
```

## Respuestas de Error

Todas las operaciones devuelven JSON con formato de error:
```json
{
    "error": "Descripción del error"
}
```

## Notas de Seguridad

⚠️ **Esta API es básica de Practica**:
- No usa prepared statements (vulnerable a SQL injection)
- No tiene validación de entrada
- No tiene autenticación/autorización
- No tiene rate limiting

