import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Sobre from '../views/Sobre.vue'
import Programas from '../views/Programas.vue'
import Autoridades from '../views/Autoridades.vue'
import Documentos from '../views/Documentos.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      title: 'Inicio'
    }
  },
  {
    path: '/sobre',
    name: 'Sobre',
    component: Sobre,
    meta: {
      title: 'Sobre Nosotros'
    }
  },
  {
    path: '/programas',
    name: 'Programas',
    component: Programas,
    meta: {
      title: 'Programas Académicos'
    }
  },
  {
    path: '/autoridades',
    name: 'Autoridades',
    component: Autoridades,
    meta: {
      title: 'Autoridades'
    }
  },
  {
    path: '/documentos',
    name: 'Documentos',
    component: Documentos,
    meta: {
      title: 'Documentos'
    }
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { top: 0 }
    }
  }
})

// Actualizar título de la página
router.afterEach((to) => {
  document.title = to.meta.title ? `${to.meta.title}` : 'Multi-Tenant'
})

export default router
