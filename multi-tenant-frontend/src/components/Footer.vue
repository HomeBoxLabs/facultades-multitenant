<template>
  <footer class="footer" :style="{ backgroundColor: primaryColor }">
    <div class="container">
      <div class="footer-content">
        <!-- Información de la facultad -->
        <div class="footer-section">
          <h4 class="footer-title">{{ tenantName }}</h4>
          <p v-if="contacto.direccion" class="footer-text">
            {{ contacto.direccion }}
          </p>
          <p v-if="contacto.telefono" class="footer-text">
            Tel: {{ contacto.telefono }}
          </p>
          <p v-if="contacto.email" class="footer-text">
            Email: <a :href="`mailto:${contacto.email}`">{{ contacto.email }}</a>
          </p>
        </div>

        <!-- Enlaces rápidos -->
        <div class="footer-section">
          <h4 class="footer-title">Enlaces Rápidos</h4>
          <nav class="footer-nav">
            <router-link to="/" class="footer-link">Inicio</router-link>
            <router-link to="/sobre" class="footer-link">Sobre Nosotros</router-link>
            <router-link to="/programas" class="footer-link">Programas</router-link>
            <router-link to="/documentos" class="footer-link">Documentos</router-link>
          </nav>
        </div>

        <!-- Redes sociales -->
        <div class="footer-section" v-if="hasRedesSociales">
          <h4 class="footer-title">Síguenos</h4>
          <div class="social-links">
            <a
              v-if="redesSociales.facebook"
              :href="redesSociales.facebook"
              target="_blank"
              rel="noopener noreferrer"
              class="social-link"
              aria-label="Facebook"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
              </svg>
            </a>
            <a
              v-if="redesSociales.twitter"
              :href="redesSociales.twitter"
              target="_blank"
              rel="noopener noreferrer"
              class="social-link"
              aria-label="Twitter"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
              </svg>
            </a>
            <a
              v-if="redesSociales.instagram"
              :href="redesSociales.instagram"
              target="_blank"
              rel="noopener noreferrer"
              class="social-link"
              aria-label="Instagram"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
              </svg>
            </a>
            <a
              v-if="redesSociales.linkedin"
              :href="redesSociales.linkedin"
              target="_blank"
              rel="noopener noreferrer"
              class="social-link"
              aria-label="LinkedIn"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                <rect x="2" y="9" width="4" height="12"/>
                <circle cx="4" cy="4" r="2"/>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Copyright -->
      <div class="footer-bottom">
        <p class="copyright">
          &copy; {{ currentYear }} {{ tenantName }}. Todos los derechos reservados.
        </p>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { computed } from 'vue'
import { useTenantStore } from '../store/tenant'

const tenantStore = useTenantStore()

const tenantName = computed(() => tenantStore.tenantName)
const primaryColor = computed(() => tenantStore.primaryColor)
const contacto = computed(() => tenantStore.contacto)
const redesSociales = computed(() => tenantStore.redesSociales)

const hasRedesSociales = computed(() => {
  return Object.keys(redesSociales.value).some(key => redesSociales.value[key])
})

const currentYear = new Date().getFullYear()
</script>

<style scoped>
.footer {
  background: linear-gradient(180deg, var(--color-secondary, #1e40af) 0%, var(--color-primary, #3b82f6) 100%);
  color: white;
  margin-top: auto;
  position: relative;
  overflow: hidden;
}

.footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg,
    rgba(255, 255, 255, 0.3) 0%,
    rgba(255, 255, 255, 0.7) 50%,
    rgba(255, 255, 255, 0.3) 100%
  );
  animation: shimmerLine 3s linear infinite;
}

@keyframes shimmerLine {
  0% {
    background-position: -200% center;
  }
  100% {
    background-position: 200% center;
  }
}

.container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

.footer-content {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 3rem;
  padding: 4rem 0 2.5rem;
  position: relative;
}

.footer-section {
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
  animation: fadeInUp 0.8s ease-out backwards;
}

.footer-section:nth-child(1) { animation-delay: 0.1s; }
.footer-section:nth-child(2) { animation-delay: 0.2s; }
.footer-section:nth-child(3) { animation-delay: 0.3s; }

