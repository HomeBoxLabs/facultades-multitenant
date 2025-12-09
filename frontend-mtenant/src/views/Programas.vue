<template>
  <main class="main">
    <!-- Hero Section -->
    <section
      class="programas-hero section"
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
          <h1>Programas Académicos</h1>
          <p>Conoce nuestra oferta académica</p>
        </div>
      </div>
    </section>

    <!-- Lista de Programas -->
    <section class="programas-section section">
      <div class="container">
        <div v-if="programas.length > 0" class="row g-4">
          <div
            v-for="programa in programas"
            :key="programa.id"
            class="col-lg-6 col-12"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="programa-card">
              <div class="programa-header">
                <div class="programa-icon">
                  <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h2 class="programa-title">{{ programa.nombre }}</h2>
              </div>

              <div class="programa-content">
                <div class="info-grid">
                  <div class="info-item" v-if="programa.descripcion">
                    <div class="info-label">
                      <i class="bi bi-info-circle"></i>
                      <span>Descripción</span>
                    </div>
                    <p class="info-text">{{ programa.descripcion }}</p>
                  </div>

                  <div class="info-item" v-if="programa.perfil_egresado">
                    <div class="info-label">
                      <i class="bi bi-person-badge"></i>
                      <span>Perfil del Egresado</span>
                    </div>
                    <p class="info-text">{{ programa.perfil_egresado }}</p>
                  </div>

                  <div class="info-item" v-if="programa.campo_laboral">
                    <div class="info-label">
                      <i class="bi bi-briefcase"></i>
                      <span>Campo Laboral</span>
                    </div>
                    <p class="info-text">{{ programa.campo_laboral }}</p>
                  </div>

                  <div class="info-item" v-if="programa.duracion">
                    <div class="info-label">
                      <i class="bi bi-clock"></i>
                      <span>Duración</span>
                    </div>
                    <p class="info-text">{{ programa.duracion }}</p>
                  </div>
                </div>

                <!-- Malla Curricular -->
                <div class="programa-footer" v-if="programa.malla_curricular">
                  <a
                    :href="programa.malla_curricular"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-malla"
                  >
                    <i class="bi bi-file-earmark-pdf me-2"></i>
                    Ver Malla Curricular
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-else class="empty-state" data-aos="fade-up">
          <div class="empty-icon">
            <i class="bi bi-journal-bookmark"></i>
          </div>
          <p>No hay programas académicos disponibles en este momento.</p>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup>
import { useTenant } from "@/composables/useTenant";

const { programas, isLoading } = useTenant();
</script>

<style scoped>
/* Hero Section */
.programas-hero {
  padding-top: 140px;
  padding-bottom: 80px;
}

/* Programas Section */
.programas-section {
  padding: 80px 0;
}

.programa-card {
  background: var(--surface-color);
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  border: 2px solid color-mix(in srgb, var(--accent-color), transparent 90%);
}

.programa-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
  border-color: var(--accent-color);
}

.programa-header {
  background: linear-gradient(
    135deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 30%)
  );
  padding: 1.5rem;
  color: white;
  display: flex;
  align-items: center;
  gap: 1rem;
}

.programa-icon {
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  flex-shrink: 0;
}

.programa-icon i {
  font-size: 1.5rem;
}

.programa-title {
  font-size: 1.35rem;
  font-weight: 700;
  margin: 0;
  flex: 1;
  font-family: var(--heading-font);
  line-height: 1.3;
}

.programa-content {
  padding: 1.75rem;
}

.info-grid {
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
}

.info-item {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.info-label {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-weight: 600;
  font-size: 0.9rem;
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.info-label i {
  color: var(--accent-color);
  font-size: 1rem;
  flex-shrink: 0;
}

.info-text {
  font-size: 0.9rem;
  line-height: 1.6;
  color: var(--default-color);
  margin: 0;
  padding-left: 1.5rem;
}

.programa-footer {
  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 2px solid color-mix(in srgb, var(--accent-color), transparent 85%);
}

.btn-malla {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 0.75rem 1.5rem;
  background: linear-gradient(
    135deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 30%)
  );
  color: white;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  font-size: 0.9rem;
  transition: all 0.3s ease;
  border: none;
  width: 100%;
}

.btn-malla:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
  color: white;
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
  .programas-hero {
    padding-top: 100px;
    padding-bottom: 60px;
  }

  .programas-section {
    padding: 60px 0;
  }

  .programa-title {
    font-size: 1.25rem;
  }

  .programa-content {
    padding: 1.5rem;
  }

  .info-grid {
    gap: 1rem;
  }
}

@media (max-width: 767.98px) {
  .programas-hero {
    padding-top: 80px;
    padding-bottom: 40px;
  }

  .programa-header {
    flex-direction: column;
    text-align: center;
    padding: 1.25rem;
  }

  .programa-icon {
    width: 45px;
    height: 45px;
  }

  .programa-icon i {
    font-size: 1.25rem;
  }

  .programa-title {
    font-size: 1.15rem;
  }

  .programa-content {
    padding: 1.25rem;
  }

  .info-label {
    font-size: 0.85rem;
  }

  .info-text {
    font-size: 0.85rem;
    padding-left: 1.25rem;
  }

  .btn-malla {
    font-size: 0.85rem;
    padding: 0.65rem 1.25rem;
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
