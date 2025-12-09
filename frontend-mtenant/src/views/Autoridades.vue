<template>
  <main class="main">
    <!-- Hero Section -->
    <section
      class="autoridades-hero section"
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
          <h1>Autoridades</h1>
          <p>Conoce a nuestro equipo directivo</p>
        </div>
      </div>
    </section>

    <!-- Autoridades -->
    <section
      class="autoridades-section section"
      style="background-color: #ffffff; padding: 40px 0"
    >
      <div class="container">
        <div
          v-if="autoridades.length > 0"
          class="row g-3 justify-content-center"
        >
          <div
            v-for="autoridad in autoridades"
            :key="autoridad.id"
            class="col-lg-3 col-md-4 col-sm-6"
            data-aos="fade-up"
            :data-aos-delay="100 + (autoridad.id - 1) * 100"
          >
            <div class="autoridad-card">
              <div class="autoridad-image">
                <img
                  v-if="autoridad.foto"
                  :src="autoridad.foto"
                  :alt="autoridad.nombre"
                  class="img-fluid"
                />
                <div v-else class="avatar-placeholder">
                  <i class="bi bi-person-circle"></i>
                </div>
              </div>
              <div class="autoridad-content">
                <h3 class="autoridad-cargo">{{ autoridad.cargo }}</h3>
                <h2 class="autoridad-nombre">{{ autoridad.nombre }}</h2>
              </div>
            </div>
          </div>
        </div>

        <!-- Otras Autoridades -->
        <div class="otras-autoridades-wrapper">
          <h3 class="subtitle-otras" data-aos="fade-up">Otras Autoridades</h3>

          <div v-if="equipoAdministrativo.length > 0" class="row g-3">
            <div
              v-for="(miembro, index) in equipoAdministrativo"
              :key="index"
              class="col-lg-3 col-md-6"
              data-aos="fade-up"
              :data-aos-delay="100 + index * 50"
            >
              <div class="equipo-item">
                <div class="equipo-icon">
                  <i class="bi bi-person-badge"></i>
                </div>
                <div class="equipo-info">
                  <h4 class="equipo-cargo">{{ miembro.cargo }}</h4>
                  <p class="equipo-nombre">{{ miembro.nombre }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          v-if="autoridades.length === 0"
          class="empty-state"
          data-aos="fade-up"
        >
          <div class="empty-icon">
            <i class="bi bi-people"></i>
          </div>
          <p>No hay información de autoridades disponible en este momento.</p>
        </div>
      </div>
    </section>

    <!-- Plana Docente -->
    <section
      class="plana-docente-section section"
      style="background-color: #e8eef3; padding: 40px 0"
    >
      <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
          <h2>Plana Docente</h2>
          <p>Nuestro equipo de docentes especializados</p>
        </div>

        <div v-if="docentes.length > 0" class="row g-4">
          <div
            v-for="docente in docentes"
            :key="docente.id"
            class="col-lg-3 col-md-4 col-sm-6"
            data-aos="fade-up"
            :data-aos-delay="100 + (docente.id - 1) * 50"
          >
            <div class="autoridad-card">
              <div class="autoridad-image">
                <img
                  v-if="docente.foto"
                  :src="docente.foto"
                  :alt="docente.nombre"
                  class="img-fluid"
                />
                <div v-else class="avatar-placeholder">
                  <i class="bi bi-person-circle"></i>
                </div>
              </div>
              <div class="autoridad-content">
                <h3 class="autoridad-cargo">{{ docente.cargo }}</h3>
                <h2 class="autoridad-nombre">{{ docente.nombre }}</h2>
              </div>
            </div>
          </div>
        </div>

        <div v-else class="empty-state" data-aos="fade-up">
          <div class="empty-icon">
            <i class="bi bi-people"></i>
          </div>
          <p>No hay información de docentes disponible en este momento.</p>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup>
import { ref } from "vue";
import { useTenant } from "@/composables/useTenant";

const { autoridades, isLoading } = useTenant();

const equipoAdministrativo = ref([
  {
    cargo: "Secretaria Técnica",
    nombre: "Lic. Ana Martínez",
  },
  {
    cargo: "Coordinador de Investigación",
    nombre: "Dr. Roberto Silva",
  },
  {
    cargo: "Coordinación de Proyección Social",
    nombre: "Mg. Laura Fernández",
  },
  {
    cargo: "Jefe de Centro de Cómputo",
    nombre: "Ing. Pedro Ramírez",
  },
]);

const docentes = ref([
  {
    id: 1,
    cargo: "Docente Principal",
    nombre: "Dr. Roberto Silva",
    foto: "/img/autoridad/decano.png",
  },
  {
    id: 2,
    cargo: "Docente Asociado",
    nombre: "Mg. Laura Fernández",
    foto: "/img/autoridad/decano.png",
  },
  {
    id: 3,
    cargo: "Docente Auxiliar",
    nombre: "Ing. Pedro Ramírez",
    foto: "/img/autoridad/decano.png",
  },
  {
    id: 4,
    cargo: "Docente Principal",
    nombre: "Dra. Carmen Torres",
    foto: "/img/autoridad/decano.png",
  },
  {
    id: 5,
    cargo: "Docente Asociado",
    nombre: "Mg. Luis Mendoza",
    foto: "/img/autoridad/decano.png",
  },
  {
    id: 6,
    cargo: "Docente Auxiliar",
    nombre: "Ing. Sofia Castro",
    foto: "/img/autoridad/decano.png",
  },
  {
    id: 7,
    cargo: "Docente Principal",
    nombre: "Dr. Miguel Vargas",
    foto: "/img/autoridad/decano.png",
  },
  {
    id: 8,
    cargo: "Docente Asociado",
    nombre: "Mg. Patricia Rojas",
    foto: "/img/autoridad/decano.png",
  },
]);
</script>

<style scoped>
/* Hero Section */
.autoridades-hero {
  padding-top: 140px;
  padding-bottom: 60px;
}

.section-title h1 {
  font-size: 32px;
  font-weight: 700;
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.section-title p {
  font-size: 1rem;
  color: var(--default-color);
  margin: 0;
}

/* Autoridades Section */
.autoridades-section,
.plana-docente-section {
  padding: 60px 0;
}

.plana-docente-section .section-title {
  margin-bottom: 3rem;
}

.plana-docente-section .section-title h2 {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 15px;
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.plana-docente-section .section-title p {
  font-size: 1rem;
  color: var(--default-color);
  margin: 0;
}

.autoridad-card {
  background: var(--surface-color);
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
  transition: all 0.3s ease;
  border: 2px solid color-mix(in srgb, var(--accent-color), transparent 90%);
}

.autoridad-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  border-color: var(--accent-color);
}

.autoridad-image {
  width: 100%;
  height: 280px;
  background: linear-gradient(
    135deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 30%)
  );
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.autoridad-image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}

.avatar-placeholder {
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  opacity: 0.6;
}

.avatar-placeholder i {
  font-size: 4rem;
}

.autoridad-content {
  padding: 1.25rem 1rem;
  text-align: center;
}

.autoridad-cargo {
  font-size: 0.8rem;
  font-weight: 600;
  color: var(--accent-color);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin: 0 0 0.5rem 0;
}

.autoridad-nombre {
  font-size: 1.125rem;
  font-weight: 700;
  color: var(--heading-color);
  margin: 0;
  line-height: 1.3;
  font-family: var(--heading-font);
}

/* Otras Autoridades */
.otras-autoridades-wrapper {
  margin-top: 3rem;
  padding-top: 2.5rem;
  border-top: 2px solid color-mix(in srgb, var(--accent-color), transparent 85%);
}

.subtitle-otras {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--heading-color);
  margin: 0 0 2rem 0;
  text-align: center;
  font-family: var(--heading-font);
}

