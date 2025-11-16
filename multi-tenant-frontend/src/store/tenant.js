import { defineStore } from 'pinia'
import axios from 'axios'

export const useTenantStore = defineStore('tenant', {
  state: () => ({
    tenant: null,
    loading: false,
    error: null,
    // URL del backend Laravel (ajustar según tu configuración)
    apiUrl: import.meta.env.VITE_API_URL || 'http://localhost:8000/api'
  }),

  getters: {
    // Getters para acceder a datos específicos del tenant
    tenantName: (state) => state.tenant?.nombre || '',
    tenantLogo: (state) => state.tenant?.logo || '',
    tenantBanner: (state) => state.tenant?.banner || '',
    tenantMenu: (state) => state.tenant?.menu || [],
    primaryColor: (state) => state.tenant?.color_primario || '#3b82f6',
    secondaryColor: (state) => state.tenant?.color_secundario || '#1e40af',
    presentacion: (state) => ({
      titulo: state.tenant?.presentacion_titulo || '',
      texto: state.tenant?.presentacion_texto || ''
    }),
    ofrecemos: (state) => state.tenant?.ofrecemos || [],
    historia: (state) => state.tenant?.historia || '',
    mision: (state) => state.tenant?.mision || '',
    vision: (state) => state.tenant?.vision || '',
    organigrama: (state) => state.tenant?.organigrama || '',
    programas: (state) => state.tenant?.programas || [],
    autoridades: (state) => state.tenant?.autoridades || [],
    documentos: (state) => state.tenant?.documentos || [],
    contacto: (state) => ({
      email: state.tenant?.email || '',
      telefono: state.tenant?.telefono || '',
      direccion: state.tenant?.direccion || ''
    }),
    redesSociales: (state) => state.tenant?.redes_sociales || {},
    isLoaded: (state) => state.tenant !== null
  },

  actions: {
    // Obtener datos del tenant desde el backend
    async fetchTenant(tenantId = null) {
      this.loading = true
      this.error = null

      try {
        // Si no se proporciona tenantId, se puede obtener del subdominio o parámetro
        const endpoint = tenantId
          ? `${this.apiUrl}/tenant/${tenantId}`
          : `${this.apiUrl}/tenant`

        const response = await axios.get(endpoint)
        this.tenant = response.data.data || response.data

        // Aplicar colores dinámicos al documento
        this.applyThemeColors()

        return this.tenant
      } catch (error) {
        this.error = error.response?.data?.message || 'Error al cargar datos del tenant'
        console.error('Error fetching tenant:', error)
        throw error
      } finally {
        this.loading = false
      }
    },

    // Obtener tenant por subdominio
    async fetchTenantBySubdomain(subdomain) {
      this.loading = true
      this.error = null

      try {
        const endpoint = `${this.apiUrl}/tenant?subdomain=${subdomain}`
        const response = await axios.get(endpoint)
        this.tenant = response.data.data || response.data

        // Aplicar colores dinámicos al documento
        this.applyThemeColors()

        return this.tenant
      } catch (error) {
        this.error = error.response?.data?.message || 'Error al cargar datos del tenant'
        console.error('Error fetching tenant by subdomain:', error)
        throw error
      } finally {
        this.loading = false
      }
    },

    // Aplicar colores del tenant al tema global
    applyThemeColors() {
      if (this.tenant?.color_primario) {
        document.documentElement.style.setProperty('--color-primary', this.tenant.color_primario)
      }
      if (this.tenant?.color_secundario) {
        document.documentElement.style.setProperty('--color-secondary', this.tenant.color_secundario)
      }
      if (this.tenant?.color_acento) {
        document.documentElement.style.setProperty('--color-accent', this.tenant.color_acento)
      }
    },

    // Limpiar datos del tenant (útil para logout)
    clearTenant() {
      this.tenant = null
      this.error = null
    },

    // Actualizar datos específicos del tenant
    updateTenantData(data) {
      if (this.tenant) {
        this.tenant = { ...this.tenant, ...data }
        this.applyThemeColors()
      }
    }
  }
})
