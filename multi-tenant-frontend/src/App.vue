<script setup>
import { onMounted } from "vue";
import { useTenantStore } from "./store/tenant";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

const tenantStore = useTenantStore();

// Aplicar colores del tema al montar la aplicación
onMounted(() => {
  tenantStore.applyThemeColors();
});
</script>

<template>
  <div id="app">
    <Header />
    <main class="main-content">
      <router-view v-if="tenantStore.isLoaded" />
      <div v-else class="loading-container">
        <div class="loading-spinner"></div>
        <p>Cargando...</p>
      </div>
    </main>
    <Footer />
  </div>
</template>

<style>
#app {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.main-content {
  flex: 1;
  display: flex;
  flex-direction: column;
}

/* Loading */
.loading-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 400px;
  color: #6b7280;
}

.loading-spinner {
  width: 50px;
  height: 50px;
  border: 4px solid #e5e7eb;
  border-top-color: var(--color-primary, #3b82f6);
  border-radius: 50%;
  animation: spin 1s linear infinite;
  margin-bottom: 1rem;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

.loading-container p {
  font-size: 1.125rem;
  margin: 0;
}
</style>
