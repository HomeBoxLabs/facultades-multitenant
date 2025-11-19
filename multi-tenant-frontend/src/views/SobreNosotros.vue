<template>
  <main class="main">
    <!-- Hero Section con Imagen -->
    <section class="sobre-nosotros-hero section" style="background-color: color-mix(in srgb, var(--accent-color), transparent 97%);">
      <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="hero-image-wrapper">
              <img src="/assets/res/oti.jpg" alt="Sobre Nosotros" class="img-fluid rounded shadow">
            </div>
          </div>
          <div class="col-lg-7">
            <div class="hero-content">
              <h1 class="hero-title mb-4">Sobre Nosotros</h1>
              <p class="hero-description">
                Conoce más acerca de nuestra Facultad de Ingeniería Electrónica, nuestra misión, visión y los logros que nos definen como institución académica de excelencia.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Cifras Section -->
    <section class="cifras-section section">
      <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
          <h2>Cifras</h2>
          <p>Datos estadísticos de nuestra comunidad académica</p>
        </div>

        <div class="row g-4">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="cifra-card">
              <div class="cifra-icon">
                <i class="bi bi-person-fill"></i>
              </div>
              <div class="cifra-content">
                <h3 class="cifra-numero">1,250</h3>
                <p class="cifra-label">Estudiantes Matriculados</p>
                <p class="cifra-descripcion">
                  Estudiantes activos cursando el programa de Ingeniería Electrónica en diferentes semestres académicos.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="cifra-card">
              <div class="cifra-icon">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="cifra-content">
                <h3 class="cifra-numero">45</h3>
                <p class="cifra-label">Docentes Especializados</p>
                <p class="cifra-descripcion">
                  Profesores altamente calificados con experiencia en diferentes áreas de la ingeniería electrónica y disciplinas afines.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Información de la Escuela Section -->
    <section class="informacion-section section light-background">
      <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
          <h2>Información de la Escuela</h2>
        </div>

        <div class="row g-4">
          <!-- Misión -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="info-card h-100">
              <div class="info-header">
                <i class="bi bi-compass"></i>
                <h3>Misión</h3>
              </div>
              <div class="info-content">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>
                  Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.
                </p>
                <p>
                  Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam.
                </p>
                <p>
                  Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat.
                </p>
                <p>
                  Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                </p>
                <p>
                  Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                </p>
              </div>
            </div>
          </div>

          <!-- Visión -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="info-card h-100">
              <div class="info-header">
                <i class="bi bi-eye"></i>
                <h3>Visión</h3>
              </div>
              <div class="info-content">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim.
                </p>
                <p>
                  Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio.
                </p>
                <p>
                  Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus.
                </p>
                <p>
                  In augue lacus, viverra vitae, consectetur et, ullamcorper at, tellus. Sed lectus. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                </p>
                <p>
                  Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet.
                </p>
                <p>
                  Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. Sed lectus. Integer euismod lacus luctus magna. Quisque cursus, metus vitae pharetra auctor, sem massa mattis sem.
                </p>
                <p>
                  At interdum magnaCras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim aliquam purus sit amet luctus venenatis.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
</template>

<script setup>
</script>

<style scoped>
.sobre-nosotros-hero {
  padding-top: 140px;
  padding-bottom: 80px;
}

.hero-image-wrapper img {
  border-radius: 12px;
  max-width: 100%;
  height: auto;
}

.hero-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.hero-description {
  font-size: 1.125rem;
  line-height: 1.6;
  color: var(--default-color);
}

/* Cifras Section */
.cifras-section {
  padding: 80px 0;
}

.cifra-card {
  background: var(--surface-color);
  border-radius: 15px;
  padding: 2.5rem;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  height: 100%;
  border: 2px solid color-mix(in srgb, var(--accent-color), transparent 90%);
}

.cifra-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
  border-color: var(--accent-color);
}

.cifra-icon {
  width: 80px;
  height: 80px;
  background: linear-gradient(135deg, var(--accent-color), color-mix(in srgb, var(--accent-color), transparent 30%));
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1.5rem;
}

.cifra-icon i {
  font-size: 2.5rem;
  color: white;
}

.cifra-numero {
  font-size: 3.5rem;
  font-weight: 800;
  color: var(--accent-color);
  margin-bottom: 0.5rem;
  font-family: var(--heading-font);
}

.cifra-label {
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--heading-color);
  margin-bottom: 1rem;
}

.cifra-descripcion {
  font-size: 1rem;
  line-height: 1.6;
  color: var(--default-color);
  margin: 0;
}

/* Información Section */
.informacion-section {
  padding: 80px 0;
}

.info-card {
  background: var(--surface-color);
  border-radius: 15px;
  padding: 2.5rem;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
  border-left: 5px solid var(--accent-color);
  transition: all 0.3s ease;
}

.info-card:hover {
  box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
  transform: translateY(-5px);
}

.info-header {
  display: flex;
  align-items: center;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid color-mix(in srgb, var(--accent-color), transparent 85%);
}

.info-header i {
  font-size: 2.5rem;
  color: var(--accent-color);
  margin-right: 1rem;
}

.info-header h3 {
  font-size: 2rem;
  font-weight: 700;
  color: var(--heading-color);
  margin: 0;
}

.info-content p {
  font-size: 1rem;
  line-height: 1.8;
  color: var(--default-color);
  text-align: justify;
  margin-bottom: 1rem;
}

.info-content p:last-child {
  margin-bottom: 0;
}

/* Responsive */
@media (max-width: 991.98px) {
  .sobre-nosotros-hero {
    padding-top: 100px;
    padding-bottom: 60px;
  }

  .hero-title {
    font-size: 2rem;
  }

  .cifras-section,
  .informacion-section {
    padding: 60px 0;
  }

  .cifra-numero {
    font-size: 3rem;
  }

  .info-header h3 {
    font-size: 1.75rem;
  }
}

@media (max-width: 767.98px) {
  .hero-title {
    font-size: 1.75rem;
  }

  .hero-description {
    font-size: 1rem;
  }

  .cifra-card,
  .info-card {
    padding: 2rem;
    margin-bottom: 1.5rem;
  }

  .cifra-icon {
    width: 70px;
    height: 70px;
  }

  .cifra-icon i {
    font-size: 2rem;
  }

  .cifra-numero {
    font-size: 2.5rem;
  }

  .cifra-label {
    font-size: 1.25rem;
  }

  .info-header {
    flex-direction: column;
    align-items: flex-start;
  }

  .info-header i {
    margin-bottom: 0.5rem;
    margin-right: 0;
  }

  .info-header h3 {
    font-size: 1.5rem;
  }
}
</style>
