<template>
  <header
    id="header"
    class="header d-flex align-items-center fixed-top"
    :class="{ 'menu-open': menuOpen }"
  >
    <div
      class="container position-relative d-flex align-items-center justify-content-between"
    >
      <!-- Logo -->
      <router-link
        to="/"
        class="logo d-flex align-items-center me-auto me-xl-0"
      >
        <img src="/logos/UNALOGO.png" alt="Ir al inicio" />
      </router-link>

      <!-- Desktop Navigation -->
      <nav class="desktop-nav d-none d-lg-flex">
        <ul class="nav-list">
          <li
            v-for="item in menu.length > 0 ? menu : defaultMenu"
            :key="item.path"
          >
            <router-link :to="item.path">{{ item.label }}</router-link>
          </li>
        </ul>
      </nav>

      <!-- Hamburger Button -->
      <button
        class="hamburger-btn"
        :class="{ active: menuOpen }"
        @click="toggleMenu"
        aria-label="Toggle menu"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

    <!-- Mobile Overlay -->
    <div
      class="mobile-overlay"
      :class="{ active: menuOpen }"
      @click="closeMenu"
    ></div>

    <!-- Mobile Sidebar Menu -->
    <aside class="mobile-sidebar" :class="{ active: menuOpen }">
      <!-- Sidebar Header -->
      <div class="sidebar-header">
        <div class="sidebar-brand">
          <img src="/logos/UNALOGO.png" alt="Logo" />
          <span>Menú</span>
        </div>
        <button class="close-btn" @click="closeMenu" aria-label="Cerrar menú">
          <i class="bi bi-x-lg"></i>
        </button>
      </div>

      <!-- Sidebar Navigation -->
      <nav class="sidebar-nav">
        <ul class="sidebar-menu">
          <li
            v-for="item in menu.length > 0 ? menu : defaultMenu"
            :key="item.path"
          >
            <router-link :to="item.path" @click="closeMenu">
              {{ item.label }}
            </router-link>
          </li>
        </ul>
      </nav>

      <!-- Sidebar Footer -->
      <div class="sidebar-footer">
        <div class="contact-info">
          <p><i class="bi bi-envelope"></i> contacto@una.edu.py</p>
          <p><i class="bi bi-telephone"></i> +595 21 585 588</p>
        </div>
      </div>
    </aside>
  </header>
</template>

<script setup>
import { ref, onUnmounted } from "vue";
import { useTenant } from "@/composables/useTenant";

const { menu } = useTenant();
const menuOpen = ref(false);

// Menú por defecto mientras carga el tenant
const defaultMenu = [
  { label: "Inicio", path: "/" },
  { label: "Sobre Nosotros", path: "/sobre-nosotros" },
  { label: "Programas", path: "/programas" },
  { label: "Autoridades", path: "/autoridades" },
  { label: "Documentos", path: "/documentos" },
];

const toggleMenu = () => {
  menuOpen.value = !menuOpen.value;
  // Prevent body scroll when menu is open
  document.body.style.overflow = menuOpen.value ? "hidden" : "";
};

const closeMenu = () => {
  menuOpen.value = false;
  document.body.style.overflow = "";
};

// Cleanup on component unmount
onUnmounted(() => {
  document.body.style.overflow = "";
});
</script>

<style scoped>
/* Header Base */
.header {
  background-color: rgba(255, 255, 255, 0.96);
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.logo img {
  transform: scale(2.2);
  transform-origin: left center;
  transition: transform 0.3s ease;
}

/* Desktop Navigation - Solo visible en pantallas grandes */
.desktop-nav {
  display: none;
}

@media (min-width: 992px) {
  .desktop-nav {
    display: flex;
  }
}

.desktop-nav .nav-list {
  display: flex;
  gap: 2rem;
  list-style: none;
  margin: 0;
  padding: 0;
  align-items: center;
}

.desktop-nav .nav-list li a {
  text-decoration: none;
  color: var(--nav-color);
  font-weight: 600;
  font-size: 15px;
  font-family: var(--nav-font);
  padding: 0.5rem 0;
  position: relative;
  transition: color 0.3s ease;
}

.desktop-nav .nav-list li a::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 3px;
  background: var(--accent-color);
  transition: width 0.3s ease;
}

.desktop-nav .nav-list li a:hover,
.desktop-nav .nav-list li a.router-link-active {
  color: var(--accent-color);
}

