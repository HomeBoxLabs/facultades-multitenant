import { defineStore } from "pinia";

// comentario de dAirxp
export const useTenantStore = defineStore("tenant", {
  state: () => ({
    tenant: {
      nombre: "Facultad de Economía",
      logo: "/logo.png", // Ruta relativa o URL
      banner: "/banner.jpg",
      menu: [
        { label: "Inicio", path: "/" },
        { label: "Sobre Nosotros", path: "/sobre" },
        { label: "Programas", path: "/programas" },
        { label: "Autoridades", path: "/autoridades" },
        { label: "Documentos", path: "/documentos" },
      ],
      color_primario: "#3b82f6",
      color_secundario: "#1e40af",
      color_acento: "#60a5fa",
      presentacion_titulo: "Bienvenidos a la Facultad de Economía",
      presentacion_texto:
        "Somos una institución dedicada a formar profesionales en el área económica con excelencia académica.",
      ofrecemos: [
        {
          titulo: "Carreras de Calidad",
          descripcion:
            "Ofrecemos programas académicos reconocidos a nivel nacional.",
          imagen: "/carreras.jpg",
        },
        {
          titulo: "Docentes Expertos",
          descripcion:
            "Nuestro cuerpo docente está compuesto por profesionales con amplia experiencia.",
          imagen: "/docentes.jpg",
        },
        {
          titulo: "Instalaciones Modernas",
          descripcion:
            "Contamos con aulas equipadas y laboratorios de última generación.",
          imagen: "/instalaciones.jpg",
        },
      ],
      historia:
        "Fundada en 1990, la Facultad de Economía ha sido pionera en la formación de economistas en el país.",
      mision:
        "Formar profesionales competentes en el campo de la economía, contribuyendo al desarrollo sostenible.",
      vision: "Ser la facultad líder en educación económica en la región.",
      organigrama: "/organigrama.jpg",
      programas: [
        {
          id: 1,
          nombre: "Licenciatura en Economía",
          descripcion:
            "Programa integral que prepara a los estudiantes en teoría económica y aplicaciones prácticas.",
          perfil_egresado:
            "Profesional capaz de analizar y resolver problemas económicos.",
          campo_laboral: "Bancos, empresas privadas, sector público.",
          duracion: "4 años",
          malla_curricular: "/malla-economia.pdf",
        },
        {
          id: 2,
          nombre: "Maestría en Finanzas",
          descripcion:
            "Programa avanzado enfocado en finanzas corporativas y mercados.",
          perfil_egresado:
            "Especialista en gestión financiera y análisis de inversiones.",
          campo_laboral: "Instituciones financieras, consultorías.",
          duracion: "2 años",
          malla_curricular: "/malla-finanzas.pdf",
        },
      ],
      autoridades: [
        {
          id: 1,
          nombre: "Dr. Juan Pérez",
          cargo: "Decano",
          imagen: "/decan.jpg",
          email: "decan@facultad.edu",
          telefono: "+123456789",
        },
        {
          id: 2,
          nombre: "Dra. María García",
          cargo: "Vicedecana",
          imagen: "/vicedecana.jpg",
          email: "vicedecana@facultad.edu",
          telefono: "+123456780",
        },
      ],
      documentos: [
        {
          id: 1,
          titulo: "Reglamento Académico",
          descripcion: "Normas y procedimientos académicos.",
          archivo: "/reglamento.pdf",
          fecha: "2023-01-01",
        },
        {
          id: 2,
          titulo: "Calendario Académico",
          descripcion: "Fechas importantes del año académico.",
          archivo: "/calendario.pdf",
          fecha: "2023-01-01",
        },
      ],
      email: "info@facultad.edu",
      telefono: "+1234567890",
      direccion: "Av. Universidad 123, Ciudad",
      redes_sociales: {
        facebook: "https://facebook.com/facultad",
        twitter: "https://twitter.com/facultad",
        instagram: "https://instagram.com/facultad",
        linkedin: "https://linkedin.com/company/facultad",
      },
    },
    loading: false,
    error: null,
  }),

  getters: {
    // Getters para acceder a datos específicos del tenant
    tenantName: (state) => state.tenant?.nombre || "",
    tenantLogo: (state) => state.tenant?.logo || "",
    tenantBanner: (state) => state.tenant?.banner || "",
    tenantMenu: (state) => state.tenant?.menu || [],
    primaryColor: (state) => state.tenant?.color_primario || "#3b82f6",
    secondaryColor: (state) => state.tenant?.color_secundario || "#1e40af",
    presentacion: (state) => ({
      titulo: state.tenant?.presentacion_titulo || "",
      texto: state.tenant?.presentacion_texto || "",
    }),
    ofrecemos: (state) => state.tenant?.ofrecemos || [],
    historia: (state) => state.tenant?.historia || "",
    mision: (state) => state.tenant?.mision || "",
    vision: (state) => state.tenant?.vision || "",
    organigrama: (state) => state.tenant?.organigrama || "",
    programas: (state) => state.tenant?.programas || [],
    autoridades: (state) => state.tenant?.autoridades || [],
    documentos: (state) => state.tenant?.documentos || [],
    contacto: (state) => ({
      email: state.tenant?.email || "",
      telefono: state.tenant?.telefono || "",
      direccion: state.tenant?.direccion || "",
    }),
    redesSociales: (state) => state.tenant?.redes_sociales || {},
    isLoaded: (state) => state.tenant !== null,
  },

  actions: {
    // Aplicar colores del tenant al tema global
    applyThemeColors() {
      if (this.tenant?.color_primario) {
        document.documentElement.style.setProperty(
          "--color-primary",
          this.tenant.color_primario
        );
      }
      if (this.tenant?.color_secundario) {
        document.documentElement.style.setProperty(
          "--color-secondary",
          this.tenant.color_secundario
        );
      }
      if (this.tenant?.color_acento) {
        document.documentElement.style.setProperty(
          "--color-accent",
          this.tenant.color_acento
        );
      }
    },

    // Limpiar datos del tenant (útil para logout)
    clearTenant() {
      this.tenant = null;
      this.error = null;
    },

    // Actualizar datos específicos del tenant
    updateTenantData(data) {
      if (this.tenant) {
        this.tenant = { ...this.tenant, ...data };
        this.applyThemeColors();
      }
    },
  },
});
