<template>
  <div class="card" :class="{ clickable: clickable }">
    <div v-if="image" class="card-image">
      <img :src="image" :alt="title" />
    </div>
    <div class="card-content">
      <h3 v-if="title" class="card-title">{{ title }}</h3>
      <p v-if="description" class="card-description">{{ description }}</p>
      <slot></slot>
    </div>
    <div v-if="$slots.footer" class="card-footer">
      <slot name="footer"></slot>
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    default: ''
  },
  description: {
    type: String,
    default: ''
  },
  image: {
    type: String,
    default: ''
  },
  clickable: {
    type: Boolean,
    default: false
  }
})
</script>

<style scoped>
.card {
  background: white;
  border-radius: var(--radius-lg, 14px);
  box-shadow: var(--shadow-md, 0 4px 12px rgba(0, 0, 0, 0.08));
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  height: 100%;
  display: flex;
  flex-direction: column;
  position: relative;
  border: 1px solid rgba(0, 0, 0, 0.05);
}

.card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg,
    transparent 0%,
    rgba(59, 130, 246, 0.03) 50%,
    transparent 100%
  );
  opacity: 0;
  transition: opacity 0.4s ease;
  pointer-events: none;
}

.card:hover::before {
  opacity: 1;
}

.card.clickable {
  cursor: pointer;
}

.card.clickable:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: var(--shadow-xl, 0 20px 40px rgba(0, 0, 0, 0.12));
  border-color: rgba(59, 130, 246, 0.2);
}

.card.clickable:active {
  transform: translateY(-4px) scale(1.01);
}

.card-image {
  width: 100%;
  height: 220px;
  overflow: hidden;
  background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
  position: relative;
}

.card-image::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.3) 100%);
  opacity: 0;
  transition: opacity 0.4s ease;
}

.card:hover .card-image::after {
  opacity: 1;
}

.card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.card.clickable:hover .card-image img {
  transform: scale(1.1) rotate(2deg);
}

.card-content {
  padding: 1.75rem;
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  position: relative;
}

.card-title {
  font-size: 1.375rem;
  font-weight: 700;
  color: var(--color-text, #0f172a);
  margin: 0 0 0.5rem 0;
  line-height: 1.3;
  letter-spacing: -0.02em;
  transition: color 0.3s ease;
  position: relative;
  display: inline-block;
  width: fit-content;
}

.card-title::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--color-primary, #3b82f6), var(--color-accent, #60a5fa));
  border-radius: 10px;
  transition: width 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.card:hover .card-title::after {
  width: 100%;
}

.card.clickable:hover .card-title {
  color: var(--color-primary, #3b82f6);
}

.card-description {
  font-size: 1rem;
  color: var(--color-text-light, #64748b);
  line-height: 1.7;
  margin: 0;
  transition: color 0.3s ease;
}

.card:hover .card-description {
  color: var(--color-text, #0f172a);
}

.card-footer {
  padding: 1.25rem 1.75rem;
  border-top: 1px solid rgba(0, 0, 0, 0.08);
  background: linear-gradient(180deg, rgba(0, 0, 0, 0.02) 0%, rgba(0, 0, 0, 0.04) 100%);
  transition: all 0.3s ease;
}

.card:hover .card-footer {
  background: linear-gradient(180deg, rgba(59, 130, 246, 0.05) 0%, rgba(59, 130, 246, 0.08) 100%);
  border-top-color: rgba(59, 130, 246, 0.2);
}

/* Responsive */
@media (max-width: 768px) {
  .card-image {
    height: 180px;
  }

  .card-content {
    padding: 1.5rem;
  }

  .card-title {
    font-size: 1.25rem;
  }

  .card-description {
    font-size: 0.95rem;
  }

  .card.clickable:hover {
    transform: translateY(-6px) scale(1.01);
  }
}

@media (max-width: 480px) {
  .card-image {
    height: 160px;
  }

  .card-content {
    padding: 1.25rem;
  }

  .card-title {
    font-size: 1.125rem;
  }

  .card-description {
    font-size: 0.9rem;
  }

  .card-footer {
    padding: 1rem 1.25rem;
  }
}
</style>
