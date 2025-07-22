<template>
  <!-- navbar  -->
  <div class="navi-box container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <RouterLink class="navbar-brand" to="/">Домой</RouterLink>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <nav class="navbar-nav mr-auto">
          <li class="nav-item">
            <RouterLink class="nav-link" to="/about">Автор</RouterLink>
          </li>
          <li v-show="isGuest" class="nav-item">
            <RouterLink class="nav-link" to="/form">Регистрация</RouterLink>
          </li>
          <li v-show="isGuest" class="nav-item">
            <RouterLink class="nav-link" to="/login">Войти</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" to="/test-app">Тестирование</RouterLink>
          </li>
        </nav>
        <span class="navbar-text" title="вопросы или знания">Questions-Or-Knowledge</span>
      </div>
    </nav>
  </div>
  <!-- end navbar  -->
  <div class="container">
    <div class="all-custom-container mob-custom-container custom-container">
      <div class="box-1">
        <img src="/images/m1.jpg" class="img-fluid" alt="img" />
      </div>
      <div class="box-2">
        <h1 class="font-base">
          <span style="color: darkorange">QuickDuck.com</span>
          <br />
          <span style="font-family: tahoma; font-size: 21px">Добро пожаловать</span>
        </h1>
        <p class="f h5">
          Добро пожаловать! Здесь вы найдете полезную и актуальную информацию о мире IT и технологий.
          <br /><br />
          <span style="color: deepskyblue">Быстрая утка</span> расскажет о новинках из мира игр, гаджетов, технологий и программирования.
          Мы публикуем свежие новости, обзоры, советы, шпаргалки и туториалы.
          <br /><br />
          Хотите разобраться в JavaScript, PHP или других языках? Понимать ООП, хуки, принципы работы алгоритмов и фреймворков? Мы поможем!
          <br /><br />
          <span style="color: coral; font-style: italic">
            Легкий и понятный подход, объяснение сложных вещей простыми словами.
          </span><br />
          <span style="color: violet">
            Изучайте шаг за шагом, прокачивайте свои навыки и будьте в курсе последних трендов!
          </span>
        </p>
      </div>
    </div>
    <div class="container dark mt-4">
      <div class="p-3">
        <button type="button" class="btn btn-secondary btn-lg custom-button text-warning">Топ новостей</button>
      </div>
    </div>
  </div>
  <!-- and header content -->
</template>

<script>
import { useAuthStore } from '@/stores/authStore';
import { defineComponent, computed } from 'vue'


export default defineComponent({
  name: 'Header',
  setup() {
    const auth = useAuthStore()
    const isGuest = computed(() => auth.isGuest)
    
    return {
      isGuest
    }
  }
})

</script>

<style scoped>
.nav-link:hover {
  color: white !important;
}
.navi-box {
  margin: 10px auto 10px auto;
}
.custom-button {
  display: flex;
  margin: 0 auto;
}
.navbar-text {
  font-family: razed-light;
  font-size: 18px;
  border-bottom: 1px solid darkorange;
  padding: 0;
}
.navbar-text:hover {
  cursor: default;
  color: orangered;
}
.f {
  margin: 50px;
  padding: 50px;
  color: white;
  background: black;
  background: rgba(4, 20, 35, 0.87);
}
.font-base {
  text-align: center;
  color: antiquewhite;
  font-weight: bold;
  font-family: razed-light;
  border-radius: 5px;
  padding: 50px;
  margin: 50px 0 50px 0;
  background: rgba(4, 20, 35, 0.97);
}

.all-custom-container {
   position: relative;
   background: #041424;
   overflow: hidden;
}

.box-1,
.box-2 {
  width: 100%;
  top: 0;
  height: 800px;
  position: absolute;
}
.box-1 {
  z-index: 5;
}
.box-2 {
  z-index: 10;
}
.dark {
  background-color: #262424;
}

@media screen and (max-width:1123px ) {
  .mob-custom-container { min-height: 270px; }
  .font-base { font-size: 2.2em; } 
}

@media screen and (min-width: 1124px) {
  .custom-container { height: 720px;}
  .font-base { font-size: 3em; } 
}
</style>
