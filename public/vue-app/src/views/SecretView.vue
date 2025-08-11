<script>
import { defineComponent, ref } from 'vue';

export default defineComponent ({
  name: 'Secret',
  setup() {
    const answer = ref('no')
    const quest = ref('')
    const word = 'поностальгировать'
    const letters = word.split('')

    // multicolored letters
    const colors = [
      'red', 'orange', 'gold', 'green', 'teal',
      'blue', 'purple', 'pink', 'brown', 'crimson',
      'darkorange', 'dodgerblue', 'violet', 'limegreen',
      'indigo', 'darkred', 'deepskyblue'
    ]

    // combo-code-secret
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
    // end combo-code

    return {
      letters,
      colors
    }
  }
})
</script>

<template>
  <div class="container my-4">
    <div class="fone">
      <h1>Секретная локация</h1>
      <h3>но зачем...</h3>
    </div>
    <div class="content">
        <div>
          <p class="font-weight-light h3 m-3">Любите ли вы <span
            v-for="(char, index) in letters"
            :key="index"
            :style="{ color: colors[index % colors.length] }"
          >
            {{ char }}
          </span>?</p>
          <div class="theme-choice">
        </div>
      </div>
    </div>
  </div>
  
</template>


<style scoped>
.fone { 
  background-image: url('../images/duck.jpg');
  background-size: cover;
  width: 100%;
  height: 500px;
}

.fone img {
  width: 100%;
  height: 700px;
  overflow: hidden;
  object-fit: cover;
}

.theme-choice {
  background-image: url('../images/mr.jpg');
  background-size: cover;
  width: 100%;
  height: 800px;
}
</style>