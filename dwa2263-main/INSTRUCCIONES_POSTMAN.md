# 📬 Guía de Pruebas con Postman — API Edificios

> **Antes de iniciar:** Asegúrate de que el servidor Laravel esté corriendo:
> ```bash
> php artisan serve
> ```
> URL base: `http://127.0.0.1:8000`

---

## Configuración inicial en Postman

1. Abre **Postman**
2. Crea una nueva **Collection** llamada: `API Horario - Edificios`
3. Para cada request que uses con Body (POST, PUT), asegúrate de:
   - Ir a la pestaña **Body**
   - Seleccionar **raw**
   - Cambiar el tipo a **JSON** (dropdown a la derecha)
4. Agrega el header en la pestaña **Headers**:
   - Key: `Accept`
   - Value: `application/json`

---

## 1️⃣ Listar todos los edificios

### Request
| Campo | Valor |
|-------|-------|
| **Método** | `GET` |
| **URL** | `http://127.0.0.1:8000/api/edificios` |

### Pasos en Postman
1. Crea una nueva pestaña (request)
2. Selecciona `GET` en el dropdown de métodos
3. Escribe la URL: `http://127.0.0.1:8000/api/edificios`
4. Haz clic en **Send**

### Respuesta esperada (200 OK)
```json
[
  {
    "id": 1,
    "nombre": "Edificio C",
    "created_at": "2026-10-25T22:00:00.000000Z",
    "updated_at": "2026-10-25T22:00:00.000000Z",
    "aulas": [
      { "id": 1, "nombre": "C1", "capacidad": 30, "wifi": 1, "edificio_id": 1, "created_at": "...", "updated_at": "..." },
      { "id": 2, "nombre": "C2", "capacidad": 30, "wifi": 1, "edificio_id": 1, "created_at": "...", "updated_at": "..." }
    ]
  }
]
```

> Si no hay datos, responde con `[]` — esto es correcto.

---

## 2️⃣ Crear un edificio (POST)

### Request
| Campo | Valor |
|-------|-------|
| **Método** | `POST` |
| **URL** | `http://127.0.0.1:8000/api/edificios` |

### Pasos en Postman
1. Selecciona `POST`
2. Escribe la URL: `http://127.0.0.1:8000/api/edificios`
3. Ve a la pestaña **Headers** y agrega:
   - `Content-Type`: `application/json`
   - `Accept`: `application/json`
4. Ve a la pestaña **Body** → selecciona **raw** → tipo **JSON**
5. Escribe el siguiente JSON:

```json
{
  "nombre": "Edificio C"
}
```

6. Haz clic en **Send**

### Respuesta esperada (201 Created)
```json
{
  "nombre": "Edificio C",
  "updated_at": "2026-10-25T22:10:00.000000Z",
  "created_at": "2026-10-25T22:10:00.000000Z",
  "id": 1
}
```

### Otro ejemplo — Crear Edificio A
```json
{
  "nombre": "Edificio A"
}
```

---

## 3️⃣ Obtener un edificio por ID (GET)

### Request
| Campo | Valor |
|-------|-------|
| **Método** | `GET` |
| **URL** | `http://127.0.0.1:8000/api/edificios/1` |

### Pasos en Postman
1. Selecciona `GET`
2. Escribe la URL con el ID del edificio: `http://127.0.0.1:8000/api/edificios/1`
3. Agrega el header `Accept: application/json`
4. Haz clic en **Send**

### Respuesta esperada (200 OK)
```json
{
  "id": 1,
  "nombre": "Edificio C",
  "created_at": "2026-10-25T22:10:00.000000Z",
  "updated_at": "2026-10-25T22:10:00.000000Z",
  "aulas": [
    { "id": 1, "nombre": "C1", "capacidad": 30, "wifi": 1, "edificio_id": 1, "created_at": "...", "updated_at": "..." },
    { "id": 2, "nombre": "C2", "capacidad": 30, "wifi": 1, "edificio_id": 1, "created_at": "...", "updated_at": "..." }
  ]
}
```
/edificios/1
### Respuesta si no existe (404 Not Found)
```json
{
  "message": "No query results for model [App\\Models\\Edificio] 99"
}
```

