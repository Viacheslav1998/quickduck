<script>
import { useAuthStore } from '@/stores/authStore';
import { defineComponent, ref, computed, onMounted, onUnmounted } from 'vue';

import TestComponent from '@/components/test/testComponent.vue';
import Card from '@/components/ui/Card.vue';

export default defineComponent({
  name: 'TestApplicationView',
  components: {
    Card,
    TestComponent
  },
  setup() {
    const auth = useAuthStore()
    
    const base = ref('1')
    const title = ref('just title for a current page')

    const firstName = ref('IVan')
    const lastName = ref('Petrov')

    const cardTitle = ref('default dynamic title')
    const alt = ref('alternative text')
    const text = ref('default dynamic text')
    const action = ref('default push')

    const seconds = ref(0)
    let intervalId = null

    const move = () => {
      console.log('you wanna make a move')
      console.log(base.value)
      base.value++
      title.value = 'you wanna make a move'
    }

    const fullName = computed(() => {
      return `${firstName.value} ${lastName.value}`
    })

    onMounted(() => {   
      intervalId = setInterval(() => {
        seconds.value++
      }, 1000) 
    })

    onUnmounted(() => {
      clearInterval(intervalId)
      console.log('проверка что ты свалил отсюда и дом почтистился')
    })

    return {
      auth,
      base,
      title,
      move,
      firstName,
      lastName,
      fullName,
      seconds,
      cardTitle,
      alt,
      text,
      action
    }
  }
})

</script>

<template>

  <div class="container text-center">
    <div class="mt-4 bg-danger">
      <h3 class="pt-3">Добро пожаловать !</h3>
      <p>твоя роль <span style="color: black; font-weight: bold;">[{{ auth.role }}]</span></p>
      <p class="pb-3">если ты видишь роль (guest) то ты не увидишь некоторый контент! <br></br> поэтому надо зайти</p>
    </div>
  </div>

  <div class="container text-center">
    <div class="begin-application my-4">
      <div class="row">
        <div class="col bg-dark pt-3">
          <h2>Страница для тестов</h2>
          <div class="box-dev-img py-3">
              <img class="custom-i" src="/images/ui.jpg" alt="ui">
          </div>
          <p>тестирование, проверки - оттачивание навыков</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center">
    <div class="begin-application my-4">
      <div class="row m-1">
        <div class="col bg-success">
          <h4>JavaScript</h4>
        </div>
        <div class="col bg-danger" 
          @click="move"
        >
          <h4>VUE3</h4>
        </div>
        <div class="col bg-success">
          <h4> timer {{ seconds }} </h4>
        </div>
      </div>
      <div class="row m-1">
        <div class="col">
          <h4>{{ base }}</h4>
        </div>
        <div class="col">сколько постов 5</div>
        <div class="col">6</div>
      </div>
      <div class="row m-1">
        <div class="col bg-warning">{{ title }}</div>
      </div>
    </div>
  </div>

  <div class="container ">
    <div class="d-flex justify-content-center bg-dark mb-4">
      <div class="bg-dark p-4 mb-4 text-center" style="width: 70%;">
        <h2>V-MODEL FORM</h2>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">{{ firstName }}</label>
            <input 
              type="email"
              v-model="firstName"
              class="form-control"
              id="firstName"
            >
          </div>
          <div class="mb-3">
            <label for="lname" class="form-label">{{ lastName }}</label>
            <input
              type="text"
              v-model="lastName"
              class="form-control"
              id="lastName"
            >
          </div>
          <div><h3>{{ fullName }}</h3></div>
          <button type="button" class="btn btn-primary">даже не пытайся</button>
        </form>
      </div>
    </div>
  </div>

  <div 
    class="container text-center"
    v-show="auth.isUser"
  >
    <div class="container">
      <h2>{{ auth.role }}: может видеть данный контент</h2>
      <p class="text-warning display-4">примеры статических и динамических данных - понятных только в коде</p>
      <i class="text-danger">1 и 2 карточки - статика но разная а  3я динамика</i>
    </div>
    <div class="d-flex justify-content-between mb-4 bg-dark py-4 px-2">
      <Card>
        <template #imagen>
          <img src="..." class="card-img-top" alt="изображение не найдено">
        </template>
        <template #title>
          <h5 class="card-title">карточка - слот</h5>
        </template>
        <template #text>
          <p class="card-text">тут просто текст - даже не переменная</p> 
        </template>
        <template #actions>
          <a href="#" class="btn btn-primary">перейти.</a>
        </template>
      </Card>

      <Card
        cardTitle="статичный пропс"
        alt="изображение пока нет"
        text="текст с пропса - статика"
        action="нажать"
      />

      <Card
        :card-title="cardTitle"
        :alt="text"
        :text="text"
        :action="action"
      />
    </div>
  </div>

  <div class="container text-center">
    <TestComponent
      @some-event="(n) => count += n"
    />
  </div>

</template>

<style scoped>

.begin-application {
  padding: 20px;
  border: 4px solid #2b2727;
}
.box-dev-img > img {
  object-fit: cover;
  height: 400px;
  width: 100%;
}

</style>