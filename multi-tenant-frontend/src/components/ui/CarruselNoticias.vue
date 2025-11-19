<template>
  <div class="carrusel-noticias">
    <transition name="fade" mode="out-in">
      <div :key="currentIndex" class="noticia-card">
        <img
          :src="noticias[currentIndex].imagen"
          :alt="noticias[currentIndex].titulo"
          class="noticia-imagen"
          loading="lazy"
        >
        <div class="noticia-overlay">
          <h3 class="noticia-titulo">{{ noticias[currentIndex].titulo }}</h3>
          <p class="noticia-descripcion">{{ noticias[currentIndex].descripcion }}</p>
        </div>
      </div>
    </transition>

    <!-- Indicadores -->
    <div class="carrusel-indicadores">
      <button
        v-for="(noticia, index) in noticias"
        :key="index"
        :class="['indicador', { 'active': index === currentIndex }]"
        @click="goToSlide(index)"
        :aria-label="`Ir a noticia ${index + 1}`"
      ></button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const noticias = ref([
  {
    imagen: '/assets/img/notis/noti1.jpg',
    titulo: 'Noticia Destacada 1',
    descripcion: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
  },
  {
    imagen: '/assets/img/notis/noti2.jpg',
    titulo: 'Noticia Destacada 2',
    descripcion: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
  },
  {
    imagen: '/assets/img/notis/noti3.jpg',
    titulo: 'Noticia Destacada 3',
    descripcion: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
  }
])

const currentIndex = ref(0)
let intervalId = null

const nextSlide = () => {
  currentIndex.value = (currentIndex.value + 1) % noticias.value.length
}

const goToSlide = (index) => {
  currentIndex.value = index
  resetInterval()
}

const resetInterval = () => {
  if (intervalId) {
    clearInterval(intervalId)
  }
  intervalId = setInterval(nextSlide, 5000)
}

onMounted(() => {
  intervalId = setInterval(nextSlide, 5000)
})

onUnmounted(() => {
  if (intervalId) {
    clearInterval(intervalId)
  }
})
</script>

<style scoped>
.carrusel-noticias {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.noticia-card {
  position: relative;
  width: 100%;
  height: 100%;
  min-height: 400px;
}

.noticia-imagen {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.noticia-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.3));
  padding: 2rem 1.5rem;
  color: white;
}

.noticia-titulo {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 0.75rem;
  color: white;
  font-family: var(--heading-font);
}

.noticia-descripcion {
  font-size: 0.95rem;
  line-height: 1.6;
  margin: 0;
  color: rgba(255, 255, 255, 0.95);
}

.carrusel-indicadores {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 0.5rem;
  z-index: 10;
}

.indicador {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.5);
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  padding: 0;
}

.indicador.active {
  background-color: white;
  width: 25px;
  border-radius: 5px;
}

.indicador:hover {
  background-color: rgba(255, 255, 255, 0.8);
}

/* Animaciones de transición */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Responsive */
@media (max-width: 767.98px) {
  .noticia-card {
    min-height: 350px;
  }

  .noticia-overlay {
    padding: 1.5rem 1rem;
  }

  .noticia-titulo {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .noticia-descripcion {
    font-size: 0.875rem;
  }
}

@media (max-width: 575.98px) {
  .noticia-card {
    min-height: 300px;
  }

  .noticia-titulo {
    font-size: 1.1rem;
  }

  .noticia-descripcion {
    font-size: 0.825rem;
  }
}
</style>
