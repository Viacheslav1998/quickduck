<script>
import { defineComponent, onMounted } from 'vue'

export default defineComponent({
  name: 'Card',
  // props: [
  //   title,
  //   alt
  //   text
  //   action
  // ],
  props: {
    cardTitle: String,
    alt: String, 
    text: String,
    action: String
  },
  setup() {
    onMounted(() => {
      console.log('complete card')
    })
  }
})

</script>

<template>
  <div>
    <div class="bg-dark w-100">
      <div class="card text-dark" style="width: 18rem;">
        <slot name="imagen">
          <img src="..." class="card-img-top" alt="i don`t how work props here">
        </slot>
        <div class="card-body">
          <slot name="title">
            <h5 class="card-title">{{ cardTitle }}</h5>
          </slot>
          <slot name="text"> 
            <p class="card-text">{{ text }}</p>
          </slot>
          <slot name="actions">
            <a href="#" class="btn btn-primary">{{ action }}</a>
          </slot>       
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
</style>