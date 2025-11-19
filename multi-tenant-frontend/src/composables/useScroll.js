import { ref, onMounted, onUnmounted } from 'vue'

export function useScroll() {
  const scrollY = ref(0)
  const isScrolled = ref(false)

  const updateScroll = () => {
    scrollY.value = window.scrollY
    isScrolled.value = window.scrollY > 100
  }

  const scrollToTop = () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    })
  }

  const scrollToElement = (elementId) => {
    const element = document.querySelector(elementId)
    if (element) {
      const scrollMarginTop = getComputedStyle(element).scrollMarginTop
      window.scrollTo({
        top: element.offsetTop - parseInt(scrollMarginTop || 0),
        behavior: 'smooth'
      })
    }
  }

  onMounted(() => {
    window.addEventListener('scroll', updateScroll)
    updateScroll()
  })

  onUnmounted(() => {
    window.removeEventListener('scroll', updateScroll)
  })

  return {
    scrollY,
    isScrolled,
    scrollToTop,
    scrollToElement
  }
}