.desktop-nav .nav-list li a:hover::after,
.desktop-nav .nav-list li a.router-link-active::after {
  width: 100%;
}

/* Hamburger Button - Solo visible en tablets y móviles */
.hamburger-btn {
  display: flex;
  flex-direction: column;
  gap: 5px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px;
  z-index: 1001;
  transition: all 0.3s ease;
}

/* Ocultar hamburguesa cuando el menú está abierto */
.hamburger-btn.active {
  opacity: 0;
  pointer-events: none;
}

@media (min-width: 992px) {
  .hamburger-btn {
    display: none;
  }
}

.hamburger-btn span {
  width: 28px;
  height: 3px;
  background: var(--nav-color);
  border-radius: 3px;
  transition: all 0.3s ease;
}

/* Mobile Overlay */
.mobile-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.6);
  backdrop-filter: blur(4px);
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
  z-index: 998;
}

.mobile-overlay.active {
  opacity: 1;
  visibility: visible;
}

/* Mobile Sidebar - Solo en tablets y móviles */
.mobile-sidebar {
  position: fixed;
  top: 0;
  left: -100%;
  width: 75%;
  max-width: 400px;
  height: 100vh;
  background: var(--surface-color);
  box-shadow: 5px 0 30px rgba(0, 0, 0, 0.2);
  transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: 999;
  display: flex;
  flex-direction: column;
  overflow-y: auto;
}

.mobile-sidebar.active {
  left: 0;
}

@media (min-width: 992px) {
  .mobile-sidebar,
  .mobile-overlay {
    display: none !important;
  }
}

/* Sidebar Header */
.sidebar-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.5rem;
  border-bottom: 1px solid
    color-mix(in srgb, var(--default-color), transparent 90%);
  background: linear-gradient(
    135deg,
    color-mix(in srgb, var(--accent-color), transparent 95%),
    var(--surface-color)
  );
  position: sticky;
  top: 0;
  z-index: 10;
}

.sidebar-brand {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.sidebar-brand img {
  height: 40px;
  width: auto;
}

.sidebar-brand span {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.close-btn {
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px;
  font-size: 1.5rem;
  color: var(--default-color);
  transition: color 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 8px;
  width: 40px;
  height: 40px;
}

.close-btn:hover {
  color: var(--accent-color);
}

/* Sidebar Navigation */
.sidebar-nav {
  flex: 1;
  overflow-y: auto;
}

.sidebar-menu {
  list-style: none;
  padding: 1rem 0;
  margin: 0;
}

.sidebar-menu li {
  margin: 0;
}

.sidebar-menu li a {
  display: block;
  padding: 1rem 1.5rem;
  text-decoration: none;
  color: var(--default-color);
  font-weight: 500;
  font-size: 1rem;
  transition: all 0.3s ease;
  position: relative;
}

.sidebar-menu li a::before {
  content: "";
  position: absolute;
  right: 0;
  top: 0;
  bottom: 0;
  width: 4px;
  background: var(--accent-color);
  transform: scaleY(0);
  transition: transform 0.3s ease;
}

.sidebar-menu li a:hover,
.sidebar-menu li a.router-link-active {
  background: color-mix(in srgb, var(--accent-color), transparent 95%);
  color: var(--accent-color);
}

.sidebar-menu li a:hover::before,
.sidebar-menu li a.router-link-active::before {
  transform: scaleY(1);
}

/* Sidebar Footer */
.sidebar-footer {
  padding: 1.5rem;
  border-top: 1px solid
    color-mix(in srgb, var(--default-color), transparent 90%);
  background: color-mix(in srgb, var(--default-color), transparent 97%);
  margin-top: auto;
}

.contact-info {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.contact-info p {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  margin: 0;
  font-size: 0.875rem;
  color: var(--default-color);
}

.contact-info i {
  color: var(--accent-color);
  font-size: 1rem;
}

/* Responsive */
@media (max-width: 576px) {
  .mobile-sidebar {
    width: 85%;
  }

  .logo img {
    transform: scale(1.8);
  }

  .sidebar-brand img {
    height: 35px;
  }

  .sidebar-brand span {
    font-size: 1.125rem;
  }

  .sidebar-menu li a {
    padding: 0.875rem 1.25rem;
    font-size: 0.95rem;
  }
}

/* Animation */
@keyframes slideInLeft {
  from {
    transform: translateX(-100%);
  }
  to {
    transform: translateX(0);
  }
}
</style>
