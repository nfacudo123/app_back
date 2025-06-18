# 🏨 Sistema de Gestión Hotelera - Backend Laravel
Este proyecto corresponde al backend del sistema de gestión hotelera, desarrollado en **Laravel y PostgreSQL**, que permite registrar hoteles, asignar tipos de habitaciones con restricciones específicas, y consumir la API desde un frontend React.

Desplegado en: https://api.examplereact.lat

## 📦 Requisitos

- PHP 8.1 o superior
- Composer
- PostgreSQL

---

## ⚙️ Instalación

```bash
# 1. Clona el repositorio
git clone https://github.com/nfacudo123/app_back.git
cd app_back

# 2. Instala dependencias
composer install

# 3. Copia el archivo .env
cp .env.example .env

# 4. Genera clave de la app
php artisan key:generate
```

## 🔐 Configuración de Base de Datos

Edita tu archivo `.env` con los datos correctos:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=gestion_hotelera
DB_USERNAME=hoteladmin
DB_PASSWORD=admin123
```

⚠️ Estos son ejemplos. Usa credenciales seguras en producción.

---

## 🗃️ Migraciones y Seeders

```bash
# Migrar y llenar datos de ejemplo
php artisan migrate:fresh --seed
```

---

## 📁 Estructura de Tablas

### `hoteles`
- `id`
- `nombre`
- `direccion`
- `ciudad`
- `nit`
- `lim_habit`
- timestamps

### `habit_asign`
- `id`
- `hotel_id` (FK a `hoteles.id`)
- `habitacion_tipo`: `ESTANDAR`, `JUNIOR`, `SUITE`
- `acomodacion`: `SENCILLA`, `DOBLE`, `TRIPLE`, `CUADRUPLE`
- `cantidad`
- timestamps

---

## 🔌 Endpoints disponibles

### 📍 Hoteles

| Método | Ruta               | Descripción                         |
|--------|--------------------|-------------------------------------|
| GET    | /hoteles           | Listar todos los hoteles            |
| GET    | /hoteles/{id}      | Ver detalles de un hotel            |
| POST   | /hoteles           | Registrar un nuevo hotel            |

### 📍 Habitaciones

| Método | Ruta                           | Descripción                                 |
|--------|--------------------------------|---------------------------------------------|
| GET    | /asignaciones/{hotel_id}        | Listar asignaciones del hotel              |
| POST   | /asignaciones                   | Crear nueva configuración de habitación     |

---


## 👨‍💻 Autor

- Desarrollado por: Nelson Facundo
