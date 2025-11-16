<template>
  <div class="autoridades">
    <!-- Encabezado -->
    <div class="page-header">
      <div class="container">
        <h1 class="page-title">Autoridades</h1>
        <p class="page-subtitle">Conoce a nuestro equipo directivo</p>
      </div>
    </div>

    <!-- Lista de Autoridades -->
    <section class="section">
      <div class="container">
        <div v-if="autoridades.length > 0" class="autoridades-grid">
          <div
            v-for="autoridad in autoridades"
            :key="autoridad.id"
            class="autoridad-card"
          >
            <div class="autoridad-image">
              <img
                v-if="autoridad.foto"
                :src="autoridad.foto"
                :alt="autoridad.nombre"
              />
              <div v-else class="avatar-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                  <circle cx="12" cy="7" r="4"/>
                </svg>
              </div>
            </div>

            <div class="autoridad-content">
              <h3 class="autoridad-cargo">{{ autoridad.cargo }}</h3>
              <h2 class="autoridad-nombre">{{ autoridad.nombre }}</h2>

              <div class="autoridad-info">
                <a
                  v-if="autoridad.email"
                  :href="`mailto:${autoridad.email}`"
                  class="info-item"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                  </svg>
                  {{ autoridad.email }}
                </a>

                <p v-if="autoridad.telefono" class="info-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                  </svg>
                  {{ autoridad.telefono }}
                </p>

                <p v-if="autoridad.oficina" class="info-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                  </svg>
                  {{ autoridad.oficina }}
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-else class="empty-state">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
          <p>No hay información de autoridades disponible en este momento.</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useTenantStore } from '../store/tenant'

const tenantStore = useTenantStore()

const autoridades = computed(() => tenantStore.autoridades)
</script>

<style scoped>
.autoridades {
  min-height: 100vh;
}

/* Page Header */
.page-header {
  background: linear-gradient(135deg, var(--color-primary, #3b82f6), var(--color-secondary, #1e40af));
  padding: 3rem 0;
  color: white;
  text-align: center;
}

.page-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin: 0 0 0.5rem 0;
}

.page-subtitle {
  font-size: 1.125rem;
  margin: 0;
  opacity: 0.95;
}

/* Sections */
.section {
  padding: 4rem 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

/* Autoridades Grid */
.autoridades-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 2rem;
}

.autoridad-card {
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  transition: transform 0.3s, box-shadow 0.3s;
}

.autoridad-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
}

.autoridad-image {
  width: 100%;
  height: 280px;
  background: linear-gradient(135deg, var(--color-primary, #3b82f6), var(--color-secondary, #1e40af));
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.autoridad-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.avatar-placeholder {
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  opacity: 0.6;
}

.autoridad-content {
  padding: 2rem;
}

.autoridad-cargo {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--color-primary, #3b82f6);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin: 0 0 0.5rem 0;
}

.autoridad-nombre {
  font-size: 1.375rem;
  font-weight: 700;
  color: #1f2937;
  margin: 0 0 1.5rem 0;
  line-height: 1.3;
}

.autoridad-info {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.info-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-size: 0.9rem;
  color: #6b7280;
  text-decoration: none;
  margin: 0;
  transition: color 0.3s;
}

.info-item svg {
  flex-shrink: 0;
  color: var(--color-primary, #3b82f6);
}

a.info-item:hover {
  color: var(--color-primary, #3b82f6);
}

/* Empty State */
.empty-state {
  text-align: center;
  padding: 4rem 2rem;
  color: #6b7280;
}

.empty-state svg {
  margin: 0 auto 1.5rem;
  opacity: 0.5;
}

.empty-state p {
  font-size: 1.125rem;
  margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
  .page-header {
    padding: 2rem 0;
  }

  .page-title {
    font-size: 1.75rem;
  }

  .page-subtitle {
    font-size: 1rem;
  }

  .section {
    padding: 3rem 0;
  }

  .autoridades-grid {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
  }

  .autoridad-image {
    height: 240px;
  }

  .autoridad-content {
    padding: 1.5rem;
  }

  .autoridad-nombre {
    font-size: 1.25rem;
  }
}

@media (max-width: 480px) {
  .page-header {
    padding: 1.5rem 0;
  }

  .page-title {
    font-size: 1.5rem;
  }

  .section {
    padding: 2rem 0;
  }

  .autoridades-grid {
    grid-template-columns: 1fr;
  }

  .autoridad-image {
    height: 200px;
  }

  .autoridad-content {
    padding: 1.25rem;
  }
}
</style>
