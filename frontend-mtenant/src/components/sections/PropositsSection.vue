<template>
  <section v-if="tenant?.propositos" class="proposits section">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <div class="section-title text-center mb-4">
            <h2>Propósitos del Programa de Estudios</h2>
          </div>
          <div class="content-box p-4 bg-white rounded shadow-sm">
            <p class="text-justify">
              {{ tenant.propositos }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { useTenant } from "@/composables/useTenant";

const { tenant } = useTenant();
</script>

<style scoped>
.content-box {
  border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
}

.text-justify {
  text-align: justify;
  line-height: 1.8;
  color: var(--default-color);
}
</style>
