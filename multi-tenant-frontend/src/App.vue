<template>
  <div id="app" :class="{ 'scrolled': isScrolled }">

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
import { useScroll } from '@/composables/useScroll'
import { useAnimations } from '@/composables/useAnimations'

// Layout Components
import AppHeader from '@/components/layout/AppHeader.vue'
import AppFooter from '@/components/layout/AppFooter.vue'
import ScrollToTop from '@/components/layout/ScrollToTop.vue'

// Composables
const { isScrolled } = useScroll()
useAnimations()
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
