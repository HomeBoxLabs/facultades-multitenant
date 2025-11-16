# 📱 Frontend - Sistema Multi-Tenant

## 🎯 Resumen

Frontend moderno desarrollado con **Vue.js 3 + Vite** para sistema multi-tenant de facultades universitarias.

---

## ⚡ Inicio Rápido

```bash
cd multi-tenant-frontend
npm install
npm run dev
```

Abre: http://localhost:5173

---

## 🎨 Características

### ✅ Diseño Moderno
- Fuente profesional "Inter" (Google Fonts)
- Iconos Font Awesome 6.5.1
- Animaciones suaves CSS
- Gradientes dinámicos
- Sombras modernas

### ✅ Responsive
- Mobile: < 480px
- Tablet: 480px - 768px
- Desktop: > 768px

### ✅ Colores Dinámicos
Los colores cambian automáticamente según la facultad:
- **Ingeniería**: Azul (#3b82f6)
- **Economía**: Verde (#10b981)

---

## 📁 Estructura

```
multi-tenant-frontend/
├── src/
│   ├── components/          # Componentes reutilizables
│   │   ├── Header.vue      # Header con menú
│   │   ├── Footer.vue      # Footer con redes sociales
│   │   └── Card.vue        # Tarjetas
│   ├── views/              # Páginas
│   │   ├── Home.vue        # Inicio
│   │   ├── Sobre.vue       # Sobre nosotros
│   │   ├── Programas.vue   # Programas académicos
│   │   ├── Autoridades.vue # Autoridades
│   │   └── Documentos.vue  # Documentos
│   ├── router/             # Vue Router
│   ├── store/              # Pinia (estado)
│   │   └── tenant.js       # Store del tenant
│   ├── App.vue             # Componente principal
│   ├── main.js             # Entry point
│   └── style.css           # Estilos globales
├── index.html
├── .env                     # Variables de entorno
└── package.json
```

---

## 🔧 Configuración

### Variables de Entorno (.env)

```env
VITE_API_URL=http://localhost:8000/api
```

---

## 🎨 Componentes

### Header
- Gradiente dinámico con colores del tenant
- Logo animado (rota al hover)
- Menú hamburguesa responsive
- Enlaces con efectos hover

### Footer
- Gradiente invertido
- Línea superior con shimmer
- Enlaces con flecha animada
- Iconos sociales con lift effect

### Card
- Lift effect al hover
- Imágenes con zoom + rotación
- Título con línea animada
- Footer con cambio de color

---

## 🌐 Rutas

| Ruta | Componente | Descripción |
|------|-----------|-------------|
| `/` | Home.vue | Página de inicio |
| `/sobre` | Sobre.vue | Historia, misión, visión |
| `/programas` | Programas.vue | Programas académicos |
| `/autoridades` | Autoridades.vue | Directorio |
| `/documentos` | Documentos.vue | Documentos |

---

## 🔄 Cambiar de Facultad

### Por URL:
```
http://localhost:5173?tenant_id=1          # Ingeniería
http://localhost:5173?tenant_id=2          # Economía
http://localhost:5173?facultad=ingenieria  # Por subdominio
```

### Programáticamente:
```javascript
import { useTenantStore } from './store/tenant'

const tenantStore = useTenantStore()
await tenantStore.fetchTenant(2)  // Cambiar a facultad ID 2
```

---

## 🎨 Sistema de Colores

### Variables CSS Dinámicas:
```css
:root {
  --color-primary: #3b82f6;      /* Del tenant */
  --color-secondary: #1e40af;    /* Del tenant */
  --color-accent: #60a5fa;       /* Del tenant */

  /* Fijas */
  --color-text: #0f172a;
  --color-text-light: #64748b;
  --color-bg: #ffffff;
  --color-bg-light: #f8fafc;
}
```

Los colores se actualizan automáticamente cuando cambia el tenant.

---

## 💫 Animaciones

### Disponibles:
- `fadeIn` - Aparición
- `fadeInUp` - Desde abajo
- `fadeInDown` - Desde arriba
- `slideInLeft` - Desde izquierda
- `slideInRight` - Desde derecha
- `scaleIn` - Con bounce
- `float` - Flotación
- `shimmer` - Brillo

### Uso:
```vue
<div class="fade-in-up">Contenido</div>
```

---

## 📱 Responsive

### Breakpoints:
```css
/* Mobile */
@media (max-width: 480px) { }

/* Tablet */
@media (max-width: 768px) { }

/* Desktop */
@media (min-width: 769px) { }
```

---

## 🚀 Build para Producción

```bash
npm run build      # Crear build
npm run preview    # Preview del build
```

Build se genera en carpeta `dist/`

---

## 🔍 Comandos Útiles

```bash
npm run dev        # Desarrollo
npm run build      # Producción
npm run preview    # Preview
npm install        # Instalar deps
```

---

## 💡 Tips

### Agregar nueva página:
1. Crear vista en `src/views/MiVista.vue`
2. Agregar ruta en `src/router/index.js`
3. Agregar enlace en Header o navegación

### Usar datos del tenant:
```vue
<script setup>
import { computed } from 'vue'
import { useTenantStore } from '../store/tenant'

const tenantStore = useTenantStore()
const nombre = computed(() => tenantStore.tenantName)
const logo = computed(() => tenantStore.tenantLogo)
</script>
```

### Aplicar animación:
```vue
<template>
  <div class="fade-in-up delay-2">
    Contenido animado
  </div>
</template>
```

---

## ⚠️ Troubleshooting

### Página muestra "Cargando..." indefinidamente
1. Verifica que el backend esté corriendo
2. Abre consola del navegador (F12)
3. Verifica la URL de la API en `.env`

### Colores no cambian
1. Verifica que el tenant tenga colores en BD
2. Abre DevTools > Elements > :root
3. Busca variables `--color-primary`

### Error de CORS
1. Verifica que backend esté en puerto 8000
2. Limpia caché del backend: `php artisan config:clear`

---

## 📊 Estadísticas

- **~1,540 líneas** de CSS moderno
- **11 animaciones** creadas
- **35+ variables CSS**
- **5 componentes** principales
- **5 vistas** completas
- **100% responsive**

---

**¡Frontend moderno y profesional! ✨**
