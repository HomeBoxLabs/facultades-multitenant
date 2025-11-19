# 🚀 INSTRUCCIONES DE INSTALACIÓN - Frontend OTI

## ✅ Proyecto Completado

Se ha migrado exitosamente el proyecto de **JavaScript Vanilla** a **Vue.js 3 + Vite** manteniendo:
- ✅ Todos los estilos (Bootstrap + CSS custom)
- ✅ Todas las funcionalidades
- ✅ Diseño responsive
- ✅ Animaciones y efectos
- ✅ Modales y videos de YouTube

---

## 📦 PASO 1: Instalar Dependencias

Abre una terminal en la carpeta del proyecto y ejecuta:

```bash
cd "f:\PROYECTO IDE\AAA Proyectos ALD\PracticasSuge\frontend-oti"
npm install
```

Esto instalará:
- Vue 3
- Vite
- Bootstrap 5
- Bootstrap Icons
- AOS (animaciones)
- GLightbox (galería)
- Swiper (carruseles)

---

## 🎯 PASO 2: Ejecutar el Proyecto

### Modo Desarrollo (con Hot Reload)

```bash
npm run dev
```

El navegador se abrirá automáticamente en: **http://localhost:3000**

### Build para Producción

```bash
npm run build
```

Los archivos optimizados se crearán en la carpeta `dist/`

---

## 📁 Estructura del Proyecto

```
frontend-oti/
├── public/
│   └── assets/
│       ├── img/
│       │   ├── notis/         # Fotos de actividades
│       │   └── pers/          # Fotos del personal
│       └── res/               # Recursos (oti-1.jpg, etc.)
│
├── src/
│   ├── assets/
│   │   └── css/
│   │       ├── main.css       # Estilos principales
│   │       └── menu.css       # Estilos del menú
│   │
│   ├── components/
│   │   ├── layout/
│   │   │   ├── AppHeader.vue       # Navegación
│   │   │   ├── AppFooter.vue       # Pie de página
│   │   │   └── ScrollToTop.vue     # Botón scroll
│   │   │
│   │   ├── sections/
│   │   │   ├── HeroSection.vue     # Sección principal ⭐
│   │   │   ├── NoticiasSection.vue # Actividades OTI
│   │   │   ├── ServiciosSection.vue# Servicios estudiantes
│   │   │   └── TeamSection.vue     # Plana directiva
│   │   │
│   │   └── ui/
│   │       ├── VideoModal.vue      # Videos YouTube
│   │       └── FirmaUNAModal.vue   # Modal FirmaUNA
│   │
│   ├── composables/
│   │   ├── useModal.js        # Lógica de modales
│   │   ├── useScroll.js       # Scroll tracking
│   │   └── useAnimations.js   # AOS + GLightbox
│   │
│   ├── App.vue                # Componente raíz
│   └── main.js                # Entry point
│
├── index.html                 # HTML principal
├── vite.config.js            # Configuración Vite
└── package.json              # Dependencias
```

---

## 🎨 Componentes Principales

### 1. **HeroSection.vue** (La más importante)
- Título principal de OTI
- Badge con logo UNAP
- Botones de video (Intro OTI, Tutorial Firma Digital)
- Imagen destacada
- 3 Feature boxes (Servicios Estudiantes, Docentes, Soporte)

### 2. **AppHeader.vue**
- Logo OTI
- Navegación responsive
- Mega-menu dropdown de 2 columnas (Unidades)
- Links a: Inicio, Reseña Histórica, Servicios, Cursos, FirmaUNA, Normas legales
- Botón "Noticias OTI"

### 3. **NoticiasSection.vue**
- Galería de imágenes de actividades
- Texto descriptivo
- Botón "Ver más"

### 4. **ServiciosSection.vue**
- Campus Virtual
- Correo institucional
- Descargar FUT

### 5. **TeamSection.vue**
- Cards del Jefe de OTI y equipo
- Fotos y cargos
- Redes sociales (overlay en hover)

---

## 🔧 Tecnologías Usadas

| Tecnología | Versión | Uso |
|-----------|---------|-----|
| Vue.js | 3.x | Framework principal |
| Vite | 6.x | Build tool |
| Bootstrap | 5.x | Estilos y grid |
| Bootstrap Icons | 1.x | Iconografía |
| AOS | 2.x | Animaciones scroll |
| GLightbox | 3.x | Galería de imágenes |
| Swiper | 11.x | Carruseles |
| Font Awesome | 4.7 | Iconos adicionales |

---

## 🌐 Funcionalidades Implementadas

✅ **Navegación Responsive**
- Menú hamburguesa en móvil
- Mega-menu dropdown en desktop

✅ **Video Modals**
- Modal para videos de YouTube
- 4 videos disponibles (OTI, FirmaUNA, Linux, Mac)
- Cierre con overlay o botón X

✅ **FirmaUNA Modal**
- Se abre automáticamente al cargar la página
- Descarga para Windows, Linux, MacOS
- Links a tutoriales en video

✅ **Animaciones AOS**
- Efectos fade-up, zoom-in
- Se activan al hacer scroll

✅ **Scroll to Top**
- Botón que aparece después de 100px de scroll
- Animación smooth

✅ **Responsive Images**
- Imágenes optimizadas
- Lazy loading

---

## 🐛 Resolución de Problemas

### Error: "Cannot find module '@/components/...'"
**Solución:** Asegúrate de que el alias `@` está configurado en `vite.config.js`

### Las imágenes no se muestran
**Solución:** Verifica que las imágenes estén en `public/assets/img/` y `public/assets/res/`

### Los estilos no se aplican
**Solución:** Verifica que `main.css` y `menu.css` estén en `src/assets/css/`

### Error de Bootstrap
**Solución:** Ejecuta `npm install bootstrap bootstrap-icons`

---

## 📝 Modificar el Proyecto

### Cambiar colores
Edita las variables CSS en `src/assets/css/main.css` (líneas 14-40)

### Agregar nueva sección
1. Crea componente en `src/components/sections/`
2. Importa en `App.vue`
3. Agrega en la etiqueta `<main>`

### Modificar el menú
Edita `src/components/layout/AppHeader.vue`

---

## 🚀 Despliegue en Producción

### 1. Build
```bash
npm run build
```

### 2. Subir carpeta `dist/` al servidor

### 3. Configurar servidor web (ejemplo Nginx)
```nginx
server {
    listen 80;
    server_name oti.unap.edu.pe;
    root /var/www/frontend-oti/dist;
    index index.html;

    location / {
        try_files $uri $uri/ /index.html;
    }
}
```

---

## 📞 Soporte

**Desarrollado por:**
Subunidad de Gobierno Electrónico - OTI UNAP

**Año:** 2025

---

## ✨ ¡Listo para usar!

Ejecuta `npm run dev` y disfruta de tu nueva aplicación Vue.js 🎉
