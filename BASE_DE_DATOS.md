#  Base de Datos - Sistema Multi-Tenant

##  Resumen

Base de datos MySQL para gestionar múltiples facultades con sus programas, autoridades y documentos.

---

##  Inicio Rápido

### 1. Crear Base de Datos
```sql
CREATE DATABASE multi_tenant_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Configurar .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multi_tenant_db
DB_USERNAME=root
DB_PASSWORD=tu_password
```

### 3. Migrar y Poblar
```bash
php artisan migrate
php artisan db:seed
```

---

##  Estructura de Tablas

### tenants (Facultades)
```sql
id                  BIGINT PRIMARY KEY
nombre              VARCHAR(255)        # "Facultad de Ingeniería"
subdomain           VARCHAR(100) UNIQUE # "ingenieria"
logo                VARCHAR(255)        # "logos/ingenieria.png"
banner              VARCHAR(255)        # "banners/ingenieria.jpg"
organigrama         VARCHAR(255)        # "organigramas/ing.png"
color_primario      VARCHAR(7)          # "#3b82f6"
color_secundario    VARCHAR(7)          # "#1e40af"
color_acento        VARCHAR(7)          # "#60a5fa"
menu                JSON                # Menú personalizado
presentacion_titulo VARCHAR(255)
presentacion_texto  TEXT
ofrecemos           JSON                # Array de beneficios
historia            TEXT
mision              TEXT
vision              TEXT
email               VARCHAR(255)
telefono            VARCHAR(50)
direccion           TEXT
redes_sociales      JSON                # {facebook, instagram...}
activo              BOOLEAN DEFAULT 1
created_at          TIMESTAMP
updated_at          TIMESTAMP
```

### programas (Programas Académicos)
```sql
id                BIGINT PRIMARY KEY
tenant_id         BIGINT              # FK → tenants.id
nombre            VARCHAR(255)        # "Ingeniería de Sistemas"
descripcion       TEXT
perfil_egresado   TEXT
campo_laboral     TEXT
duracion          VARCHAR(50)         # "5 años"
malla_curricular  VARCHAR(255)        # "mallas/sistemas.pdf"
orden             INTEGER DEFAULT 0   # Orden de visualización
created_at        TIMESTAMP
updated_at        TIMESTAMP

FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
```

### autoridades (Autoridades)
```sql
id         BIGINT PRIMARY KEY
tenant_id  BIGINT              # FK → tenants.id
cargo      VARCHAR(255)        # "Decano"
nombre     VARCHAR(255)        # "Dr. Carlos Méndez"
email      VARCHAR(255)
telefono   VARCHAR(50)
foto       VARCHAR(255)        # "fotos/decano.jpg"
oficina    VARCHAR(255)        # "Edificio A - Of. 301"
orden      INTEGER DEFAULT 0
created_at TIMESTAMP
updated_at TIMESTAMP

FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
```

### documentos (Documentos Institucionales)
```sql
id          BIGINT PRIMARY KEY
tenant_id   BIGINT              # FK → tenants.id
titulo      VARCHAR(255)        # "Reglamento Académico"
descripcion TEXT
url         VARCHAR(255)        # "documentos/reglamento.pdf"
categoria   VARCHAR(100)        # "Normativa"
fecha       DATE
created_at  TIMESTAMP
updated_at  TIMESTAMP

FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
```

---

##  Agregar Datos

### Opción 1: Por SQL

#### Agregar Facultad:
```sql
INSERT INTO tenants (
    nombre,
    subdomain,
    color_primario,
    color_secundario,
    presentacion_titulo,
    presentacion_texto,
    email,
    telefono,
    created_at,
    updated_at
) VALUES (
    'Facultad de Medicina',
    'medicina',
    '#ef4444',
    '#dc2626',
    'Bienvenidos a Medicina',
    'Formamos profesionales de la salud...',
    'medicina@universidad.edu',
    '+591 3 9999999',
    NOW(),
    NOW()
);
```

#### Agregar Programa:
```sql
INSERT INTO programas (
    tenant_id,
    nombre,
    descripcion,
    duracion,
    orden,
    created_at,
    updated_at
) VALUES (
    1,  -- ID de la facultad
    'Ingeniería Electrónica',
    'Programa enfocado en electrónica y telecomunicaciones...',
    '5 años',
    4,
    NOW(),
    NOW()
);
```

#### Agregar Autoridad:
```sql
INSERT INTO autoridades (
    tenant_id,
    cargo,
    nombre,
    email,
    orden,
    created_at,
    updated_at
) VALUES (
    1,
    'Director de Carrera',
    'Ing. Juan Pérez',
    'jperez@universidad.edu',
    4,
    NOW(),
    NOW()
);
```

### Opción 2: Por Tinker (Laravel)

```bash
php artisan tinker
```

```php
// Crear facultad
$medicina = App\Models\Tenant::create([
    'nombre' => 'Facultad de Medicina',
    'subdomain' => 'medicina',
    'color_primario' => '#ef4444',
    'color_secundario' => '#dc2626',
    'email' => 'medicina@universidad.edu',
]);

// Agregar programa
$medicina->programas()->create([
    'nombre' => 'Medicina General',
    'descripcion' => 'Formación integral...',
    'duracion' => '6 años',
    'orden' => 1
]);

// Agregar autoridad
$medicina->autoridades()->create([
    'cargo' => 'Decano',
    'nombre' => 'Dr. Pedro López',
    'email' => 'decano.medicina@universidad.edu',
    'orden' => 1
]);
```

---

##  Agregar Imágenes

### Paso 1: Subir Archivos

Copiar archivos a `storage/app/public/`:

