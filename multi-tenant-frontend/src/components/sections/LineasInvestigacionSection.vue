<template>
  <section
    class="lineas-investigacion section"
    :style="{ backgroundColor: backgroundColor }"
  >
    <div class="container">
      <div class="section-title text-center" data-aos="fade-up">
        <h2>{{ title }}</h2>
        <p>{{ subtitle }}</p>
      </div>

      <div class="row g-4">
        <div
          v-for="(linea, index) in lineas"
          :key="index"
          class="col-lg-6"
          data-aos="fade-up"
          :data-aos-delay="100 + index * 100"
        >
          <div class="linea-card">
            <div class="linea-icon">
              <i :class="linea.icon"></i>
            </div>
            <div class="linea-content">
              <h3>{{ linea.title }}</h3>
              <p>{{ linea.description }}</p>
            </div>
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
    default: "Líneas de Investigación",
  },
  subtitle: {
    type: String,
    default: "Nuestros grupos de investigación",
  },
  lineas: {
    type: Array,
    required: true,
    default: () => [],
  },
  backgroundColor: {
    type: String,
    default: "#ffffff",
  },
});
</script>

<style scoped>
.lineas-investigacion {
  padding: 80px 0;
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

.linea-card {
  background: var(--surface-color);
  border-radius: 16px;
  padding: 2rem;
  height: 100%;
  display: flex;
  gap: 1.5rem;
  border: 2px solid color-mix(in srgb, var(--accent-color), transparent 90%);
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.linea-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
  border-color: var(--accent-color);
}

.linea-icon {
  flex-shrink: 0;
  width: 70px;
  height: 70px;
  background: linear-gradient(
    135deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 30%)
  );
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 6px 20px
    color-mix(in srgb, var(--accent-color), transparent 70%);
  transition: all 0.3s ease;
}

.linea-card:hover .linea-icon {
  transform: scale(1.1) rotate(5deg);
}

.linea-icon i {
  font-size: 2rem;
  color: white;
}

.linea-content h3 {
  font-size: 1.375rem;
  font-weight: 700;
  color: var(--heading-color);
  margin-bottom: 0.75rem;
  font-family: var(--heading-font);
}

.linea-content p {
  font-size: 1rem;
  line-height: 1.6;
  color: var(--default-color);
  margin: 0;
}

/* Responsive */
@media (max-width: 991.98px) {
  .lineas-investigacion {
    padding: 60px 0;
  }

  .linea-card {
    padding: 1.75rem;
  }

  .linea-icon {
    width: 60px;
    height: 60px;
  }

  .linea-icon i {
    font-size: 1.75rem;
  }

  .linea-content h3 {
    font-size: 1.25rem;
  }
}

@media (max-width: 767.98px) {
  .linea-card {
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 1.5rem;
  }

  .linea-icon {
    width: 55px;
    height: 55px;
  }

  .linea-icon i {
    font-size: 1.5rem;
  }

  .linea-content h3 {
    font-size: 1.125rem;
  }

  .linea-content p {
    font-size: 0.95rem;
  }
}
</style>
