<template>
  <main class="main">
    <!-- Hero Section con Imagen -->
    <section
      class="sobre-nosotros-hero section"
      style="
        background-color: color-mix(
          in srgb,
          var(--accent-color),
          transparent 97%
        );
      "
    >
      <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="hero-image-wrapper">
              <img
                src="/img/local/oti.jpg"
                alt="Sobre Nosotros"
                class="img-fluid rounded shadow"
              />
            </div>
          </div>
          <div class="col-lg-7">
            <div class="hero-content">
              <h1 class="hero-title mb-4">Sobre Nosotros</h1>
              <p class="hero-description">
                Conoce más acerca de nuestra Facultad de Ingeniería Electrónica,
                nuestra misión, visión y los logros que nos definen como
                institución académica de excelencia.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Cifras Section -->
    <section class="cifras-section section" style="background-color: #e8eef3">
      <div class="container">
        <div class="section-title-custom text-center" data-aos="fade-up">
          <h2>Cifras</h2>
          <p>Datos estadísticos de nuestra comunidad académica</p>
        </div>

        <StatsBoxes :stats="statsData" />
      </div>
    </section>

    <!-- Organigrama Section -->
    <OrganigramaSection
      :title="organigramaData.title"
      :subtitle="organigramaData.subtitle"
      :imageUrl="organigramaData.imageUrl"
      :imageAlt="organigramaData.imageAlt"
      :backgroundColor="organigramaData.backgroundColor"
      :maxWidth="organigramaData.maxWidth"
    />
  </main>
</template>

<script setup>
import StatsBoxes from "@/components/ui/StatsBoxes.vue";
import OrganigramaSection from "@/components/sections/OrganigramaSection.vue";

const statsData = [
  {
    icon: "bi bi-person-workspace",
    number: "1,500",
    label: "Estudiantes",
  },
  {
    icon: "bi bi-people-fill",
    number: "47",
    label: "Docentes",
  },
  {
    icon: "bi bi-easel2",
    number: "40",
    label: "Docentes Investigadores",
  },
  {
    icon: "bi bi-journal-text",
    number: "450",
    label: "Tesis Sustentadas",
  },
];

const organigramaData = {
  title: "Organigrama",
  subtitle: "Estructura organizacional de nuestra facultad",
  imageUrl: "/img/organigrama/organigrama_finesi.jpg",
  imageAlt: "Organigrama FIENIS",
  backgroundColor: "#ffffff",
  maxWidth: "750px",
};
</script>

<style scoped>
.sobre-nosotros-hero {
  padding-top: 140px;
  padding-bottom: 80px;
}

.hero-image-wrapper img {
  border-radius: 12px;
  max-width: 100%;
  height: auto;
}

.hero-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.hero-description {
  font-size: 1.125rem;
  line-height: 1.6;
  color: var(--default-color);
}

/* Cifras Section */
.cifras-section {
  padding: 80px 0;
}

.section-title-custom {
  margin-bottom: 3rem;
  padding-bottom: 0;
}

.section-title-custom h2 {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 15px;
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.section-title-custom p {
  font-size: 1rem;
  color: var(--default-color);
  margin: 0;
}

/* Responsive */
@media (max-width: 991.98px) {
  .sobre-nosotros-hero {
    padding-top: 100px;
    padding-bottom: 60px;
  }

  .hero-title {
    font-size: 2rem;
  }

  .cifras-section {
    padding: 60px 0;
  }
}

@media (max-width: 767.98px) {
  .hero-title {
    font-size: 1.75rem;
  }

  .hero-description {
    font-size: 1rem;
  }
}
</style>
