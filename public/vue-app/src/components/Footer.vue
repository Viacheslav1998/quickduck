<template>
  <div class="container">
    <div class="custom-footer d-flex justify-content-between">
      <div class="l-block">
        <h6>подвал</h6>
        <b>но здесь пока тихо</b><br>
        <i>работает над проектом: Вячеслав</i><br> <b style="color: darkorange">Компания: SilentStorm | 2024</b>
      </div>
      <div class="r-block">
        <img src="/images/php.png" alt="php">
      </div>
    </div>
    <div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Footer.vue"
}
</script>

<style scoped>
  .custom-footer {
    margin-bottom: 10px;
    padding: 20px 20px 13px 20px;
    background: #404040;
  }

  .r-block {
    border-radius: 50px;
    background-color: blue;
    width: 100px;
    height: 100px;
  }

  .r-block img {
    border-radius: 50px;
    width: 100px;
    height: 100px;
    object-fit: cover;
  }

</style>
