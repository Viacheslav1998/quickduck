<script>
export default {
  name: "HomeView.vue"
}
</script>

<template>
  <div class="container">
    <div class="custom-container">
      <div class="box-1">
        <img src="/images/m1.jpg" class="img-fluid" alt="img">
      </div>
      <div class="box-2">
        <h1 class="font-base display-5"><span style="color: coral;">QuickDuck.com</span> <br> добро пожаловать в мир технологий</h1>
        <p class="f h5">
          Тут вы узнаете многое о языках программирования, какие  то <span style="font-style: italic; color: coral;">хуки, правила, подсказки и другие интерессные вещи</span>
        <br><br>
          Если у вас есть интерессные предложение - напишите нам
        </p>
        <div>
          <button type="button" class="btn btn-dark btn-lg custom-button">Написать</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.custom-button {
  display: flex;
  margin: 0 auto;
}
.f {
  margin: 50px;
  padding:50px;
  color: white;
  background: black;
  background: rgba(4, 20, 35, 0.87)
}
.font-base {
  text-align: center;
  color: antiquewhite;
  font-weight: bold;
  border-radius: 5px;
  padding: 50px;
  margin: 50px;
  background: rgba(4, 20, 35, 0.97)  ;
}
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
