<template>
  <main class="main">
    <!-- Hero Section -->
    <section
      class="documentos-hero section"
      style="
        background-color: color-mix(
          in srgb,
          var(--accent-color),
          transparent 97%
        );
      "
    >
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h1>Documentos</h1>
          <p>Accede a documentos institucionales y normativas</p>
        </div>
      </div>
    </section>

    <!-- Documentos Section -->
    <section class="documentos-section section">
      <div class="container">
        <div v-if="documentos.length > 0">
          <!-- Filtros por categoría -->
          <div
            v-if="categorias.length > 1"
            class="filters mb-4"
            data-aos="fade-up"
          >
            <button
              @click="selectedCategoria = null"
              :class="[
                'btn',
                'filter-btn',
                { active: selectedCategoria === null },
              ]"
            >
              Todos
            </button>
            <button
              v-for="categoria in categorias"
              :key="categoria"
              @click="selectedCategoria = categoria"
              :class="[
                'btn',
                'filter-btn',
                { active: selectedCategoria === categoria },
              ]"
            >
              {{ categoria }}
            </button>
          </div>

          <!-- Grid de documentos -->
          <div class="row g-3">
            <div
              v-for="documento in documentosFiltrados"
              :key="documento.id"
              class="col-12"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a
                :href="documento.url"
                target="_blank"
                rel="noopener noreferrer"
                class="documento-card"
              >
                <div class="documento-icon">
                  <i :class="getFileIcon(documento.url)"></i>
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
                      <i class="bi bi-calendar3 me-1"></i>
                      {{ formatDate(documento.fecha) }}
                    </span>
                  </div>
                </div>

                <div class="documento-action">
                  <i class="bi bi-download"></i>
                </div>
              </a>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-else class="empty-state" data-aos="fade-up">
          <div class="empty-icon">
            <i class="bi bi-file-earmark-text"></i>
          </div>
          <p>No hay documentos disponibles en este momento.</p>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup>
import { ref, computed } from "vue";
import { useTenant } from "@/composables/useTenant";

const { documentos, isLoading } = useTenant();
const selectedCategoria = ref(null);

// Obtener categorías únicas
const categorias = computed(() => {
  const cats = documentos.value
    .map((doc) => doc.categoria)
    .filter((cat) => cat);
  return [...new Set(cats)];
});

// Filtrar documentos
const documentosFiltrados = computed(() => {
  if (!selectedCategoria.value) {
    return documentos.value;
  }
  return documentos.value.filter(
    (doc) => doc.categoria === selectedCategoria.value
  );
});

// Obtener icono según tipo de archivo
const getFileIcon = (url) => {
  if (!url) return "bi bi-file-earmark";
  const extension = url.split(".").pop().toLowerCase();

  if (extension === "pdf") return "bi bi-file-earmark-pdf-fill";
  if (["doc", "docx"].includes(extension))
    return "bi bi-file-earmark-word-fill";
  if (["xls", "xlsx"].includes(extension))
    return "bi bi-file-earmark-excel-fill";
  if (["ppt", "pptx"].includes(extension)) return "bi bi-file-earmark-ppt-fill";
  if (["zip", "rar", "7z"].includes(extension))
    return "bi bi-file-earmark-zip-fill";

  return "bi bi-file-earmark";
};

// Formatear fecha
const formatDate = (date) => {
  if (!date) return "";
  const d = new Date(date);
  return d.toLocaleDateString("es-ES", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });
};
</script>

<style scoped>
/* Hero Section */
.documentos-hero {
  padding-top: 140px;
  padding-bottom: 80px;
}

/* Documentos Section */
.documentos-section {
  padding: 80px 0;
}

/* Filters */
.filters {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  justify-content: center;
}

.filter-btn {
  padding: 0.625rem 1.5rem;
  background: var(--surface-color);
  border: 2px solid color-mix(in srgb, var(--accent-color), transparent 85%);
  border-radius: 8px;
  color: var(--default-color);
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
}

.filter-btn:hover {
  border-color: var(--accent-color);
  color: var(--accent-color);
  background: color-mix(in srgb, var(--accent-color), transparent 95%);
}

