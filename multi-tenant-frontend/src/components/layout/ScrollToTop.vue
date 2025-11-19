<template>
  <a
    href="#"
    id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center"
    :class="{ active: isScrolled }"
    @click.prevent="scrollToTop"
  >
    <i class="bi bi-arrow-up-short"></i>
  </a>
</template>

<script setup>
import { useScroll } from '@/composables/useScroll'

const { isScrolled, scrollToTop } = useScroll()
</script>

<style scoped>
/* Los estilos ya están en main.css */
</style>
