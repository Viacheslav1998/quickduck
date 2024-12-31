<script>

import { defineComponent, ref } from "vue";

export default defineComponent({
  name: "LoginView",
  setup() {
    const ready = ref(true);
  }

})
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
          <div class="custom-icon">
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

</style>