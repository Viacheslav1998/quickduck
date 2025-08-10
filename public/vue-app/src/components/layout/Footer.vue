<template>
  <div class="container">
    <div class="footer-fone p-3">
      <div class="row custom-footer d-flex justify-content-between">
        <div class="l-block col-sm m-1">
          <h6 class="text-danger">подвал</h6>
          <b>Современные технологии разработки:</b><br />
          <div class="d-flex custom-box-icons">
            <div class="ico ci4">
              <img src="/icons/ci4.png" alt="ci4" title="codeigniter4" />
            </div>
            <div class="ico">
              <img src="/icons/js.png" alt="js" title="javascript" />
            </div>
            <div class="ico php">
              <img src="/icons/php.png" alt="php" title="php" />
            </div>
            <div class="ico">
              <img src="/icons/sql.png" alt="sql" title="sql" />
            </div>
            <div class="ico">
              <img
                style="background-color: #fff; border-radius: 7px"
                src="/icons/vue.png"
                alt="vue"
                title="vue"
              />
            </div>
          </div>
          <i>работает над проектом: Вячеслав</i><br />
          <b style="color: darkorange">Компания: SilentStorm | 2024-2025</b><br />
          <i>ресурсы взяты с:</i><br />
          <b style="color: deepskyblue; font-family: Calibri">www.flaticon.com</b><br />
          <b style="color: tomato; font-family: Calibri">www.lottiefiles.com</b>
          <div class="d-flex justify-content-between mt-3">
            <div v-show="isUser">
              <button 
                style="font-size: 16px; font-weight: 600;"
                type="button"
                class="btn btn-sm btn-warning py-3"
                @click="handleLogout"
              >
                выйти из системы
              </button>
              <img 
                style="cursor: pointer;"
                class="mx-2"
                src="/images/brain.png"
                @click="navigateToSecret"
              />
              <img 
                style="cursor: pointer;"
                src="/images/icode.png"
                @click="navigateToTesting"
              />
            </div>
          </div>  
        </div>
        <div class="c-block col-sm m-1">
          <h1>
            &lt;<span style="color: #99afc9">hell</span>o-<span style="color: deeppink"
              >world /></span
            >
          </h1>
          <p>you're in the knowledge resource</p>
          <p style="font-size: 18px; color: aqua; padding: 0">you'll learn how technology works</p>
          <p
            style="
              font-size: 18px;
              color: darkgoldenrod;
              padding: 0;
              border-bottom: 1px solid silver;
              border-color: darkgoldenrod;
              border-radius: 0;
            "
          >
            here is high technology
          </p>
        </div>
        <div class="r-block col-sm m-1 text-center pt-5 dark-logo py-5">
          <div class="d-flex justify-content-center mb-3">
            <img src="/images/up.png" alt="up" />
          </div>
          <p style="color: purple">Custom-Style-HEre</p>
          <p style="color: orange">TheCodeclub</p>
          <div class="d-flex justify-content-center mt-3 bg-warning">
            <img src="/images/club.png" alt="up" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from '@/stores/authStore';
import { useRouter } from 'vue-router'
import { computed } from 'vue';
import Swal from 'sweetalert2'

export default {
  name: 'Footer.vue',
  setup() {
    const auth = useAuthStore()
    const router = useRouter()
    const isUser = computed(() => auth.isUser)

    const showAlert = ({ status, message }) => {
      Swal.fire({
        title: status = 'Выход',
        text: message,
        icon: 'success'
      })
    }

    function navigateToTesting() {
      setTimeout(() => {
        router.push('/test-app')
      }, 700)
    } 

    function navigateToSecret() {
      setTimeout(() => {
        router.push('/secret')
      }, 700)
    }

    function handleLogout() {
      auth.logout()
      
      showAlert({
        status: 'Выход!',
        message: 'Всего доброго, мы будем снова рады вас видеть в следующий раз'
      })

      setTimeout(() => {
        router.push('/login')
      }, 1200)
    }

    return {
      isUser,
      navigateToTesting,
      navigateToSecret,
      handleLogout
    }
  }
}
</script>

<style scoped>
.footer-fone {
  background: #262424;
}
.custom-footer {
  margin-bottom: 10px;
  padding: 20px 20px 13px 20px;
}
.l-block {
  background-color: #181818;
  padding: 20px;
  border-radius: 15px;
}
.dark-logo {
  background-color: #181818;
  border-radius: 20px;
}
.r-block {
  font-family: razed-light;
  font-size: 21px;
  color: rgb(173, 179, 179);
}
.r-block p {
  padding: 0;
  margin: 0;
}

.r-block img {
  width: 100px;
  height: 100px;
  object-fit: cover;
}
.custom-box-icons {
  border-radius: 50px;
  background-color: #181818;
  border: 2px solid rgb(87, 56, 189);
  padding-left: 20px;
  padding-top: 8px;
  padding-bottom: 8px;
  margin: 20px 0;

  -webkit-box-shadow: 0px 0px 36px 4px rgba(4, 106, 184, 0.3);
  -moz-box-shadow: 0px 0px 36px 4px rgba(4, 106, 184, 0.3);
  box-shadow: 0px 0px 36px 4px rgba(4, 106, 184, 0.3);
}
.ico {
  cursor: pointer;
}
.ico img {
  padding: 5px;
}
.ci4 {
  background-color: orangered;
  border-radius: 20px;
}
.php {
  background-color: silver;
  border-radius: 50px;
  height: 32px;
}

.c-block {
  border-radius: 20px;
  background-color: #181818;
}
.c-block h1 {
  border-radius: 20px;
  padding: 15px 10px 0 10px;
  font-family: razed-galerie;
  font-size: 50px;
  color: rgb(179, 205, 214);
}
.c-block p {
  font-family: razed-light;
  font-size: 25px;
  color: rgb(222, 97, 52);
  border-radius: 20px;
  margin-left: 10px;
}
</style>
