<template>
  <div class="row feature-boxes">
    <div
      v-for="(feature, index) in features"
      :key="index"
      class="col-lg-4 mb-4 mb-lg-0"
      data-aos="fade-up"
      :data-aos-delay="200 + index * 100"
    >
      <a :href="feature.url" target="_blank" class="feature-link">
        <div class="feature-box">
          <div class="feature-icon me-sm-4 mb-3 mb-sm-0">
            <i :class="feature.icon"></i>
          </div>
          <div class="feature-content">
            <h3 class="feature-title">{{ feature.title }}</h3>
            <p class="feature-text">{{ feature.description }}</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</template>

<script setup>
defineProps({
  features: {
    type: Array,
    required: true,
    default: () => [],
  },
});
</script>

<style scoped>
.feature-link {
  text-decoration: none;
  color: inherit;
  display: block;
}

.feature-link:hover {
  color: inherit;
}

.feature-box {
  cursor: pointer;
  transition: all 0.3s ease;
}
</style>
