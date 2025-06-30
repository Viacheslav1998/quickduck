<script>
import { defineComponent, ref } from 'vue';

export default defineComponent({
  name: 'TestApplicationView',
  setup() {
    const base = ref('/')
  }
});
</script>

<template>

  <div class="container text-center">
    <div class="begin-application my-4">
      <div class="row m-1">
        <div class="col bg-dark">
          <h2>Страница для разработки чего либо</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center">
    <div class="begin-application my-4">
      <div class="row m-1">
        <div class="col bg-success">1</div>
        <div class="col bg-danger">
          <h4>страница тестирования</h4>
          <p>asdasdasda[spdla[psld[pasldpsadas]]]<br>dasdsd </p>
          <h2>cool spoot</h2>
        </div>
        <div class="col">3</div>
      </div>
      <div class="row m-1">
        <div class="col">4</div>
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

</style>