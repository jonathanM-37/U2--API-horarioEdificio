# 🚀 Guía de Ejecución con Laragon — Proyecto Horario con Edificios (Laravel)

> **Entorno:** Laragon (PHP 8.3, MySQL, Apache)
> **Carpeta del proyecto:** `proyU2\dwa2263-main`

---

## ⚠️ ERROR COMÚN: "Could not open input file: artisan"

Este error ocurre porque estás en la **carpeta equivocada**.
El archivo `artisan` vive en `dwa2263-main`, NO en `proyU2`.

**✅ Solución — ejecuta esto PRIMERO antes de cualquier comando artisan:**

```powershell
cd C:\Users\jonathan\Downloads\web\proyU2\dwa2263-main
```

Confirma que estás en el lugar correcto:

```powershell
dir artisan
```

Si ves el archivo `artisan`, ya puedes continuar. Si no lo ves, no estás en la carpeta correcta.

---

## Paso 1 — Entrar a la carpeta correcta

Abre la terminal (PowerShell o la terminal de Laragon) y escribe:

```powershell
cd C:\Users\jonathan\Downloads\web\proyU2\dwa2263-main
```

---

## Paso 2 — Instalar dependencias

```powershell
composer install
```

Espera a que termine. Creará la carpeta `vendor/`.

---

## Paso 3 — Copiar el archivo `.env`

En Windows (PowerShell) usa `copy` en lugar de `cp`:

```powershell
copy .env.example .env
```

---

## Paso 4 — Configurar la base de datos en `.env`

Abre el archivo `.env` y edita estas líneas con los datos de Laragon:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=horario_db
DB_USERNAME=root
DB_PASSWORD=
```

> **Nota Laragon:** Por defecto Laragon usa `root` sin contraseña (`DB_PASSWORD=` vacío).

---

## Paso 5 — Crear la base de datos en Laragon

1. Abre **Laragon** → clic en **Database** (o `Ctrl+Alt+D`)
2. Se abre HeidiSQL / TablePlus
3. Clic derecho en el servidor → **Create new** → **Database**
4. Nombre: `horario_db` | Collation: `utf8mb4_unicode_ci` → **OK**

O desde la terminal de Laragon:

```powershell
mysql -u root -e "CREATE DATABASE horario_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

---

## Paso 6 — Generar la clave de la aplicación

⚠️ Asegúrate de estar en `dwa2263-main` antes de ejecutar esto:

```powershell
php artisan key:generate
```

Deberías ver: `Application key set successfully.`

---

## Paso 7 — Ejecutar las migraciones

```powershell
php artisan migrate
```

Si quieres borrar todo y empezar de cero:

```powershell
php artisan migrate:fresh
```

---

## Paso 8 — Iniciar el servidor

### Opción A — php artisan serve (más fácil)

```powershell
php artisan serve
```

La API estará en: **http://127.0.0.1:8000/api/edificios**

### Opción B — Virtual host de Laragon (recomendado)

Mueve o copia la carpeta `dwa2263-main` a:

```
C:\laragon\www\dwa2263-main
```

Laragon crea automáticamente el virtual host. La API quedará en:

```
http://dwa2263-main.test/api/edificios
```

---

## Paso 9 — Verificar que la API funciona

Abre el navegador y visita:

```
http://127.0.0.1:8000/api/edificios
```

Deberías ver: `[]` (lista vacía si aún no hay datos).

---

## Paso 10 — Insertar datos de prueba (Tinker)

```powershell
php artisan tinker
```

Dentro de Tinker pega esto:

```php
$e = new App\Models\Edificio();
$e->nombre = 'Edificio C';
$e->save();

foreach (['C1','C2','C3','C4','C5'] as $nombre) {
    $a = new App\Models\Aula();
    $a->nombre = $nombre;
    $a->capacidad = 30;
    $a->wifi = true;
    $a->edificio_id = $e->id;
    $a->save();
}

exit
```

---

## 📋 Resumen de todos los comandos (copiar y pegar en orden)

```powershell
# 1. Entrar a la carpeta correcta
cd C:\Users\jonathan\Downloads\web\proyU2\dwa2263-main

# 2. Instalar dependencias
composer install

# 3. Copiar .env (Windows)
copy .env.example .env

# (Edita el .env antes del siguiente paso)

# 4. Generar clave
php artisan key:generate

# 5. Migrar base de datos
php artisan migrate

# 6. Iniciar servidor
php artisan serve
```

---

## 10. Rutas disponibles de la API

| Método   | URL                        | Descripción               |
|----------|----------------------------|---------------------------|
| GET      | /api/edificios             | Listar todos los edificios (con aulas) |
| POST     | /api/edificios             | Crear un edificio         |
| GET      | /api/edificios/{id}        | Ver un edificio por ID    |
| PUT      | /api/edificios/{id}        | Actualizar un edificio    |
| DELETE   | /api/edificios/{id}        | Eliminar un edificio      |

Ver todas las rutas registradas:

```powershell
php artisan route:list
```

---

## 🔧 Solución de problemas comunes

| Error | Causa | Solución |
|-------|-------|----------|
| `Could not open input file: artisan` | Carpeta equivocada | Ejecuta `cd dwa2263-main` primero |
| `SQLSTATE: Access denied` | Password incorrecto | Verifica `DB_PASSWORD=` vacío en `.env` |
| `Class not found` | Autoload desactualizado | Ejecuta `composer dump-autoload` |
| `No application encryption key` | Falta clave en `.env` | Ejecuta `php artisan key:generate` |
| `Table not found` | No has migrado | Ejecuta `php artisan migrate` |
| `Unknown database` | La BD no existe | Créala en HeidiSQL de Laragon |
| Puerto 8000 ocupado | Puerto en uso | Usa `php artisan serve --port=8080` |
