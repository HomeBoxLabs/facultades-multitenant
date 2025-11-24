<template>
  <div class="row stats-boxes">
    <div
      v-for="(stat, index) in stats"
      :key="index"
      class="col-lg-3 col-md-6 mb-4 mb-lg-0"
      data-aos="fade-up"
      :data-aos-delay="100 + index * 100"
    >
      <div class="stat-box">
        <div class="stat-icon">
          <i :class="stat.icon"></i>
        </div>
        <div class="stat-number">{{ stat.number }}</div>
        <div class="stat-label">{{ stat.label }}</div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  stats: {
    type: Array,
    required: true,
    default: () => [],
  },
});
</script>

<style scoped>
.stats-boxes {
  display: flex;
  justify-content: center;
}

.stat-box {
  background: var(--surface-color);
  border-radius: 20px;
  padding: 2rem 1.25rem;
  text-align: center;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  border: 2px solid transparent;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.stat-box:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
  border-color: color-mix(in srgb, var(--accent-color), transparent 85%);
}

.stat-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(
    135deg,
    var(--accent-color),
    color-mix(in srgb, var(--accent-color), transparent 30%)
  );
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1rem;
  box-shadow: 0 8px 25px
    color-mix(in srgb, var(--accent-color), transparent 70%);
  transition: all 0.3s ease;
}

.stat-box:hover .stat-icon {
  transform: scale(1.1) rotate(5deg);
  box-shadow: 0 12px 35px
    color-mix(in srgb, var(--accent-color), transparent 60%);
}

.stat-icon i {
  font-size: 1.75rem;
  color: white;
}

.stat-number {
  font-size: 2.5rem;
  font-weight: 800;
  color: var(--accent-color);
  margin-bottom: 0.5rem;
  font-family: var(--heading-font);
  line-height: 1;
}

.stat-label {
  font-size: 1rem;
  font-weight: 600;
  color: var(--heading-color);
  line-height: 1.3;
}

/* Responsive */
@media (max-width: 991.98px) {
  .stat-box {
    padding: 1.75rem 1rem;
    margin-bottom: 1.5rem;
  }

  .stat-icon {
    width: 55px;
    height: 55px;
  }

  .stat-icon i {
    font-size: 1.5rem;
  }

  .stat-number {
    font-size: 2.25rem;
  }

  .stat-label {
    font-size: 0.95rem;
  }
}

@media (max-width: 767.98px) {
  .stat-box {
    padding: 1.5rem 0.875rem;
  }

  .stat-icon {
    width: 50px;
    height: 50px;
  }

  .stat-icon i {
    font-size: 1.35rem;
  }

  .stat-number {
    font-size: 2rem;
  }

  .stat-label {
    font-size: 0.9rem;
  }
}
</style>
