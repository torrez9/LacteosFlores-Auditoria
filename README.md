
<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://laravel.com/docs"><img src="https://img.shields.io/badge/Laravel-Framework-red" alt="Laravel Framework"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Version"></a>
    <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-green" alt="License"></a>
</p>

---

# 🚀 Proyecto Laravel — Guía de Instalación

Este proyecto utiliza **Laravel**, un framework PHP potente y moderno.  
A continuación se detallan los pasos para **clonar, configurar y ejecutar** el proyecto correctamente.

---

## 🧩 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio
```

---

## 📦 2. Instalar dependencias de PHP y Node.js

Ejecuta los siguientes comandos:

```bash
composer install
npm install
```

---

## ⚙️ 3. Configurar el archivo de entorno

Copia el archivo de ejemplo y crea tu configuración local:

```bash
cp .env.example .env
```

Luego abre el archivo `.env` y ajusta tus variables, por ejemplo:

```
APP_NAME="LaravelApp"
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🔑 4. Generar la clave de aplicación

```bash
php artisan key:generate
```

---

## 🧱 5. Ejecutar migraciones (opcional si hay base de datos configurada)

```bash
php artisan migrate
```

---

## 🧪 6. Iniciar el servidor de desarrollo

Para ejecutar Laravel localmente:

```bash
php artisan serve
```

El proyecto estará disponible en:

👉 **http://127.0.0.1:8000**

---

## 🪄 7. Compilar recursos front-end (si aplica)

Si el proyecto usa Vite o assets de frontend:

```bash
npm run dev
```

Para compilación de producción:

```bash
npm run build
```

---

## 📁 Estructura importante del proyecto

| Carpeta | Descripción |
|----------|-------------|
| `app/` | Contiene el código principal (controladores, modelos, etc.) |
| `routes/` | Define las rutas del proyecto |
| `resources/` | Archivos de vistas y assets (Blade, JS, CSS) |
| `database/` | Migraciones y seeds |
| `public/` | Archivos públicos (index.php, imágenes, etc.) |
| `.env` | Variables de entorno (⚠️ No se sube al repositorio) |

---

## 🧰 Comandos útiles

| Acción | Comando |
|--------|----------|
| Limpiar cachés | `php artisan optimize:clear` |
| Crear enlace simbólico al almacenamiento | `php artisan storage:link` |
| Ver rutas registradas | `php artisan route:list` |
| Ejecutar migraciones con seed | `php artisan migrate --seed` |

---

## 🪪 Licencia

Este proyecto está bajo la licencia [MIT](https://opensource.org/licenses/MIT).

---

> 💡 **Consejo:** Antes de subir al repositorio, asegúrate de tener configurado tu `.gitignore` correctamente para excluir `vendor/`, `node_modules/` y tu `.env`.
