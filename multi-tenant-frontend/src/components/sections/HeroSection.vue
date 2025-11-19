<template>
  <section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <!-- Hero Principal -->
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="badge-wrapper mb-3">
            <div class="d-inline-flex align-items-center rounded-pill border border-accent-light">
              <div class="icon-circle me-2">
                <img src="https://vriunap.pe/absmain/imgs/unap.png" width="22" alt="UNAP Logo">
              </div>
              <span class="badge-text me-3">UNA Puno</span>
            </div>
          </div>

          <h1 class="hero-title mb-4">
            Facultad de Ingeniería Electrónica
          </h1>

          <p class="hero-description mb-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          </p>
        </div>

        <div class="col-lg-6">
          <CarruselNoticias />
        </div>
      </div>

      <!-- Botones de Interés -->
      <div class="row feature-boxes">
        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
          <a href="https://aulavirtual2.unap.edu.pe/login?ReturnUrl=%2F" target="_blank" class="feature-link">
            <div class="feature-box">
              <div class="feature-icon me-sm-4 mb-3 mb-sm-0">
                <i class="bi bi-book"></i>
              </div>
              <div class="feature-content">
                <h3 class="feature-title">Aula Virtual</h3>
                <p class="feature-text">
                  Accede a la plataforma de educación virtual de la UNAP para consultar tus cursos, materiales y calificaciones en línea.
                </p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
          <a href="https://biblioteca.unap.edu.pe/opac_css/" target="_blank" class="feature-link">
            <div class="feature-box">
              <div class="feature-icon me-sm-4 mb-3 mb-sm-0">
                <i class="bi bi-journal-bookmark"></i>
              </div>
              <div class="feature-content">
                <h3 class="feature-title">Biblioteca</h3>
                <p class="feature-text">
                  Consulta el catálogo bibliográfico, reserva materiales y accede a recursos digitales desde nuestra biblioteca universitaria.
                </p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
          <a href="https://ocri.unap.edu.pe/convenios" target="_blank" class="feature-link">
            <div class="feature-box">
              <div class="feature-icon me-sm-4 mb-3 mb-sm-0">
                <i class="bi bi-globe"></i>
              </div>
              <div class="feature-content">
                <h3 class="feature-title">Convenios</h3>
                <p class="feature-text">
                  Explora los convenios nacionales e internacionales de la UNAP para oportunidades de intercambio y colaboración académica.
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>

    </div>

    <!-- Propósitos del Programa de Estudios -->
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <div class="section-title text-center mb-4">
            <h2>Propósitos del Programa de Estudios</h2>
          </div>
          <div class="content-box p-4 bg-white rounded shadow-sm">
            <p class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Plan de Estudios y Malla Curricular -->
    <div class="container mt-5 pb-5">
      <div class="row">
        <div class="col-12" data-aos="fade-up" data-aos-delay="100">
          <div class="section-title text-center mb-4">
            <h2>Plan de Estudios y Malla Curricular</h2>
          </div>
          <div class="content-box p-4 bg-white rounded shadow-sm">
            <p class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.
            </p>
          </div>
        </div>
      </div>
    </div>

  </section>
</template>

<script setup>
import CarruselNoticias from '@/components/ui/CarruselNoticias.vue'
</script>

<style scoped>
.feature-link {
  text-decoration: none;
  color: inherit;
  display: block;
}

.feature-link:hover {
  color: inherit;
}

.feature-box {
  cursor: pointer;
  transition: all 0.3s ease;
}

.content-box {
  border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
}

.text-justify {
  text-align: justify;
  line-height: 1.8;
  color: var(--default-color);
}
</style>
