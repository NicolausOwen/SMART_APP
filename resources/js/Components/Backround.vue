<template>
  <div class="background-container">
    <!-- This component only displays the background -->
  </div>
</template>

<script>

</script>

<style>
.background-container {
  @apply min-h-screen w-full bg-cover bg-center fixed top-0 left-0;
  background-size: cover;
  background-image: url('/public/assets/picture/bg.svg');
  background-position: center;
  z-index: -1;
  /* Ensures background is behind other content */
}
</style>