<script>
import { defineComponent, ref } from 'vue';

export default defineComponent ({
  name: 'Secret',
  setup() {
    const word = 'поностальгировать'
    const letters = word.split('')
    const showRejectBox = ref(false)
    const showAcceptBox = ref(false)
    const hidden_content_reject = ref(null)
    const hidden_content_accept = ref(null)

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

    // open poppup reject
    const handlerReject = () => {
      showRejectBox.value = true
    }

    // close poppup reject
    const closeReject = () => {
      showRejectBox.value = false
    }
    
    // open poppup accept
    const handlerAccept = () => {
      showAcceptBox.value = true
    }

    // close poppup accept
    const closeAccept = () => {
      showAcceptBox.value = false
    }

    return {
      letters,
      colors,
      hidden_content_reject,
      hidden_content_accept,
      showRejectBox,
      handlerReject,
      closeReject,
      handlerAccept,
      closeAccept
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

        <div ref="hidden_content_reject">
          <div
            v-if="showRejectBox"
            class="showReject d-flex justify-content-center align-items-center p-2"
            @click="closeReject"
          >
            <img src="/images/foxid.svg">
            <div>
              <p class="display-4 font-fox">ЛАДНО!</p><br /><br />
              <span class="font-fox m-2">не хочешь не надо!</span>
            </div>
            <!-- не забудь про свою комбинацию -->
          </div>
        </div>

        <div ref="hidden_content_accept">
          <div 
            
            class="showAccept d-flex justify-content-center align-items-center"
          >
            <div class="secret-imagen container d-flex justify-content-center p-4">
              <div class="d-flex justify-content-center align-items-end">
                <div class="text-center p-4 simfony">
                  <h1>Только для компьютеров!</h1>
                  <h2 class="text-warning">Вводи</h2>
                  <h3 class="text-danger">Секретный код</h3>
                  <p>ВЕРХ ВЕРХ ВНИЗ ВНИЗ ВЛЕВО ВПРАВО ВЛЕВО ВПРАВО A B</p>
                  <div>
                    <i class="fa fa-arrow-up fa-4x pl-2" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up fa-4x pl-2" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up fa-4x pl-2" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up fa-4x pl-2" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up fa-4x pl-2" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up fa-4x pl-2" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up fa-4x pl-2" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up fa-4x pl-2" aria-hidden="true"></i>
                    <i class="fa fa-4x pl-1" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: bold;">A</i>
                    <i class="fa fa-4x pr-1" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: bold;">B</i>
                  </div>
                </div>  
              </div>           
            </div>
          </div>
        </div>
        
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
.showAccept {
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(198, 198, 198, 0.559);
  width: 100%;
  height: 100%;
  z-index: 30;
}
/* .showAccept img {
  width: 70%;
  height: 70%;
  object-fit: cover;
} */

.secret-imagen {
  height: 100%;
  background-image: url('/images/ach.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.simfony {
  border-radius: 20px;
  background-color: #343a40ec;
}

.showReject {
  border-radius: 20px;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 30;
  cursor: pointer;
  background-size: cover;
  width: 300px;
  height: 300px;
  color: rgb(239, 235, 235);
  background: #D1913C;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #FFD194, #D1913C);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #FFD194, #D1913C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.font-fox {
  transform: 1s ease all;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.299);
  background-color: blueviolet;
  border-radius: 20px;
  padding: 10px;
  transform: rotate(-13deg);
}
</style>