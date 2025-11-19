import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/Home.vue'
import SobreNosotros from '@/views/SobreNosotros.vue'
import Programas from '@/views/Programas.vue'
import Autoridades from '@/views/Autoridades.vue'
import Documentos from '@/views/Documentos.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: { title: 'Inicio - Facultad de Ingeniería Electrónica' }
  },
  {
    path: '/sobre-nosotros',
    name: 'SobreNosotros',
    component: SobreNosotros,
    meta: { title: 'Sobre Nosotros - Facultad de Ingeniería Electrónica' }
  },
  {
    path: '/programas',
    name: 'Programas',
    component: Programas,
    meta: { title: 'Programas - Facultad de Ingeniería Electrónica' }
  },
  {
    path: '/autoridades',
    name: 'Autoridades',
    component: Autoridades,
    meta: { title: 'Autoridades - Facultad de Ingeniería Electrónica' }
  },
  {
    path: '/documentos',
    name: 'Documentos',
    component: Documentos,
    meta: { title: 'Documentos - Facultad de Ingeniería Electrónica' }
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else if (to.hash) {
      return {
        el: to.hash,
        behavior: 'smooth'
      }
    } else {
      return { top: 0, behavior: 'smooth' }
    }
  }
})

// Actualizar título de página
router.beforeEach((to, from, next) => {
  document.title = to.meta.title || 'Facultad de Ingeniería Electrónica'
  next()
})

export default router
