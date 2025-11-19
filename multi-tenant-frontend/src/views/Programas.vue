<template>
  <main class="main">
    <section class="page-section section">
      <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
          <h1>Programas</h1>
          <p>Información sobre los programas académicos</p>
        </div>

        <div class="row">
          <div class="col-12" data-aos="fade-up" data-aos-delay="100">
            <div class="content-box p-5 bg-white rounded shadow-sm">
              <p class="text-justify mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <p class="text-justify mb-4">
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <p class="text-justify mb-0">
                Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.
              </p>
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
.page-section {
  padding-top: 140px;
  padding-bottom: 80px;
}

.content-box {
  border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
}

.text-justify {
  text-align: justify;
  line-height: 1.8;
  color: var(--default-color);
  font-size: 1rem;
}

@media (max-width: 991.98px) {
  .page-section {
    padding-top: 100px;
    padding-bottom: 60px;
  }
}
</style>
