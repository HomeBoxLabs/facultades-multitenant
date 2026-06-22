#  Sistema Multi-Tenant para Facultades Universitarias

Sistema completo para gestionar múltiples facultades con **Vue.js 3** (frontend) y **Laravel 11** (backend).

---

##  Inicio Rápido

### 1. Backend (Laravel)

```bash
cd backend-mtenant
composer install
cp .env.example .env
php artisan key:generate

# Configurar MySQL en .env
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
```

 Backend en: http://localhost:8000

### 2. Frontend (Vue.js)

```bash
cd frontend-mtenant
npm install
npm run dev
```

 Frontend en: http://localhost:5173

---

##  Documentación

###  [FRONTEND.md](FRONTEND.md)

- Estructura del proyecto Vue
- Componentes y vistas
- Animaciones y estilos
- Cómo cambiar de facultad
- Tips de desarrollo

###  [BACKEND.md](BACKEND.md)

- API REST endpoints
- Modelos y relaciones
- Configuración Laravel
- Comandos útiles
- Producción

###  [BASE_DE_DATOS.md](BASE_DE_DATOS.md)

- Estructura de tablas
- Cómo agregar datos
- Cómo subir imágenes
- Consultas SQL útiles
- Mantenimiento

---

##  Características

### Frontend:

-  Diseño moderno con animaciones
-  Responsive (móvil, tablet, desktop)
-  Colores dinámicos por facultad
-  Font Awesome + Google Fonts
-  100% sin datos hardcodeados

### Backend:

-  API RESTful con Laravel 11
-  Base de datos MySQL
-  Sistema de archivos (storage)
-  CORS configurado
-  Seeders con datos de ejemplo

---

##  Demo

### Facultad de Ingeniería (Azul)

http://localhost:5173?tenant_id=1

### Facultad de Economía (Verde)

http://localhost:5173?tenant_id=2

---

##  Estructura del Proyecto

```
Frotend-Tenant/
├── FRONTEND.md              #  Documentación frontend
├── BACKEND.md               #  Documentación backend
├── BASE_DE_DATOS.md         #  Documentación BD
├── README.md                #  Este archivo
│
├── frontend-mtenant/   # Vue.js 3 + Vite
│   ├── src/
│   │   ├── components/     # Header, Footer, Card
│   │   ├── views/          # Home, Sobre, Programas...
│   │   ├── router/         # Vue Router
│   │   ├── store/          # Pinia (estado)
│   │   └── style.css       # Estilos globales
│   ├── .env                # Config frontend
│   └── package.json
│
└── backend-mtenant/    # Laravel 11
    ├── app/
    │   ├── Models/         # Tenant, Programa, etc.
    │   └── Http/Controllers/
    ├── database/
    │   ├── migrations/     # Tablas
    │   └── seeders/        # Datos ejemplo
    ├── routes/api.php      # Rutas API
    ├── storage/app/public/ # Archivos
    └── .env                # Config backend
```

---

##  Conceptos Clave

### Multi-Tenant

Cada facultad es un "tenant" con:

- Sus propios colores
- Su propio contenido
- Sus propios programas
- Sus propias autoridades

### Colores Dinámicos

Los colores cambian automáticamente según la facultad activa.

### Sin Hardcodeo

Todo viene de la base de datos. Cero datos fijos en el código.

---

##  Tecnologías

### Frontend:

- Vue.js 3.5
- Vite 7.2
- Vue Router 4
- Pinia 2
- Axios 1
- Font Awesome 6.5
- Google Fonts (Inter)

### Backend:

- Laravel 11
- PHP 8.2+
- MySQL 5.7+
- Sanctum 4.2

---

##  Datos Incluidos

El sistema incluye 2 facultades de ejemplo:

### 1. Facultad de Ingeniería

- Color: Azul (#3b82f6)
- 3 programas académicos
- 3 autoridades
- 3 documentos

### 2. Facultad de Ciencias Económicas

- Color: Verde (#10b981)
- 2 programas académicos
- 2 autoridades
- 1 documento

---

##  Uso Básico

### Ver una facultad:

```
http://localhost:5173?tenant_id=1
```

### Cambiar de facultad:

```
http://localhost:5173?tenant_id=2
```

### Por subdominio:

```
http://localhost:5173?facultad=ingenieria
http://localhost:5173?facultad=economia
```

---

##  Troubleshooting

### Frontend muestra "Cargando..."

1. Verifica que el backend esté corriendo
2. Abre la consola del navegador (F12)
3. Verifica la URL de la API en `frontend-mtenant/.env`

### Error de CORS

```bash
cd backend-mtenant
php artisan config:clear
```

### Imágenes no se ven

```bash
cd backend-mtenant
php artisan storage:link
```

### Más ayuda

Consulta los archivos de documentación:

- [FRONTEND.md](FRONTEND.md)
- [BACKEND.md](BACKEND.md)
- [BASE_DE_DATOS.md](BASE_DE_DATOS.md)

---

##  Próximos Pasos

1. **Agregar más facultades** → Ver [BASE_DE_DATOS.md](BASE_DE_DATOS.md)
2. **Subir imágenes reales** → Ver [BASE_DE_DATOS.md](BASE_DE_DATOS.md)
3. **Personalizar colores** → Editar en base de datos
4. **Agregar contenido** → SQL o Tinker

---

##  Personalización

### Agregar nueva facultad:

```sql
INSERT INTO tenants (nombre, subdomain, color_primario, color_secundario, email)
VALUES ('Facultad de Medicina', 'medicina', '#ef4444', '#dc2626', 'medicina@uni.edu');
```

Ver detalles en [BASE_DE_DATOS.md](BASE_DE_DATOS.md)

---

##  Licencia

MIT License

---

##  Desarrollo

- **Frontend**: Vue.js 3 + Vite
- **Backend**: Laravel 11
- **Base de Datos**: MySQL
- **Estilos**: CSS moderno con animaciones
- **Iconos**: Font Awesome 6.5
- **Fuentes**: Inter (Google Fonts)

---

**Sistema completo, moderno y listo para producción! **

Para más detalles, consulta la documentación específica de cada componente.
