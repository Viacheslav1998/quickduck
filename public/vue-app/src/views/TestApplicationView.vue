<script>
import Card from '@/components/ui/Card.vue';
import { defineComponent, ref, computed, onMounted, onUnmounted } from 'vue';

export default defineComponent({
  name: 'TestApplicationView',

  components: {
    Card
  },
  
  setup() {

    const base = ref('1')
    const title = ref('just title for a current page')

    const firstName = ref('IVan')
    const lastName = ref('Petrov')

    const seconds = ref(0)
    let intervalId = null

    const move = () => {
      console.log('you wanna make a move')
      console.log(base.value)
      base.value++
      title.value = 'you wanna make a move';
    }

    const fullName = computed(() => {
      return `${firstName.value} ${lastName.value}`
    })

    return {
      base,
      title,
      move,
      firstName,
      lastName,
      fullName,
    }
  }
})

</script>

<template>

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
          <h4>Components</h4>
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
        <h2>Форма реактивного изменения</h2>
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

  <div class="container text-center">
    <div class="d-flex justify-content-between mb-4 bg-dark py-4 px-2">
      <Card>
        <template #imagen>
          <img src="..." class="card-img-top" alt="изображение не найдено">
        </template>
        <template #title>
          <h5 class="card-title">карточка - слот</h5>
        </template>
        <template #text>
          <p class="card-text"> Какой то текст для динамической карточки</p> 
        </template>
        <template #action>
          <a href="#" class="btn btn-primary">перейти</a>
        </template>
      </Card>

      <!-- вот этот слот - карта по умолчанию. -->
      <Card />

      <!-- вот этот слот - карта по умолчанию. -->
      <Card />
    </div>
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