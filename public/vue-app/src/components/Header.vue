<template>
  <!-- navbar  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <RouterLink class="navbar-brand" to="/">Домой</RouterLink>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <nav class="navbar-nav mr-auto">
        <li class="nav-item">
          <RouterLink class="nav-link" to="/about">О нас </RouterLink>
        </li>
      </nav>
      <span class="navbar-text">найдет тот кто ищет...</span>
    </div>
  </nav>
  <!-- end navbar  -->

</template>

<script>
export default {
  name: "Header.vue"
}
</script>

<style scoped>
</style>
