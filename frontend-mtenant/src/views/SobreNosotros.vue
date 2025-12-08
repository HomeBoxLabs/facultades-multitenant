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
import OrganigramaSection from "@/components/sections/OrganigramaSection.vue";

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

/* Responsive */
@media (max-width: 991.98px) {
  .sobre-nosotros-hero {
    padding-top: 100px;
    padding-bottom: 60px;
  }

  .hero-title {
    font-size: 2rem;
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
