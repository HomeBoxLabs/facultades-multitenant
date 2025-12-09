import { ref, computed } from "vue";
import api from "./useApi.js";

const tenantData = ref(null);
const loading = ref(false);
const error = ref(null);

export function useTenant() {
  const fetchTenant = async (options = {}) => {
    loading.value = true;
    error.value = null;
    try {
      // Construir parámetros para la API
      const params = {};
      if (options.tenant_id) params.tenant_id = options.tenant_id;
      if (options.subdomain) params.subdomain = options.subdomain;

      const response = await api.get("/tenant", { params });
      tenantData.value = response.data.data;

      // Aplicar colores dinámicamente al CSS
      if (tenantData.value) {
        const root = document.documentElement;
        root.style.setProperty(
          "--primary-color",
          tenantData.value.color_primario
        );
        root.style.setProperty(
          "--secondary-color",
          tenantData.value.color_secundario
        );
        root.style.setProperty("--accent-color", tenantData.value.color_acento);
      }
    } catch (err) {
      error.value = err.message;
      console.error("Error fetching tenant:", err);
    } finally {
      loading.value = false;
    }
  };

  const tenant = computed(() => tenantData.value);
  const isLoading = computed(() => loading.value);
  const hasError = computed(() => error.value);

  // Computed properties para acceso directo
  const programas = computed(() => tenantData.value?.programas || []);
  const autoridades = computed(() => tenantData.value?.autoridades || []);
  const documentos = computed(() => tenantData.value?.documentos || []);
  const menu = computed(() => tenantData.value?.menu || []);
  const cifras = computed(() => tenantData.value?.cifras || []);
  const planEstudios = computed(() => tenantData.value?.plan_estudios || []);
  const lineasInvestigacion = computed(
    () => tenantData.value?.lineas_investigacion || []
  );

  return {
    tenant,
    isLoading,
    hasError,
    fetchTenant,
    // Accesos directos
    programas,
    autoridades,
    documentos,
    menu,
    cifras,
    planEstudios,
    lineasInvestigacion,
  };
}