.filter-btn.active {
  background: var(--accent-color);
  border-color: var(--accent-color);
  color: white;
}

/* Documento Card */
.documento-card {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  padding: 1.75rem;
  background: var(--surface-color);
  border-radius: 12px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
  text-decoration: none;
  color: inherit;
  transition: all 0.3s ease;
  border: 2px solid color-mix(in srgb, var(--accent-color), transparent 90%);
}

.documento-card:hover {
  transform: translateX(8px);
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
  border-color: var(--accent-color);
}

.documento-icon {
  width: 64px;
  height: 64px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(
    135deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 30%)
  );
  border-radius: 12px;
  color: white;
  flex-shrink: 0;
}

.documento-icon i {
  font-size: 2rem;
}

.documento-content {
  flex: 1;
  min-width: 0;
}

.documento-titulo {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--heading-color);
  margin: 0 0 0.5rem 0;
  line-height: 1.4;
  font-family: var(--heading-font);
}

.documento-descripcion {
  font-size: 0.95rem;
  color: var(--default-color);
  margin: 0 0 0.875rem 0;
  line-height: 1.6;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.documento-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 0.875rem;
  align-items: center;
}

.meta-tag {
  display: inline-block;
  padding: 0.375rem 0.875rem;
  background: color-mix(in srgb, var(--accent-color), transparent 90%);
  color: var(--accent-color);
  font-size: 0.8rem;
  font-weight: 600;
  border-radius: 6px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}

.meta-date {
  font-size: 0.875rem;
  color: var(--default-color);
  opacity: 0.7;
  display: flex;
  align-items: center;
}

.documento-action {
  flex-shrink: 0;
  color: var(--accent-color);
  font-size: 1.5rem;
  transition: transform 0.3s ease;
}

.documento-card:hover .documento-action {
  transform: translateY(3px);
}

/* Empty State */
.empty-state {
  text-align: center;
  padding: 5rem 2rem;
}

.empty-icon {
  width: 100px;
  height: 100px;
  margin: 0 auto 2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  background: color-mix(in srgb, var(--accent-color), transparent 90%);
  border-radius: 50%;
}

.empty-icon i {
  font-size: 3rem;
  color: var(--accent-color);
  opacity: 0.6;
}

.empty-state p {
  font-size: 1.125rem;
  color: var(--default-color);
  margin: 0;
  opacity: 0.7;
}

/* Responsive */
@media (max-width: 991.98px) {
  .documentos-hero {
    padding-top: 100px;
    padding-bottom: 60px;
  }

  .documentos-section {
    padding: 60px 0;
  }

  .documento-card {
    padding: 1.5rem;
    gap: 1.25rem;
  }

  .documento-icon {
    width: 56px;
    height: 56px;
  }

  .documento-icon i {
    font-size: 1.75rem;
  }

  .documento-titulo {
    font-size: 1.125rem;
  }
}

@media (max-width: 767.98px) {
  .documentos-hero {
    padding-top: 80px;
    padding-bottom: 40px;
  }

  .filters {
    margin-bottom: 1.5rem;
  }

  .filter-btn {
    padding: 0.5rem 1.25rem;
    font-size: 0.9rem;
  }

  .documento-card {
    padding: 1.25rem;
    gap: 1rem;
  }

  .documento-icon {
    width: 48px;
    height: 48px;
  }

  .documento-icon i {
    font-size: 1.5rem;
  }

  .documento-titulo {
    font-size: 1rem;
  }

  .documento-descripcion {
    font-size: 0.875rem;
  }

  .meta-tag {
    font-size: 0.75rem;
    padding: 0.25rem 0.75rem;
  }

  .meta-date {
    font-size: 0.8rem;
  }
}

@media (max-width: 575.98px) {
  .documento-card {
    flex-direction: column;
    text-align: center;
    padding: 1.5rem;
  }

  .documento-meta {
    justify-content: center;
  }

  .documento-action {
    display: none;
  }

  .empty-state {
    padding: 3rem 1rem;
  }

  .empty-icon {
    width: 80px;
    height: 80px;
  }

  .empty-icon i {
    font-size: 2.5rem;
  }
}
</style>
