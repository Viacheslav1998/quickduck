<script>
export default {
  name: "HomeView.vue"
}
</script>

<template>
  <div class="container">
    <div class="custom-container">
      <div class="box-1">
        <img src="/images/m4.jpg" class="img-fluid" alt="img">
      </div>
      <div class="box-2">
        <h1 class="font-base">Добро пожаловать, это главная страница</h1>
      </div>
    </div>
  </div>
</template>

<style scoped>
.custom-container {
  position: relative;
  height: 720px;
  background: silver;
  overflow: hidden;
}
.box-1, .box-2 {
  width: 100%;
  top: 0;
  height: 800px;
  position: absolute;
}
.box-1 { z-index: 5;}
.box-2 { z-index: 10;}

</style>