---

## 4️⃣ Actualizar un edificio (PUT)

### Request
| Campo | Valor |
|-------|-------|
| **Método** | `PUT` |
| **URL** | `http://127.0.0.1:8000/api/edificios/1` |

### Pasos en Postman
1. Selecciona `PUT`
2. Escribe la URL: `http://127.0.0.1:8000/api`
3. Ve a **Headers** y agrega:
   - `Content-Type`: `application/json`
   - `Accept`: `application/json`
4. Ve a **Body** → **raw** → **JSON**
5. Escribe:

```json
{
  "nombre": "Edificio C Modificado"
}
```

6. Haz clic en **Send**

### Respuesta esperada (200 OK)
```json
{
  "id": 1,
  "nombre": "Edificio C Modificado",
  "created_at": "2026-10-25T22:10:00.000000Z",
  "updated_at": "2026-10-25T22:15:00.000000Z"
}
```

> El campo `updated_at` cambiará automáticamente.

---

## 5️⃣ Eliminar un edificio (DELETE)

### Request
| Campo | Valor |
|-------|-------|
| **Método** | `DELETE` |
| **URL** | `http://127.0.0.1:8000/api/edificios/1` |

### Pasos en Postman
1. Selecciona `DELETE`
2. Escribe la URL: `http://127.0.0.1:8000/api/edificios/1`
3. Agrega el header `Accept: application/json`
4. **No necesita Body**
5. Haz clic en **Send**

### Respuesta esperada (200 OK)
```json
{
  "mensaje": "Edificio eliminado correctamente",
  "edificio": {
    "id": 1,
    "nombre": "Edificio C Modificado",
    "created_at": "2026-10-25T22:10:00.000000Z",
    "updated_at": "2026-10-25T22:15:00.000000Z"
  }
}
```

---

## 🗂 Flujo completo de prueba recomendado

Sigue este orden para probar todo el CRUD:

```
1. POST   /api/edificios          → Crear "Edificio C"
2. POST   /api/edificios          → Crear "Edificio A"  
3. GET    /api/edificios          → Listar (debe mostrar 2 edificios)
4. GET    /api/edificios/1        → Ver "Edificio C" con sus aulas
5. PUT    /api/edificios/1        → Actualizar a "Edificio C Modificado"
6. GET    /api/edificios/1        → Verificar el cambio
7. DELETE /api/edificios/2        → Eliminar "Edificio A"
8. GET    /api/edificios          → Listar (solo debe quedar 1)
```

---

## ⚠️ Errores comunes y soluciones

| Código | Error | Causa probable | Solución |
|--------|-------|----------------|----------|
| `404` | `No query results...` | El ID no existe | Usa un ID válido |
| `422` | `Unprocessable Content` | Falta el campo `nombre` | Verifica el JSON del Body |
| `500` | `SQLSTATE: no such table` | Migraciones no ejecutadas | Corre `php artisan migrate` |
| `405` | `Method Not Allowed` | URL o método incorrecto | Verifica método HTTP y URL |
| Sin respuesta | Connection refused | Servidor apagado | Corre `php artisan serve` |

---

## 💡 Tips de Postman

- **Guarda cada request** haciendo clic en **Save** → asígnalo a la colección `API Horario - Edificios`
- **Nombra cada request** descriptivamente:
  - `GET - Listar edificios`
  - `POST - Crear edificio`
  - `GET - Ver edificio por ID`
  - `PUT - Actualizar edificio`
  - `DELETE - Eliminar edificio`
- Puedes usar **Environment Variables** para no repetir la URL base:
  - Crea variable `base_url` = `http://127.0.0.1:8000`
  - Úsala como `{{base_url}}/api/edificios`
