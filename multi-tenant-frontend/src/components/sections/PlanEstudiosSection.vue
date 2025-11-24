<template>
  <section class="plan-estudios section" :style="{ backgroundColor }">
    <div class="container">
      <div class="section-title text-center" data-aos="fade-up">
        <h2>{{ title }}</h2>
        <p v-if="subtitle">{{ subtitle }}</p>
      </div>
      <div class="row g-4">
        <div
          v-for="(item, index) in items"
          :key="index"
          class="col-lg-6"
          data-aos="fade-up"
          :data-aos-delay="100 + index * 100"
        >
          <div class="content-box">
            <h3 v-if="item.titulo">{{ item.titulo }}</h3>
            <p>{{ item.contenido }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    default: "Plan de Estudios y Malla Curricular",
  },
  subtitle: {
    type: String,
    default: "",
  },
  items: {
    type: Array,
    required: true,
    default: () => [],
  },
  backgroundColor: {
    type: String,
    default: "#e8eef3",
  },
});
</script>

<style scoped>
.plan-estudios {
  padding: 60px 0;
}

.section-title {
  margin-bottom: 3rem;
  padding-bottom: 0;
}

.section-title h2 {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 15px;
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.section-title p {
  font-size: 1rem;
  color: var(--default-color);
  margin: 0;
}

.content-box {
  background: var(--surface-color);
  border-radius: 16px;
  padding: 2rem;
  border: 2px solid color-mix(in srgb, var(--accent-color), transparent 90%);
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
  height: 100%;
  transition: all 0.3s ease;
}

.content-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  border-color: var(--accent-color);
}

.content-box h3 {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--heading-color);
  margin-bottom: 1rem;
  font-family: var(--heading-font);
}

.content-box p {
  text-align: justify;
  line-height: 1.8;
  color: var(--default-color);
  margin: 0;
  font-size: 1rem;
}

@media (max-width: 991.98px) {
  .plan-estudios {
    padding: 50px 0;
  }

  .content-box {
    padding: 1.75rem;
  }
}

@media (max-width: 767.98px) {
  .plan-estudios {
    padding: 40px 0;
  }

  .content-box {
    padding: 1.5rem;
  }

  .content-box h3 {
    font-size: 1.125rem;
  }

  .content-box p {
    font-size: 0.95rem;
  }
}
</style>