/* Equipo Administrativo */
.equipo-item {
  background: var(--surface-color);
  border-radius: 12px;
  padding: 1.25rem;
  display: flex;
  align-items: center;
  gap: 1rem;
  border: 2px solid color-mix(in srgb, var(--accent-color), transparent 90%);
  box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
}

.equipo-item:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
  border-color: var(--accent-color);
}

.equipo-icon {
  flex-shrink: 0;
  width: 45px;
  height: 45px;
  background: linear-gradient(
    135deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 30%)
  );
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 15px
    color-mix(in srgb, var(--accent-color), transparent 70%);
}

.equipo-icon i {
  font-size: 1.35rem;
  color: white;
}

.equipo-info {
  flex: 1;
  min-width: 0;
}

.equipo-cargo {
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--heading-color);
  margin: 0 0 0.25rem 0;
  font-family: var(--heading-font);
}

.equipo-nombre {
  font-size: 0.9rem;
  color: var(--default-color);
  margin: 0;
  opacity: 0.85;
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
  .autoridades-hero {
    padding-top: 100px;
    padding-bottom: 50px;
  }

  .autoridades-section,
  .plana-docente-section {
    padding: 50px 0;
  }

  .autoridad-image {
    height: 180px;
  }

  .avatar-placeholder i {
    font-size: 3.5rem;
  }
}

@media (max-width: 767.98px) {
  .autoridades-hero {
    padding-top: 80px;
    padding-bottom: 40px;
  }

  .autoridades-section,
  .plana-docente-section {
    padding: 40px 0;
  }

  .autoridad-image {
    height: 160px;
  }

  .autoridad-content {
    padding: 1.25rem;
  }

  .autoridad-cargo {
    font-size: 0.75rem;
  }

  .autoridad-nombre {
    font-size: 1rem;
  }

  .avatar-placeholder i {
    font-size: 3rem;
  }

  .equipo-item {
    padding: 1rem;
  }

  .equipo-icon {
    width: 40px;
    height: 40px;
  }

  .equipo-icon i {
    font-size: 1.2rem;
  }

  .equipo-cargo {
    font-size: 0.8rem;
  }

  .equipo-nombre {
    font-size: 0.85rem;
  }

  .otras-autoridades-wrapper {
    margin-top: 2rem;
    padding-top: 2rem;
  }

  .subtitle-otras {
    font-size: 1.25rem;
    margin-bottom: 1.5rem;
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
