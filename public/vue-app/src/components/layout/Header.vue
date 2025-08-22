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
            <RouterLink class="nav-link" to="/about#about-me">Автор</RouterLink>
          </li>
          <li v-show="isGuest" class="nav-item">
            <RouterLink class="nav-link" to="/form">Регистрация</RouterLink>
          </li>
          <li v-show="isGuest" class="nav-item">
            <RouterLink class="nav-link" to="/login">Войти</RouterLink>
          </li>
          <li v-show="isUser" class="nav-item">
            <RouterLink class="nav-link" to="/profile">Профиль</RouterLink>
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
          <span style="font-family: tahoma; font-size: 17px">Быстрый портал - свежайших технологий</span><br>
        </h1>
      </div>
    </div>
    <div class="mt-4">
      <v-carousel
        height="650"
        show-arrows="hover"
        cycle
        progress="warning"
        hide-delimiters
      >
        <template v-slot:prev="{ props }">
          <v-btn
            color="dark"
            variant="elevated"
            @click="props.onClick"
          >туда</v-btn>
        </template>
        <template v-slot:next="{ props }">
          <v-btn
            color="dark"
            variant="elevated"
            @click="props.onClick"
          >сюда</v-btn>
        </template>
        <v-carousel-item
          v-for="item in slides" :key="item.slide"
        >
          <v-sheet
            height="100%"
          >
            <div 
              class="text-white fill-height d-flex flex-column justify-space-between custom-content-slider"
              :style="{ backgroundImage: `url(${item.slide})` }"
            >
              <div class="pb-1 pt-2 pl-2 bg-dark">
                <h4>{{ item.title }}</h4>
              </div>
              <div class="pt-3 pl-3 bg-dark">
                <p>{{ item.text }}</p>
              </div>
            </div>
          </v-sheet>
        </v-carousel-item>
      </v-carousel>
    </div>
    <div class="container dark mt-4 d-flex justify-content-center">
      <div class="p-3 text-left">
        <button type="button" class="btn btn-dark custom-button text-warning">Топ новостей</button>
      </div>
      <div class="p-3 text-left">
        <button type="button" class="btn btn-dark custom-button text-warning">Техологии</button>
      </div>
      <div class="p-3 text-left">
        <button type="button" class="btn btn-dark custom-button text-warning">Программирования</button>
      </div>
      <div class="p-3 text-left">
        <button type="button" class="btn btn-dark custom-button text-warning">Новшества</button>
      </div>
      <div class="p-3 text-left">
        <button type="button" class="btn btn-dark custom-button text-warning">платы</button>
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
    const isUser = computed(() => auth.isUser)

    const slides = [
      {slide: '/slider/s1.jpg', title: 'Быстрый совет ...', text: 'сейчас дорогие котята мы узнаем почему нельзя использовать vuetify+bootstrap - потому что могут быть конфликты стилей'},
      {slide: '/slider/s2.jpg', title: 'что делать если компьютер не спешит?', text: 'Узнай на сколько можно его прокачать, замени SSD, почисти ПО - например R-cleaner adwww'},
      {slide: '/slider/s3.jpg', title: 'Код это жизнь - работа учеба... все ровно жизнь', text: 'нужно суметь подобрать под себя среду разработки IDE - есть и бесплатные хорошие варианты, Sublime-Text, notepad++, блокнот, aclipse, VSC'},
      {slide: '/slider/s4.jpg', title: 'Ну какая же машина запустится без процессора - ОН ЧТО СЕРВЕРНЫЙ !?', text: 'процессор - запускает и работает как не странно с процессами - мощный процессор быстрые потоки, функционал, компилирование ..., но не всегда только процессор все может вывозить'},
    ]

    return {
      isGuest,
      isUser,
      slides
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
.custom-content-slider {
  width: 100%;
  background-size: cover;
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
  height: 300px;
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
  .custom-container { min-height: 320px;}
  .font-base { font-size: 3em; } 
}
</style>
