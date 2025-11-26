<template>
  <main class="main">
    <HeroSection />

    <!-- Cifras Section -->
    <section class="cifras-section section" style="background-color: #ffffff">
      <div class="container">
        <div class="section-title-custom text-center" data-aos="fade-up">
          <h2>Cifras</h2>
          <p>Datos estadísticos de nuestra comunidad académica</p>
        </div>

        <StatsBoxes :stats="statsData" />
      </div>
    </section>

    <MissionVisionSection
      title="Nuestros principios y objetivos como institución"
      :items="missionVisionData"
    />
    <PropositsSection />
    <PlanEstudiosSection
      title="Plan de Estudios y Malla Curricular"
      :items="planEstudiosData"
      backgroundColor="#e8eef3"
    />
    <LineasInvestigacionSection
      title="Líneas de Investigación"
      subtitle="Nuestros grupos de investigación desarrollan proyectos innovadores en áreas estratégicas que responden a las tendencias tecnológicas actuales y necesidades del entorno."
      :lineas="lineasInvestigacionData"
      backgroundColor="#ffffff"
    />
  </main>
</template>

<script setup>
import HeroSection from "@/components/sections/HeroSection.vue";
import MissionVisionSection from "@/components/sections/MissionVisionSection.vue";
import PropositsSection from "@/components/sections/PropositsSection.vue";
import PlanEstudiosSection from "@/components/sections/PlanEstudiosSection.vue";
import LineasInvestigacionSection from "@/components/sections/LineasInvestigacionSection.vue";
import StatsBoxes from "@/components/ui/StatsBoxes.vue";

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

const missionVisionData = [
  {
    icon: "bi bi-compass",
    title: "Misión",
    paragraphs: [
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
      "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
      "Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.",
    ],
  },
  {
    icon: "bi bi-eye",
    title: "Visión",
    paragraphs: [
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim.",
      "Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio.",
      "Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.",
    ],
  },
];

const planEstudiosData = [
  {
    titulo: "Pregrado",
    contenido:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
  },
  {
    titulo: "Posgrado",
    contenido:
      "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
  },
];

const lineasInvestigacionData = [
  {
    icon: "bi bi-code-slash",
    title: "Desarrollo de Software",
    description:
      "Diseño e implementación de soluciones tecnológicas innovadoras con enfoque en calidad y eficiencia.",
  },
  {
    icon: "bi bi-cpu",
    title: "Modelos Estadísticos y Algoritmos Computacionales",
    description:
      "Investigación en algoritmos avanzados y técnicas de modelado para análisis predictivo y toma de decisiones basada en datos.",
  },
  {
    icon: "bi bi-diagram-3",
    title: "Redes y Comunicaciones",
    description:
      "Desarrollo e implementación de infraestructuras de redes eficientes y seguras para entornos empresariales y académicos.",
  },
  {
    icon: "bi bi-database",
    title: "Bases de Datos y Analítica",
    description:
      "Investigación en gestión eficiente de datos, sistemas de información y tecnologías emergentes para el análisis y visualización de grandes volúmenes de información.",
  },
];
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
