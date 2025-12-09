<template>
  <main class="main">
    <HeroSection />

    <!-- Cifras Section -->
    <section
      v-if="cifras.length > 0"
      class="cifras-section section"
      style="background-color: #ffffff"
    >
      <div class="container">
        <div class="section-title-custom text-center" data-aos="fade-up">
          <h2>Cifras</h2>
          <p>Datos estadísticos de nuestra comunidad académica</p>
        </div>

        <StatsBoxes :stats="cifras" />
      </div>
    </section>

    <MissionVisionSection
      v-if="missionVisionData.length > 0"
      title="Nuestros principios y objetivos como institución"
      :items="missionVisionData"
    />
    <PropositsSection />
    <PlanEstudiosSection
      v-if="planEstudios.length > 0"
      title="Plan de Estudios y Malla Curricular"
      :items="planEstudios"
      backgroundColor="#e8eef3"
    />
    <LineasInvestigacionSection
      v-if="lineasInvestigacion.length > 0"
      title="Líneas de Investigación"
      subtitle="Nuestros grupos de investigación desarrollan proyectos innovadores en áreas estratégicas que responden a las tendencias tecnológicas actuales y necesidades del entorno."
      :lineas="lineasInvestigacion"
      backgroundColor="#ffffff"
    />
  </main>
</template>

<script setup>
import { computed } from "vue";
import { useTenant } from "@/composables/useTenant";
import HeroSection from "@/components/sections/HeroSection.vue";
import MissionVisionSection from "@/components/sections/MissionVisionSection.vue";
import PropositsSection from "@/components/sections/PropositsSection.vue";
import PlanEstudiosSection from "@/components/sections/PlanEstudiosSection.vue";
import LineasInvestigacionSection from "@/components/sections/LineasInvestigacionSection.vue";
import StatsBoxes from "@/components/ui/StatsBoxes.vue";

const { tenant, isLoading, cifras, planEstudios, lineasInvestigacion } =
  useTenant();

// Datos dinámicos de misión y visión
const missionVisionData = computed(() => {
  if (!tenant.value) return [];
  return [
    {
      icon: "bi bi-compass",
      title: "Misión",
      paragraphs: [tenant.value.mision],
    },
    {
      icon: "bi bi-eye",
      title: "Visión",
      paragraphs: [tenant.value.vision],
    },
  ].filter((item) => item.paragraphs[0]); // Filtrar si no existe
});
</script>

<style scoped>
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
  .cifras-section {
    padding: 60px 0;
  }
}
</style>
