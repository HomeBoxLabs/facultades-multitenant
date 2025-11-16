<template>
  <div class="programas">
    <!-- Encabezado -->
    <div class="page-header">
      <div class="container">
        <h1 class="page-title">Programas Académicos</h1>
        <p class="page-subtitle">Conoce nuestra oferta académica</p>
      </div>
    </div>

    <!-- Lista de Programas -->
    <section class="section">
      <div class="container">
        <div v-if="programas.length > 0" class="programas-grid">
          <div
            v-for="programa in programas"
            :key="programa.id"
            class="programa-card"
          >
            <div class="programa-header">
              <div class="programa-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                  <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                </svg>
              </div>
              <h2 class="programa-title">{{ programa.nombre }}</h2>
            </div>

            <div class="programa-content">
              <div class="programa-section" v-if="programa.descripcion">
                <h3 class="section-subtitle">Descripción</h3>
                <p class="section-text">{{ programa.descripcion }}</p>
              </div>

              <div class="programa-section" v-if="programa.perfil_egresado">
                <h3 class="section-subtitle">Perfil del Egresado</h3>
                <p class="section-text">{{ programa.perfil_egresado }}</p>
              </div>

              <div class="programa-section" v-if="programa.campo_laboral">
                <h3 class="section-subtitle">Campo Laboral</h3>
                <p class="section-text">{{ programa.campo_laboral }}</p>
              </div>

              <div class="programa-section" v-if="programa.duracion">
                <h3 class="section-subtitle">Duración</h3>
                <p class="section-text">{{ programa.duracion }}</p>
              </div>

              <!-- Malla Curricular -->
              <div class="programa-footer" v-if="programa.malla_curricular">
                <a
                  :href="programa.malla_curricular"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="btn-malla"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                    <polyline points="10 9 9 9 8 9"/>
                  </svg>
                  Ver Malla Curricular
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-else class="empty-state">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
          </svg>
          <p>No hay programas académicos disponibles en este momento.</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useTenantStore } from '../store/tenant'

const tenantStore = useTenantStore()

const programas = computed(() => tenantStore.programas)
</script>

<style scoped>
.programas {
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

/* Programas Grid */
.programas-grid {
  display: grid;
  gap: 2rem;
}

.programa-card {
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  transition: transform 0.3s, box-shadow 0.3s;
}

.programa-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
}

.programa-header {
  background: linear-gradient(135deg, var(--color-primary, #3b82f6), var(--color-secondary, #1e40af));
  padding: 2rem;
  color: white;
  display: flex;
  align-items: center;
  gap: 1rem;
}

.programa-icon {
  width: 48px;
  height: 48px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  flex-shrink: 0;
}

.programa-title {
  font-size: 1.5rem;
  font-weight: 700;
  margin: 0;
  flex: 1;
}

.programa-content {
  padding: 2rem;
}

.programa-section {
  margin-bottom: 1.5rem;
}

.programa-section:last-child {
  margin-bottom: 0;
}

.section-subtitle {
  font-size: 1.125rem;
  font-weight: 600;
  color: #1f2937;
  margin: 0 0 0.5rem 0;
}

.section-text {
  font-size: 1rem;
  line-height: 1.7;
  color: #4b5563;
  margin: 0;
  white-space: pre-line;
}

.programa-footer {
  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 1px solid #e5e7eb;
}

.btn-malla {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem 1.5rem;
  background: linear-gradient(135deg, var(--color-primary, #3b82f6), var(--color-secondary, #1e40af));
  color: white;
  text-decoration: none;
  border-radius: 6px;
  font-weight: 500;
  transition: all 0.3s;
}

.btn-malla:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
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

  .programas-grid {
    gap: 1.5rem;
  }

  .programa-header {
    padding: 1.5rem;
    flex-direction: column;
    text-align: center;
  }

  .programa-title {
    font-size: 1.25rem;
  }

  .programa-content {
    padding: 1.5rem;
  }

  .section-subtitle {
    font-size: 1rem;
  }

  .section-text {
    font-size: 0.95rem;
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

  .programa-header {
    padding: 1.25rem;
  }

  .programa-content {
    padding: 1.25rem;
  }

  .btn-malla {
    width: 100%;
    justify-content: center;
  }
}
</style>
