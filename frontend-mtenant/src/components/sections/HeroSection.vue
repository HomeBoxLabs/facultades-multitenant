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
            {{ description }}
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
import { computed } from "vue";
import { useTenant } from "@/composables/useTenant";
import CarruselNoticias from "@/components/ui/CarruselNoticias.vue";
import FeatureBoxes from "@/components/ui/FeatureBoxes.vue";

const { tenant } = useTenant();

const props = defineProps({
  features: {
    type: Array,
    default: () => [],
  },
});

const title = computed(
  () =>
    tenant.value?.presentacion_titulo || "Facultad de Ingeniería Electrónica"
);
const description = computed(
  () => tenant.value?.presentacion_texto || "Cargando..."
);

const titleWords = computed(() => title.value.split(" "));
const wordDelay = 90;

const quickAccessFeatures =
  props.features.length > 0
    ? props.features
    : [
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
