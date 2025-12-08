<template>
  <section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <!-- Hero Principal -->
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <!-- Título con efecto blur -->
          <h1 class="hero-title mb-4 blur-text">
            <span
              v-for="(word, index) in titleWords"
              :key="index"
              :style="{ animationDelay: `${index * wordDelay}ms` }"
              class="word"
            >
              {{ word }}&nbsp;
            </span>
          </h1>

          <p class="hero-description mb-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur.
          </p>
        </div>

        <div class="col-lg-6">
          <CarruselNoticias />
        </div>
      </div>

      <!-- Botones de Interés -->
      <FeatureBoxes :features="quickAccessFeatures" />
    </div>
  </section>
</template>

<script setup>
import CarruselNoticias from "@/components/ui/CarruselNoticias.vue";
import FeatureBoxes from "@/components/ui/FeatureBoxes.vue";

const titleWords = "Facultad de Ingeniería Electrónica".split(" ");
const wordDelay = 90;

const quickAccessFeatures = [
  {
    icon: "bi bi-book",
    title: "Aula Virtual",
    description:
      "Accede a la plataforma de educación virtual de la UNAP para consultar tus cursos, materiales y calificaciones en línea.",
    url: "https://aulavirtual2.unap.edu.pe/login?ReturnUrl=%2F",
  },
  {
    icon: "bi bi-journal-bookmark",
    title: "Biblioteca",
    description:
      "Consulta el catálogo bibliográfico, reserva materiales y accede a recursos digitales desde nuestra biblioteca universitaria.",
    url: "https://biblioteca.unap.edu.pe/opac_css/",
  },
  {
    icon: "bi bi-globe",
    title: "Convenios",
    description:
      "Explora los convenios nacionales e internacionales de la UNAP para oportunidades de intercambio y colaboración académica.",
    url: "https://ocri.unap.edu.pe/convenios",
  },
];
</script>

<style scoped>
/* Efecto blur del título */
.blur-text {
  display: flex;
  flex-wrap: wrap;
}

.word {
  display: inline-block;
  animation: blur-in 0.5s ease-out forwards;
  opacity: 0;
  filter: blur(10px);
  transform: translateY(-20px);
  will-change: transform, filter, opacity;
}

@keyframes blur-in {
  0% {
    opacity: 0;
    filter: blur(10px);
    transform: translateY(-20px);
  }
  50% {
    opacity: 0.5;
    filter: blur(5px);
    transform: translateY(-5px);
  }
  100% {
    opacity: 1;
    filter: blur(0);
    transform: translateY(0);
  }
}
</style>
