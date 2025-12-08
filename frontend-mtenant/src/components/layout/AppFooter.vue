<template>
  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="footer-grid">

        <!-- Columnas 1 y 2 combinadas (más ancha) -->
        <div class="footer-col footer-col-main">
          <a href="/" class="logo d-flex align-items-center mb-3">
            <span class="sitename">Facultad de Ingeniería Electrónica</span>
          </a>
          <div class="footer-contact">
            <p class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Av. Universidad 123, Ciudad</p>
            <p class="mb-0 fw-bold">Contactos</p>
            <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i>Tel: +1234567890</p>
            <p class="mb-3"><i class="bi bi-envelope-fill me-2"></i>Email: info@facultad.edu</p>
          </div>
        </div>

        <!-- Columna 3: Enlaces Rápidos -->
        <div class="footer-col">
          <h4>Enlaces Rápidos</h4>
          <ul class="footer-links">
            <li><a href="/">Inicio</a></li>
            <li><a href="/sobre-nosotros">Sobre Nosotros</a></li>
            <li><a href="/programas">Programas</a></li>
            <li><a href="/documentos">Documentos</a></li>
          </ul>
        </div>

        <!-- Columna 4: Síguenos -->
        <div class="footer-col">
          <h4>Síguenos</h4>
          <div class="social-links">
            <a href="#" aria-label="Facebook" title="Facebook">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="#" aria-label="X (Twitter)" title="X (Twitter)">
              <i class="bi bi-twitter-x"></i>
            </a>
            <a href="#" aria-label="Instagram" title="Instagram">
              <i class="bi bi-instagram"></i>
            </a>
            <a href="#" aria-label="LinkedIn" title="LinkedIn">
              <i class="bi bi-linkedin"></i>
            </a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">OTI - UNAP</strong> <span>2025</span></p>
      <div class="credits">
        Desarrollado en <a href="#">Subunidad de Gobierno Electrónico</a>
      </div>
    </div>

  </footer>
</template>

<script setup>
</script>

<style scoped>
.footer-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 2rem;
  align-items: start;
}

.footer-col-main {
  grid-column: span 1;
}

.footer-col h4 {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 1rem;
  color: var(--heading-color);
}

.logo .sitename {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--heading-color);
}

.footer-contact p {
  color: var(--default-color);
  font-size: 14px;
  line-height: 1.6;
}

.footer-contact i {
  color: var(--accent-color);
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 0.75rem;
}

.footer-links a {
  color: color-mix(in srgb, var(--default-color), transparent 30%);
  text-decoration: none;
  font-size: 14px;
  transition: all 0.3s ease;
  display: inline-block;
}

.footer-links a:hover {
  color: var(--accent-color);
  transform: translateX(5px);
}

.social-links {
  display: flex;
  gap: 0.75rem;
  flex-wrap: wrap;
}

.social-links a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid color-mix(in srgb, var(--default-color), transparent 50%);
  font-size: 16px;
  color: color-mix(in srgb, var(--default-color), transparent 20%);
  transition: all 0.3s ease;
  text-decoration: none;
}

.social-links a:hover {
  color: var(--accent-color);
  border-color: var(--accent-color);
  transform: translateY(-3px);
}

.copyright {
  padding: 25px 0;
  border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
}

.copyright p {
  margin-bottom: 0;
  font-size: 14px;
}

.credits {
  margin-top: 8px;
  font-size: 13px;
}

.credits a {
  color: var(--accent-color);
  text-decoration: none;
  transition: color 0.3s ease;
}

.credits a:hover {
  color: color-mix(in srgb, var(--accent-color), transparent 25%);
}

/* Responsive Design */
@media (max-width: 991.98px) {
  .footer-grid {
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
  }

  .footer-col-main {
    grid-column: span 2;
  }
}

@media (max-width: 767.98px) {
  .footer-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }

  .footer-col-main {
    grid-column: span 1;
  }

  .footer-col {
    text-align: center;
  }

  .logo {
    justify-content: center;
  }

  .footer-contact {
    text-align: center;
  }

  .footer-links {
    text-align: center;
  }

  .social-links {
    justify-content: center;
  }
}

@media (max-width: 575.98px) {
  .footer-grid {
    gap: 1.5rem;
  }

  .logo .sitename {
    font-size: 1.1rem;
  }

  .footer-contact p,
  .footer-links a {
    font-size: 13px;
  }

  .social-links a {
    width: 36px;
    height: 36px;
    font-size: 14px;
  }
}
</style>
