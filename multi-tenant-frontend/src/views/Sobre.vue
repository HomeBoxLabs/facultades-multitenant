<template>
  <div class="sobre">
    <!-- Encabezado -->
    <div class="page-header">
      <div class="container">
        <h1 class="page-title">Sobre Nosotros</h1>
      </div>
    </div>

    <!-- Historia -->
    <section class="section" v-if="historia">
      <div class="container">
        <div class="content-box">
          <h2 class="section-title">Nuestra Historia</h2>
          <p class="text-content">{{ historia }}</p>
        </div>
      </div>
    </section>

    <!-- Misión y Visión -->
    <section class="section bg-light">
      <div class="container">
        <div class="mission-vision-grid">
          <!-- Misión -->
          <div class="content-card" v-if="mision">
            <div class="card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 6 12 12 16 14"/>
              </svg>
            </div>
            <h2 class="card-title">Misión</h2>
            <p class="card-text">{{ mision }}</p>
          </div>

          <!-- Visión -->
          <div class="content-card" v-if="vision">
            <div class="card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
            </div>
            <h2 class="card-title">Visión</h2>
            <p class="card-text">{{ vision }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Organigrama -->
    <section class="section" v-if="organigrama">
      <div class="container">
        <h2 class="section-title">Organigrama</h2>
        <div class="organigrama-container">
          <img :src="organigrama" alt="Organigrama" class="organigrama-image" />
        </div>
      </div>
    </section>

    <!-- Mensaje si no hay datos -->
    <section class="section" v-if="!hasContent">
      <div class="container">
        <div class="empty-state">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="8" x2="12" y2="12"/>
            <line x1="12" y1="16" x2="12.01" y2="16"/>
          </svg>
          <p>La información institucional estará disponible próximamente.</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useTenantStore } from '../store/tenant'

const tenantStore = useTenantStore()

const historia = computed(() => tenantStore.historia)
const mision = computed(() => tenantStore.mision)
const vision = computed(() => tenantStore.vision)
const organigrama = computed(() => tenantStore.organigrama)

const hasContent = computed(() => {
  return historia.value || mision.value || vision.value || organigrama.value
})
</script>

<style scoped>
.sobre {
  min-height: 100vh;
}

/* Page Header */
.page-header {
  background: linear-gradient(135deg, var(--color-primary, #3b82f6), var(--color-secondary, #1e40af));
  padding: 3rem 0;
  color: white;
}

.page-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin: 0;
  text-align: center;
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

/* Content Box */
.content-box {
  max-width: 900px;
  margin: 0 auto;
  background: white;
  padding: 2.5rem;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.text-content {
  font-size: 1.0625rem;
  line-height: 1.8;
  color: #4b5563;
  margin: 0;
  white-space: pre-line;
}

/* Mission & Vision Grid */
.mission-vision-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
}

.content-card {
  background: white;
  padding: 2.5rem;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  text-align: center;
  transition: transform 0.3s;
}

.content-card:hover {
  transform: translateY(-4px);
}

.card-icon {
  width: 64px;
  height: 64px;
  margin: 0 auto 1.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, var(--color-primary, #3b82f6), var(--color-secondary, #1e40af));
  border-radius: 50%;
  color: white;
}

.card-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: #1f2937;
  margin: 0 0 1rem 0;
}

.card-text {
  font-size: 1rem;
  line-height: 1.8;
  color: #4b5563;
  margin: 0;
}

/* Organigrama */
.organigrama-container {
  max-width: 100%;
  background: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  overflow-x: auto;
}

.organigrama-image {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 4px;
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

  .section {
    padding: 3rem 0;
  }

  .section-title {
    font-size: 1.5rem;
  }

  .content-box {
    padding: 2rem 1.5rem;
  }

  .text-content {
    font-size: 1rem;
  }

  .mission-vision-grid {
    grid-template-columns: 1fr;
  }

  .content-card {
    padding: 2rem 1.5rem;
  }

  .organigrama-container {
    padding: 1rem;
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

  .content-box {
    padding: 1.5rem 1rem;
  }

  .content-card {
    padding: 1.5rem 1rem;
  }
}
</style>
