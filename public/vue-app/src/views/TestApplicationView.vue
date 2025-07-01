<script>
import { defineComponent, ref, computed, onMounted, onUnmounted } from 'vue';

export default defineComponent({
  name: 'TestApplicationView',
  setup() {
    
    const base = ref('1')
    const title = ref('just title for a current page')

    const firstName = ref('IVan')
    const lastName = ref('Petrov')

    const seconds = ref(0)
    let intervalId = null

  

    const move = () => {
      console.log('you wanna make a move')
      base.value++
      console.log(base.value)
    }

    return {
      base,
      title,
      move
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
        <div class="col">5</div>
        <div class="col">6</div>
      </div>
      <div class="row m-1">
        <div class="col bg-warning">asd</div>
      </div>
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