<template>
  <section class="mission-vision section" style="background-color: #e8eef3">
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
          <div class="mv-card h-100">
            <div class="mv-header">
              <div class="mv-icon">
                <i :class="item.icon"></i>
              </div>
              <h3>{{ item.title }}</h3>
            </div>
            <div class="mv-content">
              <p v-for="(paragraph, pIndex) in item.paragraphs" :key="pIndex">
                {{ paragraph }}
              </p>
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
    default: "Misión y Visión",
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
});
</script>

<style scoped>
.section-title {
  margin-bottom: 2rem;
  padding-bottom: 0 !important;
}

.section-title h2 {
  margin-bottom: 0;
  padding-bottom: 20px;
}

.mv-card {
  background: var(--surface-color);
  border-radius: 20px;
  padding: 2.5rem;
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.08);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  border: 2px solid transparent;
  position: relative;
  overflow: hidden;
}

.mv-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 5px;
  background: linear-gradient(
    90deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 40%)
  );
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s ease;
}

.mv-card:hover::before {
  transform: scaleX(1);
}

.mv-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15);
  border-color: color-mix(in srgb, var(--accent-color), transparent 85%);
}

.mv-header {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  margin-bottom: 2rem;
  padding-bottom: 1.5rem;
  border-bottom: 2px solid
    color-mix(in srgb, var(--accent-color), transparent 90%);
}

.mv-icon {
  width: 70px;
  height: 70px;
  background: linear-gradient(
    135deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 30%)
  );
  border-radius: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: 0 8px 20px
    color-mix(in srgb, var(--accent-color), transparent 70%);
  transition: all 0.3s ease;
}

.mv-card:hover .mv-icon {
  transform: scale(1.1) rotate(5deg);
  box-shadow: 0 12px 30px
    color-mix(in srgb, var(--accent-color), transparent 60%);
}

.mv-icon i {
  font-size: 2rem;
  color: white;
}

.mv-header h3 {
  font-size: 1.875rem;
  font-weight: 700;
  color: var(--heading-color);
  margin: 0;
  font-family: var(--heading-font);
}

.mv-content p {
  font-size: 1rem;
  line-height: 1.8;
  color: var(--default-color);
  text-align: justify;
  margin-bottom: 1rem;
}

.mv-content p:last-child {
  margin-bottom: 0;
}

/* Responsive */
@media (max-width: 991.98px) {
  .mv-card {
    padding: 2rem;
    margin-bottom: 1.5rem;
  }

  .mv-header {
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
  }

  .mv-icon {
    width: 60px;
    height: 60px;
  }

  .mv-icon i {
    font-size: 1.75rem;
  }

  .mv-header h3 {
    font-size: 1.625rem;
  }
}

@media (max-width: 767.98px) {
  .mv-card {
    padding: 1.75rem;
  }

  .mv-header {
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
  }

  .mv-icon {
    width: 55px;
    height: 55px;
    margin-bottom: 0.5rem;
  }

  .mv-icon i {
    font-size: 1.5rem;
  }

  .mv-header h3 {
    font-size: 1.5rem;
  }

  .mv-content p {
    font-size: 0.95rem;
  }
}
</style>
