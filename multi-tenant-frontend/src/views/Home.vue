<template>
  <div class="home">
    <!-- Banner principal -->
    <section class="hero" v-if="tenantBanner">
      <div class="hero-overlay">
        <img :src="tenantBanner" :alt="tenantName" class="hero-image" />
        <div class="hero-content">
          <h1 class="hero-title">{{ presentacion.titulo || tenantName }}</h1>
        </div>
      </div>
    </section>

    <!-- Mensaje institucional -->
    <section class="section" v-if="presentacion.texto">
      <div class="container">
        <div class="presentation">
          <h2 class="section-title">Bienvenidos</h2>
          <p class="presentation-text">{{ presentacion.texto }}</p>
        </div>
      </div>
    </section>

    <!-- Qué ofrecemos -->
    <section class="section bg-light" v-if="ofrecemos.length > 0">
      <div class="container">
        <h2 class="section-title">Qué Ofrecemos</h2>
        <div class="grid">
          <Card
            v-for="(item, index) in ofrecemos"
            :key="index"
            :title="item.titulo"
            :description="item.descripcion"
            :image="item.imagen"
          />
        </div>
      </div>
    </section>

    <!-- Accesos rápidos -->
    <section class="section">
      <div class="container">
        <h2 class="section-title">Accesos Rápidos</h2>
        <div class="quick-links">
          <router-link to="/programas" class="quick-link-card">
            <div class="quick-link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
              </svg>
            </div>
            <h3>Programas Académicos</h3>
            <p>Conoce nuestra oferta académica</p>
          </router-link>

          <router-link to="/autoridades" class="quick-link-card">
            <div class="quick-link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
              </svg>
            </div>
            <h3>Autoridades</h3>
            <p>Conoce a nuestras autoridades</p>
          </router-link>

          <router-link to="/documentos" class="quick-link-card">
            <div class="quick-link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="16" y1="13" x2="8" y2="13"/>
                <line x1="16" y1="17" x2="8" y2="17"/>
                <polyline points="10 9 9 9 8 9"/>
              </svg>
            </div>
            <h3>Documentos</h3>
            <p>Accede a documentos y normativas</p>
          </router-link>

          <a v-if="contacto.email" :href="`mailto:${contacto.email}`" class="quick-link-card">
            <div class="quick-link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
              </svg>
            </div>
            <h3>Contacto</h3>
            <p>Ponte en contacto con nosotros</p>
          </a>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useTenantStore } from '../store/tenant'
import Card from '../components/Card.vue'

const tenantStore = useTenantStore()

const tenantName = computed(() => tenantStore.tenantName)
const tenantBanner = computed(() => tenantStore.tenantBanner)
const presentacion = computed(() => tenantStore.presentacion)
const ofrecemos = computed(() => tenantStore.ofrecemos)
const contacto = computed(() => tenantStore.contacto)
</script>

<style scoped>
.home {
  min-height: 100vh;
}

/* Hero Section */
.hero {
  position: relative;
  width: 100%;
  height: 400px;
  overflow: hidden;
}

.hero-overlay {
  position: relative;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgba(59, 130, 246, 0.8), rgba(30, 64, 175, 0.8));
}

.hero-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.3;
}

.hero-content {
  position: relative;
  z-index: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  padding: 2rem;
  text-align: center;
}

.hero-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: white;
  margin: 0;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Sections */
.section {
  padding: 4rem 0;
}

.section.bg-light {
  background: #f9fafb;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

.section-title {
  font-size: 2rem;
  font-weight: 700;
  color: #1f2937;
  margin: 0 0 2rem 0;
  text-align: center;
}

/* Presentation */
.presentation {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

.presentation-text {
  font-size: 1.125rem;
  line-height: 1.8;
  color: #4b5563;
}

/* Grid */
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
}

/* Quick Links */
.quick-links {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
}

.quick-link-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 2rem 1.5rem;
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  text-decoration: none;
  color: inherit;
  transition: all 0.3s;
}

.quick-link-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
}

.quick-link-icon {
  width: 64px;
  height: 64px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, var(--color-primary, #3b82f6), var(--color-secondary, #1e40af));
  border-radius: 50%;
  color: white;
  margin-bottom: 1rem;
}

.quick-link-card h3 {
  font-size: 1.125rem;
  font-weight: 600;
  color: #1f2937;
  margin: 0 0 0.5rem 0;
}

.quick-link-card p {
  font-size: 0.9rem;
  color: #6b7280;
  margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
  .hero {
    height: 300px;
  }

  .hero-title {
    font-size: 1.75rem;
  }

  .section {
    padding: 3rem 0;
  }

  .section-title {
    font-size: 1.5rem;
  }

  .presentation-text {
    font-size: 1rem;
  }

  .grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }

  .quick-links {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 480px) {
  .hero {
    height: 250px;
  }

  .hero-title {
    font-size: 1.5rem;
  }

  .section {
    padding: 2rem 0;
  }
}
</style>
