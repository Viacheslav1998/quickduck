<script>

import { defineComponent, ref, onMounted, onUnmounted } from "vue";

export default defineComponent({
  name: "LoginView",
  setup() {
    const wolf = ref(null);
    const isPopupVisible = ref(false);

    const closePopup = () => {
      isPopupVisible.value  = false;
    }

    const openPopup = () => {
      isPopupVisible.value = true;
    } 

    const handleMouseOver = (e) => {
      if(wolf.value) {
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        wolf.value.style.transform = `translate(-${x * 150}px, -${y * 150}px)`;
      }
    };

    onMounted(() => {
      window.addEventListener("mousemove", handleMouseOver);
    });

    onUnmounted(() => {
      window.removeEventListener("mousemove", handleMouseOver);
    });

    return {
      wolf,
      isPopupVisible, 
      closePopup,
      openPopup
    };
  },
});
</script>

<template>

  <div class="container">
    <div class="begin mb-4">
      <h1>Войти</h1>
    </div>
    <div class="login-box d-flex justify-content-center py-5 mb-2">
      <div class="custom-login">
        <div class="custom-text-login d-flex justify-content-center pt-3">
          <div>
            <p> <span style="color: darkorange; font-weight: bold;">Ну</span> ты заходи - если что</p>
          </div>
          <div class="custom-icon" @click="openPopup">
            <img src="/icons/wolf.png">
          </div>
        </div>
        <form action="#" class="p-4">
          <div class="form-group">
            <label for="email" class="custom-input">Введи свою Почту</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Помнишь своё имя ?">
          </div>
          <div class="form-group">
            <label for="name" class="custom-input">Вводи свой Пароль</label>
            <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="Пароль это пол дела.">
          </div>
          <button type="submit" class="btn btn-warning">Входи!</button>
        </form>
      </div>
    </div>
    <div 
      class="wrapper-box-poppup"
      :class="{ 'popup-hidden' : !isPopupVisible }"
    >
      <div class="close" @click="closePopup">
        <img src="/poppup/close.png">
      </div>
      <div class="box-elems">
        <div class="custom-fone">
          <img src="/poppup/fone.png">
        </div>
        <div class="custom-wolf wolf-parallax" ref="wolf">
          <img src="/poppup/wolf.png">
        </div>
      </div>
    </div>
  </div>

</template>

<style scoped>

.login-box {
  background-image: url('../images/login-fone.jpg');
  background-size: contain;
}
.custom-input {
  font-family: Arial;
  font-size: 18px;
  color: orange;
}
.custom-text-login {
  border-top: 2px solid deepskyblue;
  background-color: rgb(249, 249, 249);
}
.custom-text-login p {
  color: dimgrey;
  font-weight: 1000;
  font-size: larger;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
.custom-login {
  border-radius: 10px;
  width: 50%;
  backdrop-filter: blur(2px);
  background-color: rgba(55, 70, 152, 0.484);
}
.custom-icon img {
  width: 24px;
  height: 24px;
  margin-left: 10px;
  background-color: deepskyblue;
  border-radius: 50px;
  cursor: pointer;
}
.custom-icon img:hover {
  background-color: orangered;
}

.begin {
  padding: 20px;
  border-right: 15px solid deeppink;
}
.begin h1 {
  margin: 0;
  padding: 0;
  font-size: 30px;
  font-weight: lighter;}

.wrapper-box-poppup {
  display: inline;
  z-index: 10;
  position: fixed;
  top: 50%;
  left: 50%;
  width: 800px;
  height: 800px;
  transform: translate(-50%, -50%);
  transition: all 1s ease;
}
.wrapper-box-poppup.popup-hidden {
  opacity: 0;
  transform: translate(-50%, -55%);
  pointer-events: none;
}

.close {
  cursor: pointer;
  position: relative;
  z-index: 15;
}
.custom-fone  {
  overflow: hidden;
  margin: 20px;
  border-radius: 150px;
  background-color: snow;
}
.custom-fone img {
  width: 100%;
  background-size: cover;
}
.custom-wolf {background-color: brown;}
.custom-wolf img {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -150%);
  width: 300px;
  height: 300px;
}
.wolf-parallax {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 110%;
  height: 110%;
  transition: all 0.1s ease;  
}

</style>