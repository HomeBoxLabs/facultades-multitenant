<template>
  <div id="app" :class="{ scrolled: isScrolled }">
    <!-- Header -->
    <AppHeader />

    <!-- Main Content con RouterView -->
    <router-view />

    <!-- Footer -->
    <AppFooter />

    <!-- Scroll to Top Button -->
    <ScrollToTop />
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import { useScroll } from "@/composables/useScroll";
import { useAnimations } from "@/composables/useAnimations";
import { useTenant } from "@/composables/useTenant";

// Layout Components
import AppHeader from "@/components/layout/AppHeader.vue";
import AppFooter from "@/components/layout/AppFooter.vue";
import ScrollToTop from "@/components/layout/ScrollToTop.vue";

// Composables
const { isScrolled } = useScroll();
useAnimations();

const { fetchTenant } = useTenant();

// Cargar tenant al inicio
onMounted(async () => {
  // Obtener parámetros de la URL
  const urlParams = new URLSearchParams(window.location.search);
  const tenantId = urlParams.get("tenant_id");
  const facultad = urlParams.get("facultad");

  // Detectar subdominio del hostname
  const hostname = window.location.hostname;
  const subdomain = hostname.split(".")[0];

  // Prioridad: tenant_id > facultad > subdomain
  if (tenantId) {
    await fetchTenant({ tenant_id: tenantId });
  } else if (facultad) {
    await fetchTenant({ subdomain: facultad });
  } else if (subdomain !== "localhost") {
    await fetchTenant({ subdomain: subdomain });
  } else {
    await fetchTenant(); // Tenant por defecto
  }
});
</script>

<style>
body {
  margin: 0;
  padding: 0;
}

.index-page {
  margin: 0;
  padding: 0;
}
</style>
