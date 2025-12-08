# 🔧 Backend - Sistema Multi-Tenant

## 🎯 Resumen

API RESTful desarrollada con **Laravel 11 + MySQL** para gestionar múltiples facultades universitarias.

---

## ⚡ Inicio Rápido

```bash
cd backend-mtenant
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
```

API disponible en: http://localhost:8000

---

## 📁 Estructura

```
backend-mtenant/
├── app/
│   ├── Http/Controllers/
│   │   └── TenantController.php   # Controlador principal
│   └── Models/
│       ├── Tenant.php              # Facultades
│       ├── Programa.php            # Programas académicos
│       ├── Autoridad.php           # Autoridades
│       └── Documento.php           # Documentos
├── database/
│   ├── migrations/                 # Tablas de BD
│   └── seeders/
│       └── TenantSeeder.php        # Datos de ejemplo
├── routes/
│   └── api.php                     # Rutas API
├── config/
│   └── cors.php                    # CORS config
├── storage/app/public/             # Archivos públicos
│   ├── logos/
│   ├── banners/
│   ├── fotos/
│   ├── organigramas/
│   └── documentos/
└── .env
```

---

## 🔌 API Endpoints

### Base URL
```
http://localhost:8000/api
```

### Endpoints:

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/tenant` | Tenant actual (primero) |
| GET | `/tenant?tenant_id=1` | Por ID |
| GET | `/tenant?subdomain=ingenieria` | Por subdominio |
| GET | `/tenant/{id}` | Específico |
| GET | `/tenant/all` | Todos |

### Ejemplo de Respuesta:
```json
{
  "data": {
    "id": 1,
    "nombre": "Facultad de Ingeniería",
    "subdomain": "ingenieria",
    "logo": "http://localhost:8000/storage/logos/ingenieria.png",
    "banner": "http://localhost:8000/storage/banners/ingenieria.jpg",
    "color_primario": "#3b82f6",
    "color_secundario": "#1e40af",
    "programas": [...],
    "autoridades": [...],
    "documentos": [...],
    "email": "ingenieria@universidad.edu",
    "telefono": "+591 3 1234567"
  }
}
```

---

## 🗄️ Modelos

### Tenant
```php
// Relaciones
$tenant->programas      // HasMany
$tenant->autoridades    // HasMany
$tenant->documentos     // HasMany

// Accessors
$tenant->logo_url       // URL completa
$tenant->banner_url     // URL completa
```

### Programa
```php
$programa->tenant       // BelongsTo
```

### Autoridad
```php
$autoridad->tenant      // BelongsTo
$autoridad->foto_url    // URL completa
```

### Documento
```php
$documento->tenant      // BelongsTo
$documento->archivo_url // URL completa
```

---

## ⚙️ Configuración

### .env (MySQL)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multi_tenant_db
DB_USERNAME=root
DB_PASSWORD=tu_password

APP_URL=http://localhost:8000
```

### CORS (config/cors.php)
```php
'allowed_origins' => [
    'http://localhost:5173',  // Frontend
    'http://localhost:3000',
],
```

---

## 📦 Migraciones

### Ejecutar:
```bash
php artisan migrate          # Crear tablas
php artisan migrate:fresh    # Resetear + crear
php artisan migrate:fresh --seed  # + datos
```

### Tablas creadas:
- `tenants` - Facultades
- `programas` - Programas académicos
- `autoridades` - Autoridades
- `documentos` - Documentos institucionales

---

## 🌱 Seeders

### Ejecutar:
```bash
php artisan db:seed                      # Todos
php artisan db:seed --class=TenantSeeder # Solo tenants
```

### Datos creados:
- 2 facultades (Ingeniería, Economía)
- 5 programas académicos
- 5 autoridades
- 4 documentos

---

## 📂 Storage (Archivos)

### Crear enlace simbólico:
```bash
php artisan storage:link
```

Esto crea: `public/storage` → `storage/app/public`

### Estructura:
```
storage/app/public/
├── logos/          # Logos de facultades
├── banners/        # Banners
├── fotos/          # Fotos de autoridades
├── organigramas/   # Organigramas
└── documentos/     # PDFs
```

### URLs generadas automáticamente:
```php
// En modelo Tenant
public function getLogoUrlAttribute() {
    return $this->logo
        ? asset('storage/' . $this->logo)
        : null;
}
```

Resultado: `http://localhost:8000/storage/logos/ingenieria.png`

---

## 🔧 Comandos Útiles

```bash
# Cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Ver rutas
php artisan route:list

# Tinker (consola)
php artisan tinker

# Logs
tail -f storage/logs/laravel.log
```

---

## 🧪 Testing

### Probar API:
```bash
# Tenant actual
curl http://localhost:8000/api/tenant

# Por ID
curl http://localhost:8000/api/tenant/1

# Todos
curl http://localhost:8000/api/tenant/all
```

### Con navegador:
- http://localhost:8000/api/tenant
- http://localhost:8000/api/tenant/1
- http://localhost:8000/api/tenant/all

---

## 💡 Tips de Desarrollo

### Crear nuevo modelo:
```bash
php artisan make:model MiModelo -m
# -m = migración
```

### Crear controlador:
```bash
php artisan make:controller MiController
```

### Tinker (modificar datos):
```bash
php artisan tinker

$tenant = App\Models\Tenant::find(1);
$tenant->nombre = 'Nuevo Nombre';
$tenant->save();
```

---

## 🚀 Producción

### 1. Configurar .env:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com
```

### 2. Optimizar:
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 3. Permisos:
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## ⚠️ Troubleshooting

### Error: Connection refused
- Verifica que MySQL esté corriendo
- Verifica credenciales en `.env`
- Crea la base de datos manualmente

### Error: CORS
- Verifica `config/cors.php`
- Limpia caché: `php artisan config:clear`

### Error: 404 en API
- Verifica que uses `/api` en la URL
- Limpia rutas: `php artisan route:clear`

### Storage link no funciona
```bash
# Eliminar y recrear
rm public/storage
php artisan storage:link
```

---

## 📊 Estadísticas

- **4 modelos** principales
- **4 migraciones** de BD
- **8 tablas** en total
- **3 endpoints** de API
- **2 seeders** con datos

---

**¡Backend robusto y escalable! 🚀**
