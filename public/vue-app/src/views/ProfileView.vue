<script>
import { defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'Profile',
  setup() {
    const me = ref('user')
  }
})

</script>

<template>
  <div class="container">
    <div class="profile-box">
      imagen
    </div>
  </div>
</template>

<style scoped>

</style>