<template>
  <header class="header" :style="{ backgroundColor: primaryColor }">
    <div class="container">
      <div class="header-content">
        <!-- Logo y Nombre -->
        <router-link to="/" class="brand">
          <img v-if="tenantLogo" :src="tenantLogo" :alt="tenantName" class="logo" />
          <span class="brand-name">{{ tenantName }}</span>
        </router-link>

        <!-- Toggle del menú móvil -->
        <button class="menu-toggle" @click="toggleMenu" aria-label="Toggle menu">
          <span class="hamburger" :class="{ active: isMenuOpen }"></span>
        </button>

        <!-- Navegación -->
        <nav class="nav" :class="{ active: isMenuOpen }">
          <router-link
            v-for="item in menuItems"
            :key="item.path"
            :to="item.path"
            class="nav-link"
            @click="closeMenu"
          >
            {{ item.label }}
          </router-link>
        </nav>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useTenantStore } from '../store/tenant'

const tenantStore = useTenantStore()
const isMenuOpen = ref(false)

// Datos del tenant
const tenantName = computed(() => tenantStore.tenantName)
const tenantLogo = computed(() => tenantStore.tenantLogo)
const primaryColor = computed(() => tenantStore.primaryColor)

// Menú por defecto o del tenant
const menuItems = computed(() => {
  if (tenantStore.tenantMenu && tenantStore.tenantMenu.length > 0) {
    return tenantStore.tenantMenu
  }
  // Menú por defecto
  return [
    { label: 'Inicio', path: '/' },
    { label: 'Sobre Nosotros', path: '/sobre' },
    { label: 'Programas', path: '/programas' },
    { label: 'Autoridades', path: '/autoridades' },
    { label: 'Documentos', path: '/documentos' }
  ]
})

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}

const closeMenu = () => {
  isMenuOpen.value = false
}
</script>

<style scoped>
.header {
  position: sticky;
  top: 0;
  z-index: 1000;
  background: linear-gradient(135deg, var(--color-primary, #3b82f6) 0%, var(--color-secondary, #1e40af) 100%);
  backdrop-filter: blur(10px);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
  animation: slideInDown 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  transition: box-shadow 0.3s ease;
}

.header:hover {
  box-shadow: 0 6px 28px rgba(0, 0, 0, 0.18);
}

.container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

.header-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1.25rem 0;
  gap: 2rem;
}

.brand {
  display: flex;
  align-items: center;
  gap: 1rem;
  text-decoration: none;
  color: white;
  font-weight: 700;
  font-size: 1.5rem;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  animation: fadeInLeft 0.6s ease-out;
}

.brand:hover {
  transform: scale(1.05);
  filter: brightness(1.1);
}

.brand::before {
  content: '';
  position: absolute;
  inset: -8px;
  background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
  border-radius: 50%;
  opacity: 0;
  transition: opacity 0.3s ease;
  pointer-events: none;
}

.brand:hover::before {
  opacity: 1;
}

.logo {
  height: 56px;
  width: auto;
  object-fit: contain;
  filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.2));
  transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.brand:hover .logo {
  transform: rotate(-5deg) scale(1.1);
}

.brand-name {
  font-size: 1.25rem;
  font-weight: 700;
  letter-spacing: -0.02em;
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

/* Menú toggle (hamburguesa) */
.menu-toggle {
  display: none;
  background: rgba(255, 255, 255, 0.15);
  border: none;
  cursor: pointer;
  padding: 0.75rem;
  border-radius: 12px;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  backdrop-filter: blur(5px);
}

.menu-toggle:hover {
  background: rgba(255, 255, 255, 0.25);
  transform: scale(1.05);
}

.menu-toggle:active {
  transform: scale(0.95);
}

.hamburger {
  display: block;
  width: 28px;
  height: 2.5px;
  background: white;
  position: relative;
  transition: background 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border-radius: 2px;
}

.hamburger::before,
.hamburger::after {
  content: '';
  position: absolute;
  width: 28px;
  height: 2.5px;
  background: white;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  border-radius: 2px;
}

.hamburger::before {
  top: -9px;
}

.hamburger::after {
  bottom: -9px;
}

.hamburger.active {
  background: transparent;
}

.hamburger.active::before {
  top: 0;
  transform: rotate(45deg);
}

.hamburger.active::after {
  bottom: 0;
  transform: rotate(-45deg);
}

/* Navegación */
.nav {
  display: flex;
  gap: 0.5rem;
  align-items: center;
  animation: fadeInRight 0.6s ease-out;
}

.nav-link {
  color: white;
  text-decoration: none;
  font-size: 1rem;
  font-weight: 500;
  padding: 0.75rem 1.25rem;
  position: relative;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border-radius: 10px;
  letter-spacing: 0.01em;
}

.nav-link::before {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(255, 255, 255, 0.15);
  border-radius: 10px;
  opacity: 0;
  transform: scale(0.8);
  transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.nav-link:hover::before {
  opacity: 1;
  transform: scale(1);
}

.nav-link::after {
  content: '';
  position: absolute;
  bottom: 6px;
  left: 50%;
  transform: translateX(-50%);
  width: 0;
  height: 3px;
  background: white;
  border-radius: 10px;
  transition: width 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
}

.nav-link:hover::after,
.nav-link.router-link-active::after {
  width: 70%;
}

.nav-link:hover {
  transform: translateY(-2px);
  text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.nav-link.router-link-active {
  font-weight: 600;
  background: rgba(255, 255, 255, 0.15);
}

/* Responsive */
@media (max-width: 768px) {
  .menu-toggle {
    display: block;
    z-index: 1001;
  }

  .nav {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: linear-gradient(180deg, var(--color-primary, #3b82f6) 0%, var(--color-secondary, #1e40af) 100%);
    flex-direction: column;
    gap: 0;
    padding: 0;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
  }

  .nav.active {
    max-height: 500px;
    animation: slideInDown 0.4s ease-out;
  }

  .nav-link {
    width: 100%;
    padding: 1.25rem 2rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 0;
    animation: fadeInUp 0.3s ease-out backwards;
  }

  .nav-link:nth-child(1) { animation-delay: 0.05s; }
  .nav-link:nth-child(2) { animation-delay: 0.1s; }
  .nav-link:nth-child(3) { animation-delay: 0.15s; }
  .nav-link:nth-child(4) { animation-delay: 0.2s; }
  .nav-link:nth-child(5) { animation-delay: 0.25s; }

  .nav-link:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateX(8px);
  }

  .nav-link::before {
    display: none;
  }

  .nav-link::after {
    display: none;
  }

  .brand-name {
    font-size: 1.125rem;
  }

  .logo {
    height: 48px;
  }

  .header-content {
    padding: 1rem 0;
  }
}

@media (max-width: 480px) {
  .brand-name {
    font-size: 0.95rem;
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .logo {
    height: 42px;
  }

  .container {
    padding: 0 1rem;
  }

  .nav-link {
    padding: 1rem 1.5rem;
    font-size: 0.95rem;
  }
}

/* Animaciones */
@keyframes slideInDown {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    transform: translateX(-20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    transform: translateX(20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
