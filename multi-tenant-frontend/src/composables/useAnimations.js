import { onMounted } from 'vue'
import GLightbox from 'glightbox'

export function useAnimations() {
  const initGLightbox = () => {
    GLightbox({
      selector: '.glightbox'
    })
  }

  onMounted(() => {
    initGLightbox()
  })

  return {
    initGLightbox
  }
}