.footer-title {
  font-size: 1.25rem;
  font-weight: 700;
  margin: 0 0 0.5rem 0;
  color: white;
  position: relative;
  padding-bottom: 0.75rem;
  letter-spacing: -0.01em;
}

.footer-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 50px;
  height: 3px;
  background: linear-gradient(90deg, white, transparent);
  border-radius: 10px;
  animation: expandWidth 0.6s ease-out forwards;
  animation-delay: 0.3s;
  opacity: 0.8;
}

@keyframes expandWidth {
  from {
    width: 0;
  }
  to {
    width: 50px;
  }
}

.footer-text {
  font-size: 0.95rem;
  line-height: 1.7;
  margin: 0;
  opacity: 0.9;
  transition: opacity 0.3s ease;
}

.footer-text:hover {
  opacity: 1;
}

.footer-text a {
  color: white;
  text-decoration: none;
  transition: all 0.3s ease;
  position: relative;
  font-weight: 500;
}

.footer-text a::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 1px;
  background: white;
  transition: width 0.3s ease;
}

.footer-text a:hover {
  opacity: 1;
  letter-spacing: 0.02em;
}

.footer-text a:hover::after {
  width: 100%;
}

.footer-nav {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.footer-link {
  color: white;
  text-decoration: none;
  font-size: 0.95rem;
  opacity: 0.9;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  width: fit-content;
  padding: 0.25rem 0;
  position: relative;
  font-weight: 450;
}

.footer-link::before {
  content: '→';
  position: absolute;
  left: -20px;
  opacity: 0;
  transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.footer-link:hover {
  opacity: 1;
  transform: translateX(8px);
  letter-spacing: 0.02em;
}

.footer-link:hover::before {
  opacity: 1;
  left: -18px;
}

.social-links {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

.social-link {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 48px;
  height: 48px;
  background: rgba(255, 255, 255, 0.15);
  border-radius: 12px;
  color: white;
  transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  position: relative;
  overflow: hidden;
  backdrop-filter: blur(5px);
}

.social-link::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.1));
  opacity: 0;
  transition: opacity 0.3s ease;
}

.social-link:hover::before {
  opacity: 1;
}

.social-link:hover {
  background: rgba(255, 255, 255, 0.25);
  transform: translateY(-6px) scale(1.1);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.social-link:active {
  transform: translateY(-3px) scale(1.05);
}

.social-link svg {
  position: relative;
  z-index: 1;
  transition: transform 0.3s ease;
}

.social-link:hover svg {
  transform: rotate(5deg) scale(1.1);
}

.footer-bottom {
  border-top: 1px solid rgba(255, 255, 255, 0.15);
  padding: 2rem 0;
  text-align: center;
  position: relative;
}

.footer-bottom::before {
  content: '';
  position: absolute;
  top: -1px;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 2px;
  background: linear-gradient(90deg, transparent, white, transparent);
  opacity: 0.5;
}

.copyright {
  font-size: 0.9rem;
  margin: 0;
  opacity: 0.85;
  animation: fadeIn 1s ease-out;
  letter-spacing: 0.02em;
  font-weight: 450;
}

/* Responsive */
@media (max-width: 768px) {
  .footer-content {
    grid-template-columns: 1fr;
    gap: 2.5rem;
    padding: 3rem 0 2rem;
  }

  .footer-section {
    text-align: center;
  }

  .footer-title::after {
    left: 50%;
    transform: translateX(-50%);
  }

  .footer-nav {
    align-items: center;
  }

  .footer-link::before {
    display: none;
  }

  .footer-link:hover {
    transform: scale(1.05);
  }

  .social-links {
    justify-content: center;
  }

  .footer-bottom {
    padding: 1.5rem 0;
  }
}

@media (max-width: 480px) {
  .footer-content {
    padding: 2.5rem 0 1.5rem;
    gap: 2rem;
  }

  .footer-title {
    font-size: 1.125rem;
  }

  .footer-text {
    font-size: 0.875rem;
  }

  .social-link {
    width: 44px;
    height: 44px;
  }

  .copyright {
    font-size: 0.8125rem;
  }
}

/* Animaciones */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 0.85;
  }
}
</style>
