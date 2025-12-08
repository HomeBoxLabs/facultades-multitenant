<template>
  <section
    class="organigrama-section section"
    :style="{ backgroundColor: backgroundColor }"
  >
    <div class="container">
      <div class="section-title-custom text-center" data-aos="fade-up">
        <h2>{{ title }}</h2>
        <p>{{ subtitle }}</p>
      </div>

      <div class="organigrama-wrapper" data-aos="fade-up" data-aos-delay="100">
        <img
          :src="imageUrl"
          :alt="imageAlt"
          class="img-fluid organigrama-img"
        />
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    default: "Organigrama",
  },
  subtitle: {
    type: String,
    default: "Estructura organizacional de nuestra facultad",
  },
  imageUrl: {
    type: String,
    required: true,
  },
  imageAlt: {
    type: String,
    default: "Organigrama",
  },
  backgroundColor: {
    type: String,
    default: "#ffffff",
  },
  maxWidth: {
    type: String,
    default: "1200px",
  },
});
</script>

<style scoped>
.organigrama-section {
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

.organigrama-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}

.organigrama-img {
  max-width: v-bind(maxWidth);
  width: 100%;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

/* Responsive */
@media (max-width: 991.98px) {
  .organigrama-section {
    padding: 60px 0;
  }
}

@media (max-width: 767.98px) {
  .organigrama-img {
    border-radius: 4px;
  }
}
</style>
