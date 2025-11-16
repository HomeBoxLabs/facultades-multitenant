<template>
  <div class="documentos">
    <!-- Encabezado -->
    <div class="page-header">
      <div class="container">
        <h1 class="page-title">Documentos</h1>
        <p class="page-subtitle">Accede a documentos institucionales y normativas</p>
      </div>
    </div>

    <!-- Lista de Documentos -->
    <section class="section">
      <div class="container">
        <div v-if="documentos.length > 0">
          <!-- Filtros por categoría (opcional) -->
          <div class="filters" v-if="categorias.length > 1">
            <button
              @click="selectedCategoria = null"
              :class="['filter-btn', { active: selectedCategoria === null }]"
            >
              Todos
            </button>
            <button
              v-for="categoria in categorias"
              :key="categoria"
              @click="selectedCategoria = categoria"
              :class="['filter-btn', { active: selectedCategoria === categoria }]"
            >
              {{ categoria }}
            </button>
          </div>

          <!-- Grid de documentos -->
          <div class="documentos-grid">
            <a
              v-for="documento in documentosFiltrados"
              :key="documento.id"
              :href="documento.url"
              target="_blank"
              rel="noopener noreferrer"
              class="documento-card"
            >
              <div class="documento-icon">
                <svg
                  v-if="getFileType(documento.url) === 'pdf'"
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                  <polyline points="14 2 14 8 20 8"/>
                  <line x1="16" y1="13" x2="8" y2="13"/>
                  <line x1="16" y1="17" x2="8" y2="17"/>
                  <polyline points="10 9 9 9 8 9"/>
                </svg>
                <svg
                  v-else-if="getFileType(documento.url) === 'doc'"
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                  <polyline points="14 2 14 8 20 8"/>
                  <line x1="12" y1="18" x2="12" y2="12"/>
                  <line x1="9" y1="15" x2="15" y2="15"/>
                </svg>
                <svg
                  v-else
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/>
                  <polyline points="13 2 13 9 20 9"/>
                </svg>
              </div>

              <div class="documento-content">
                <h3 class="documento-titulo">{{ documento.titulo }}</h3>
                <p v-if="documento.descripcion" class="documento-descripcion">
                  {{ documento.descripcion }}
                </p>
                <div class="documento-meta">
                  <span v-if="documento.categoria" class="meta-tag">
                    {{ documento.categoria }}
                  </span>
                  <span v-if="documento.fecha" class="meta-date">
                    {{ formatDate(documento.fecha) }}
                  </span>
                </div>
              </div>

              <div class="documento-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                  <polyline points="7 10 12 15 17 10"/>
                  <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
              </div>
            </a>
          </div>
        </div>

        <!-- Empty State -->
        <div v-else class="empty-state">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
            <line x1="16" y1="13" x2="8" y2="13"/>
            <line x1="16" y1="17" x2="8" y2="17"/>
            <polyline points="10 9 9 9 8 9"/>
          </svg>
          <p>No hay documentos disponibles en este momento.</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useTenantStore } from '../store/tenant'

const tenantStore = useTenantStore()

const documentos = computed(() => tenantStore.documentos)
const selectedCategoria = ref(null)

// Obtener categorías únicas
const categorias = computed(() => {
  const cats = documentos.value
    .map(doc => doc.categoria)
    .filter(cat => cat)
  return [...new Set(cats)]
})

// Filtrar documentos
const documentosFiltrados = computed(() => {
  if (!selectedCategoria.value) {
    return documentos.value
  }
  return documentos.value.filter(doc => doc.categoria === selectedCategoria.value)
})

// Obtener tipo de archivo
const getFileType = (url) => {
  if (!url) return 'file'
  const extension = url.split('.').pop().toLowerCase()
  if (extension === 'pdf') return 'pdf'
  if (['doc', 'docx'].includes(extension)) return 'doc'
  return 'file'
}

// Formatear fecha
const formatDate = (date) => {
  if (!date) return ''
  const d = new Date(date)
  return d.toLocaleDateString('es-ES', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
}
</script>

<style scoped>
.documentos {
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

/* Filters */
.filters {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-bottom: 2rem;
  justify-content: center;
}

.filter-btn {
  padding: 0.625rem 1.25rem;
  background: white;
  border: 2px solid #e5e7eb;
  border-radius: 6px;
  color: #6b7280;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s;
}

.filter-btn:hover {
  border-color: var(--color-primary, #3b82f6);
  color: var(--color-primary, #3b82f6);
}

.filter-btn.active {
  background: var(--color-primary, #3b82f6);
  border-color: var(--color-primary, #3b82f6);
  color: white;
}

/* Documentos Grid */
.documentos-grid {
  display: grid;
  gap: 1.5rem;
}

.documento-card {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  padding: 1.5rem;
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  text-decoration: none;
  color: inherit;
  transition: all 0.3s;
}

.documento-card:hover {
  transform: translateX(4px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
}

.documento-icon {
  width: 56px;
  height: 56px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, var(--color-primary, #3b82f6), var(--color-secondary, #1e40af));
  border-radius: 8px;
  color: white;
  flex-shrink: 0;
}

.documento-content {
  flex: 1;
  min-width: 0;
}

.documento-titulo {
  font-size: 1.125rem;
  font-weight: 600;
  color: #1f2937;
  margin: 0 0 0.5rem 0;
  line-height: 1.4;
}

.documento-descripcion {
  font-size: 0.9rem;
  color: #6b7280;
  margin: 0 0 0.75rem 0;
  line-height: 1.5;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.documento-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  align-items: center;
}

.meta-tag {
  display: inline-block;
  padding: 0.25rem 0.75rem;
  background: #e0f2fe;
  color: #0369a1;
  font-size: 0.75rem;
  font-weight: 500;
  border-radius: 4px;
}

.meta-date {
  font-size: 0.875rem;
  color: #9ca3af;
}

.documento-action {
  flex-shrink: 0;
  color: var(--color-primary, #3b82f6);
  transition: transform 0.3s;
}

.documento-card:hover .documento-action {
  transform: translateY(2px);
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

  .filters {
    margin-bottom: 1.5rem;
  }

  .documento-card {
    padding: 1.25rem;
    gap: 1.25rem;
  }

  .documento-icon {
    width: 48px;
    height: 48px;
  }

  .documento-icon svg {
    width: 24px;
    height: 24px;
  }

  .documento-titulo {
    font-size: 1rem;
  }

  .documento-descripcion {
    font-size: 0.875rem;
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

  .documento-card {
    flex-direction: column;
    text-align: center;
    gap: 1rem;
  }

  .documento-meta {
    justify-content: center;
  }

  .documento-action {
    display: none;
  }
}
</style>
