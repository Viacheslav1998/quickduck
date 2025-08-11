<script>
import { defineComponent, ref } from 'vue';

export default defineComponent ({
  name: 'Secret',
  setup() {
    const answer = ref('no')
    const quest = ref('')

    const conamiCode = [
      'ArrowUp', 'ArrowUp',
      'ArrowDown', 'ArrowDown',
      'ArrowLeft', 'ArrowRight',
      'ArrowLeft', 'ArrowRight',
      "b", "a"
    ]
    
    let input = []

    window.addEventListener('keydown', (e) => {
      input.push(e.key)
      input = input.slice(-conamiCode.length)

      if(JSON.stringify(input) === JSON.stringify(conamiCode)) {
        alert('GOOD GAME')
      }
    })    

  }
})
</script>

<template>
  <div class="container my-4">
    <div class="fone">
      <img src="/images/duck.jpg" alt="duck\утка">
    </div>
    <div class="content">
      <div>
        <h1>Секретная локация</h1>
        <h3>но зачем...</h3>
       <p class="font-weight-light h3">Любите ли вы поностальгировать?</p>
      </div>
    </div>
  </div>
  
</template>


<style scoped>
.fone img {
  width: 100%;
  height: 700px;
  overflow: hidden;
  object-fit: cover;
}
</style>