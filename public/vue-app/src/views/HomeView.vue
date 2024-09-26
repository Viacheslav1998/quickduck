<script>
export default {
  name: "HomeView.vue"
}
</script>

<template>
  <div class="container">

    <div class="begin">
      <h2>Какие то новости</h2>
    </div>

    <div class="custom-news">
      <h1>какая то новость</h1>
      <span>публикация: -  </span>
      <span>11.02.2024</span>
      <p>время: 22:30</p>
      <img src="/images/m2.jpg" class="custom-images" alt="img">
      <div class="custom-text">
        <p>Есть над чем задуматься: многие известные личности призывают нас к новым свершениям, которые, в свою очередь, должны быть в равной степени предоставлены сами себе. Равным образом, современная методология разработки не оставляет шанса для дальнейших направлений развития.</p>
      </div>
      <div class="custom-text right">
        <button type="button" class="btn btn-outline-success ">Посмотреть новость</button>
      </div>
    </div>

    <div class="custom-news">
      <h1>какая то новость</h1>
      <span>публикация: -  </span>
      <span>11.02.2024</span>
      <p>время: 22:30</p>
      <img src="/images/m3.jpg" class="custom-images" alt="img">
      <div class="custom-text">
        <p>Есть над чем задуматься: многие известные личности призывают нас к новым свершениям, которые, в свою очередь, должны быть в равной степени предоставлены сами себе. Равным образом, современная методология разработки не оставляет шанса для дальнейших направлений развития.</p>
      </div>
      <div class="custom-text right">
        <button type="button" class="btn btn-outline-success ">Посмотреть новость</button>
      </div>
    </div>
    
    <!--   или найти бутстрап пагинацию  -->
    <div class="custom-pagination"></div>

  </div>
</template>

<style scoped>
.begin {
  margin: 10px auto 10px auto;
  padding: 10px;
  border: 1px solid #666666;
}
.custom-news {
  border: 1px solid #666666;
  padding: 10px;
  margin: 20px auto 20px auto;
}
.custom-images {
  height: 400px;
  width: 100%;
  object-fit: cover;
}
.custom-text > p {
  font-size: 18px;
  padding: 20px;
  background: #343434;
}
.right {
  text-align: right;
}
</style>
