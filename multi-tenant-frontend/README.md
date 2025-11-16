# Multi-Tenant Frontend - Vue.js

Frontend multi-tenant moderno, minimalista y completamente responsive para arquitectura de facultades universitarias. Diseñado para integrarse con Laravel backend.

## Características

- **Multi-Tenant**: Datos dinámicos según la facultad (nombre, logo, colores, contenido)
- **Diseño Minimalista**: Interfaz limpia, moderna y profesional
- **Totalmente Responsive**: Adaptable a móviles, tablets y escritorio
- **Modular**: Componentes reutilizables y escalables
- **Estado Global**: Pinia para gestión centralizada del tenant
- **Enrutamiento**: Vue Router con 5 secciones principales

## Estructura del Proyecto

```
src/
├── assets/           # Imágenes, logos, recursos estáticos
├── components/       # Componentes reutilizables
│   ├── Header.vue   # Barra de navegación responsive
│   ├── Footer.vue   # Pie de página con información de contacto
│   └── Card.vue     # Tarjeta genérica para contenido
├── views/           # Vistas de las páginas
│   ├── Home.vue           # Página de inicio
│   ├── Sobre.vue          # Historia, misión, visión
│   ├── Programas.vue      # Programas académicos
│   ├── Autoridades.vue    # Directivos y autoridades
│   └── Documentos.vue     # Documentos institucionales
├── router/          # Configuración de rutas
│   └── index.js
├── store/           # Estado global (Pinia)
│   └── tenant.js    # Store del tenant
├── App.vue          # Componente principal
├── main.js          # Punto de entrada
└── style.css        # Estilos globales
```

## Tecnologías Utilizadas

- **Vue 3** - Framework JavaScript progresivo
- **Vite** - Build tool rápido y moderno
- **Vue Router** - Enrutamiento oficial de Vue
- **Pinia** - State management para Vue 3
- **Axios** - Cliente HTTP para API requests

## Instalación

1. **Clonar el repositorio**
   ```bash
   cd multi-tenant-frontend
   ```

2. **Instalar dependencias**
   ```bash
   npm install
   ```

3. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   ```

   Editar `.env` con la URL de tu backend Laravel:
   ```env
   VITE_API_URL=http://localhost:8000/api
   ```

4. **Iniciar servidor de desarrollo**
   ```bash
   npm run dev
   ```

5. **Acceder a la aplicación**
   ```
   http://localhost:5173
   ```

## Scripts Disponibles

- `npm run dev` - Inicia el servidor de desarrollo
- `npm run build` - Genera build de producción
- `npm run preview` - Preview del build de producción

## Integración con Backend Laravel

### Formato de Datos del Tenant

El frontend espera recibir del backend Laravel un objeto con la siguiente estructura:

```json
{
  "data": {
    "id": 1,
    "nombre": "Facultad de Ingeniería",
    "logo": "https://example.com/logos/ingenieria.png",
    "banner": "https://example.com/banners/ingenieria.jpg",
    "color_primario": "#3b82f6",
    "color_secundario": "#1e40af",
    "color_acento": "#60a5fa",
    "menu": [
      { "label": "Inicio", "path": "/" },
      { "label": "Sobre Nosotros", "path": "/sobre" }
    ],
    "presentacion_titulo": "Bienvenidos a la Facultad",
    "presentacion_texto": "Descripción de la facultad...",
    "ofrecemos": [
      {
        "titulo": "Educación de Calidad",
        "descripcion": "Descripción...",
        "imagen": "https://example.com/imagen.jpg"
      }
    ],
    "historia": "Historia de la facultad...",
    "mision": "Nuestra misión...",
    "vision": "Nuestra visión...",
    "organigrama": "https://example.com/organigrama.png",
    "programas": [
      {
        "id": 1,
        "nombre": "Ingeniería de Sistemas",
        "descripcion": "Descripción del programa...",
        "perfil_egresado": "Perfil...",
        "campo_laboral": "Campo laboral...",
        "duracion": "5 años",
        "malla_curricular": "https://example.com/malla.pdf"
      }
    ],
    "autoridades": [
      {
        "id": 1,
        "cargo": "Decano",
        "nombre": "Dr. Juan Pérez",
        "email": "decano@facultad.edu",
        "telefono": "+123456789",
        "foto": "https://example.com/foto.jpg",
        "oficina": "Edificio A - Oficina 101"
      }
    ],
    "documentos": [
      {
        "id": 1,
        "titulo": "Reglamento Académico",
        "descripcion": "Descripción...",
        "url": "https://example.com/documento.pdf",
        "categoria": "Normativa",
        "fecha": "2024-01-15"
      }
    ],
    "email": "contacto@facultad.edu",
    "telefono": "+123456789",
    "direccion": "Av. Principal 123",
    "redes_sociales": {
      "facebook": "https://facebook.com/facultad",
      "twitter": "https://twitter.com/facultad",
      "instagram": "https://instagram.com/facultad",
      "linkedin": "https://linkedin.com/company/facultad"
    }
  }
}
```

### Endpoints del Backend

El frontend realiza las siguientes peticiones:

- **GET** `/api/tenant` - Obtiene datos del tenant actual
- **GET** `/api/tenant/{id}` - Obtiene datos de un tenant específico

### CORS

Asegúrate de configurar CORS en tu backend Laravel para permitir peticiones desde el frontend:

```php
// config/cors.php
'paths' => ['api/*'],
'allowed_origins' => ['http://localhost:5173'],
```

## Componentes Principales

### Header.vue
- Logo y nombre del tenant
- Menú de navegación responsive
- Menú hamburguesa para móviles
- Colores dinámicos según tenant

### Footer.vue
- Información de contacto
- Enlaces rápidos
- Redes sociales
- Copyright dinámico

### Card.vue
- Componente reutilizable para mostrar contenido
- Soporte para imagen, título y descripción
- Slots para contenido personalizado

## Vistas

### Home.vue
- Banner principal
- Mensaje institucional
- Sección "Qué ofrecemos"
- Accesos rápidos

### Sobre.vue
- Historia de la facultad
- Misión y visión
- Organigrama

### Programas.vue
- Lista de programas académicos
- Detalles de cada programa
- Enlaces a malla curricular

### Autoridades.vue
- Listado de autoridades
- Información de contacto
- Fotos y cargos

### Documentos.vue
- Documentos institucionales
- Filtros por categoría
- Enlaces de descarga

## Personalización de Colores

Los colores se configuran automáticamente desde el backend, pero puedes ajustar los valores por defecto en [src/store/tenant.js:8](src/store/tenant.js#L8):

```javascript
primaryColor: (state) => state.tenant?.color_primario || '#3b82f6',
secondaryColor: (state) => state.tenant?.color_secundario || '#1e40af',
```

## Responsive Design

El diseño está optimizado para:
- **Móvil**: < 480px
- **Tablet**: 480px - 768px
- **Desktop**: > 768px

## Build para Producción

```bash
npm run build
```

Los archivos optimizados se generarán en la carpeta `dist/`.

## Despliegue

Puedes desplegar en:
- Netlify
- Vercel
- GitHub Pages
- Servidor web tradicional (Apache, Nginx)

### Ejemplo de configuración Nginx

```nginx
server {
    listen 80;
    server_name tu-dominio.com;
    root /ruta/a/dist;
    index index.html;

    location / {
        try_files $uri $uri/ /index.html;
    }
}
```

## Roadmap

- [ ] Sistema de autenticación
- [ ] Panel de administración
- [ ] Gestión de noticias y eventos
- [ ] Galería de imágenes
- [ ] Sistema de mensajería
- [ ] Modo oscuro

## Licencia

Este proyecto está bajo licencia MIT.

## Soporte

Para reportar bugs o solicitar características, crea un issue en el repositorio.
