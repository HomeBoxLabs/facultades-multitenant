<template>
  <header id="header" class="header d-flex align-items-center fixed-top" style="background-color: #FFFFFFF5">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="https://oti.unap.edu.pe/recursos/oti-ofic.png" alt="Ir al inicio">
      </a>

      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">

          <button
            class="navbar-toggler"
            type="button"
            @click="toggleMobileMenu"
            :aria-expanded="mobileMenuOpen"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" :class="{ 'show': mobileMenuOpen }" id="navbarMenu">
            <ul class="navbar-nav me-auto">

              <!-- Inicio -->
              <li class="nav-item">
                <a class="nav-link" href="/" @click="closeMobileMenu">Inicio</a>
              </li>

              <!-- Sobre Nosotros -->
              <li class="nav-item">
                <a class="nav-link" href="/sobre-nosotros" @click="closeMobileMenu">Sobre Nosotros</a>
              </li>

              <!-- Programas -->
              <li class="nav-item">
                <a class="nav-link" href="/programas" @click="closeMobileMenu">Programas</a>
              </li>

              <!-- Autoridades -->
              <li class="nav-item">
                <a class="nav-link" href="/autoridades" @click="closeMobileMenu">Autoridades</a>
              </li>

              <!-- Documentos -->
              <li class="nav-item">
                <a class="nav-link" href="/documentos" @click="closeMobileMenu">Documentos</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>

    </div>
  </header>
</template>

<script setup>
import { ref } from 'vue'

const mobileMenuOpen = ref(false)

const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value
}

const closeMobileMenu = () => {
  mobileMenuOpen.value = false
}
</script>

<style scoped>
/* Estilos específicos si son necesarios */
</style>
