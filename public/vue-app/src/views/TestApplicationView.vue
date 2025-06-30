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
    <div class="row">
      <div class="col" style="color: red;">
        <p class="m-4">Attention</p>
      </div>
  </div>
</template>

<style scoped>

</style>