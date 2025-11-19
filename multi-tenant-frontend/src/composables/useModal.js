import { ref } from 'vue'

export function useModal() {
  const isVisible = ref(false)
  const currentContent = ref(null)

  const show = (content = null) => {
    currentContent.value = content
    isVisible.value = true
  }

  const hide = () => {
    isVisible.value = false
    currentContent.value = null
  }

  const toggle = () => {
    isVisible.value = !isVisible.value
  }

  return {
    isVisible,
    currentContent,
    show,
    hide,
    toggle
  }
}
