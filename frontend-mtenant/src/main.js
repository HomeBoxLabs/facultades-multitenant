import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

// Bootstrap CSS
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-icons/font/bootstrap-icons.css";

// Librerías de animación y efectos
import "glightbox/dist/css/glightbox.min.css";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";

// Estilos personalizados
import "./assets/css/main.css";
import "./assets/css/menu.css";
import "./assets/css/fixes.css";

// Bootstrap JS
import "bootstrap/dist/js/bootstrap.bundle.min.js";

const app = createApp(App);
app.use(router);

// Detectar tenant por subdominio
const hostname = window.location.hostname;
const subdomain =
  hostname.split(".")[0] === "localhost" ? null : hostname.split(".")[0];

// Hacer disponible globalmente
app.config.globalProperties.$subdomain = subdomain;

app.mount("#app");