```bash
# Desde la raíz del backend
cd storage/app/public

# Crear carpetas (si no existen)
mkdir -p logos banners fotos organigramas documentos

# Copiar tus archivos
cp /ruta/logo.png logos/medicina.png
cp /ruta/banner.jpg banners/medicina.jpg
```

### Paso 2: Actualizar Base de Datos

#### Por SQL:
```sql
UPDATE tenants
SET
    logo = 'logos/medicina.png',
    banner = 'banners/medicina.jpg',
    organigrama = 'organigramas/medicina.png'
WHERE id = 3;
```

#### Por Tinker:
```bash
php artisan tinker
```

```php
$medicina = App\Models\Tenant::find(3);
$medicina->logo = 'logos/medicina.png';
$medicina->banner = 'banners/medicina.jpg';
$medicina->save();
```

### Paso 3: Verificar

```bash
# Verificar enlace simbólico
ls -la public/storage

# Si no existe, crear:
php artisan storage:link
```

Abrir en navegador:
- http://localhost:8000/storage/logos/medicina.png

---

##  Agregar Documentos (PDFs)

### 1. Subir PDF:
```bash
cp reglamento.pdf storage/app/public/documentos/
```

### 2. Registrar en BD:
```sql
INSERT INTO documentos (
    tenant_id,
    titulo,
    descripcion,
    url,
    categoria,
    fecha,
    created_at,
    updated_at
) VALUES (
    1,
    'Reglamento de Titulación',
    'Normativa para procesos de titulación',
    'documentos/reglamento.pdf',
    'Normativa',
    '2024-01-15',
    NOW(),
    NOW()
);
```

### 3. Acceder:
- http://localhost:8000/storage/documentos/reglamento.pdf

---

##  Actualizar Datos

### Actualizar Facultad:
```sql
UPDATE tenants
SET
    nombre = 'Nuevo Nombre',
    color_primario = '#10b981',
    email = 'nuevo@email.com'
WHERE id = 1;
```

### Actualizar Programa:
```sql
UPDATE programas
SET
    descripcion = 'Nueva descripción...',
    duracion = '6 años'
WHERE id = 5;
```

### Actualizar Foto de Autoridad:
```sql
UPDATE autoridades
SET foto = 'fotos/nuevo-decano.jpg'
WHERE id = 1;
```

---

##  Eliminar Datos

### Eliminar Facultad (elimina todo relacionado):
```sql
DELETE FROM tenants WHERE id = 1;
-- Automáticamente elimina programas, autoridades y documentos
-- Gracias a ON DELETE CASCADE
```

### Eliminar solo un Programa:
```sql
DELETE FROM programas WHERE id = 5;
```

---

##  Consultas Útiles

### Ver todas las facultades:
```sql
SELECT id, nombre, subdomain, email FROM tenants;
```

### Ver programas de una facultad:
```sql
SELECT nombre, duracion
FROM programas
WHERE tenant_id = 1
ORDER BY orden;
```

### Ver autoridades:
```sql
SELECT cargo, nombre, email
FROM autoridades
WHERE tenant_id = 1
ORDER BY orden;
```

### Contar documentos por categoría:
```sql
SELECT categoria, COUNT(*) as total
FROM documentos
WHERE tenant_id = 1
GROUP BY categoria;
```

### Ver facultades con sus programas:
```sql
SELECT
    t.nombre AS facultad,
    COUNT(p.id) AS total_programas
FROM tenants t
LEFT JOIN programas p ON t.id = p.tenant_id
GROUP BY t.id, t.nombre;
```

---

##  Colores Recomendados

### Facultades comunes:
```
Ingeniería:  #3b82f6 (Azul)
Economía:    #10b981 (Verde)
Medicina:    #ef4444 (Rojo)
Derecho:     #8b5cf6 (Púrpura)
Arquitectura: #f59e0b (Naranja)
Educación:   #ec4899 (Rosa)
```

---

##  Formatos de Archivos

### Imágenes:

**Logos:**
- Formato: PNG (con transparencia)
- Tamaño: 200x200px - 300x300px
- Peso: < 100KB

**Banners:**
- Formato: JPG o PNG
- Tamaño: 1200x400px - 1920x600px
- Peso: < 500KB

**Fotos de Autoridades:**
- Formato: JPG
- Tamaño: 400x400px (cuadrado)
- Peso: < 200KB

### Documentos:

**PDFs:**
- Peso: < 5MB
- Optimizados para web

---

##  Mantenimiento

### Backup de Base de Datos:
```bash
mysqldump -u root -p multi_tenant_db > backup.sql
```

### Restaurar:
```bash
mysql -u root -p multi_tenant_db < backup.sql
```

### Resetear todo:
```bash
php artisan migrate:fresh --seed
```

### Limpiar datos pero mantener estructura:
```sql
TRUNCATE TABLE documentos;
TRUNCATE TABLE autoridades;
TRUNCATE TABLE programas;
TRUNCATE TABLE tenants;
```

---

##  Importante

### Rutas de Archivos:
- **En BD**: Solo ruta relativa → `logos/medicina.png`
- **No usar**: `/storage/logos/medicina.png` 
- **No usar**: URL completa 

El modelo genera la URL completa automáticamente.

### Cascade Delete:
Al eliminar una facultad, se eliminan automáticamente:
-  Todos sus programas
-  Todas sus autoridades
-  Todos sus documentos

---

##  Checklist de Datos Mínimos

Para cada facultad nueva:

- [ ] Nombre y subdominio
- [ ] Colores (primario, secundario)
- [ ] Email y teléfono
- [ ] Presentación (título y texto)
- [ ] Al menos 1 programa
- [ ] Al menos 1 autoridad
- [ ] Logo (recomendado)
- [ ] Banner (recomendado)

---

**¡Base de datos bien estructurada y fácil de gestionar! **
