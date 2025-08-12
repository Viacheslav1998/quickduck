<script>
import { defineComponent, ref } from 'vue';

export default defineComponent ({
  name: 'Secret',
  setup() {
    const word = 'поностальгировать'
    const letters = word.split('')
    const renderDomNeon = ref('')
    const renderDomCode = ref('')

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

    const handlerReject = () => {
      alert('доступ запрещен')
    }

    return {
      letters,
      colors,
      handlerReject
    }
  }
})
</script>

<template>
  <div class="container my-4">
    <div class="fone d-flex justify-content-center align-items-center">
      <div class="fone-content p-4 text-center">
        <h1 class="display-4">Секретная локация</h1>
        <h3 class="">Но зачем...</h3>
        <p style="font-size:large;" class="font-weight-light"> Многие любят игры а здесь еще есть и секреты</p>
      </div>
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
        <div class="theme-choice d-flex justify-content-center align-items-center ">
          <div class="Small shadow choice p-5">
            <span style="font-size: xx-large;" class="font-weight-light">Так ты учавствуешь ?</span>
            <div class="btn btn-lg btn-warning m-2" @click="handlerAccept">Да</div>
            <div class="btn btn-lg btn-dark m-2" @click="handlerReject">Нет</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</template>


<style scoped>
.fone { 
  background-image: url('../images/duck.jpg');
  background-size: cover;
  background-position: center;
  width: 100%;
  height: 700px;
}
.fone-content {
  border-radius: 18px;
  background-color: rgba(60, 70, 92, 0.856);
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
.choice {
  border-radius: 18px;
  background-color: rgba(0, 0, 0, 0.518);
}
</style>