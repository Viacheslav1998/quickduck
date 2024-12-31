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
        <p>тестовый блок границ</p>
        <form action="#" class="p-4">
          <div class="form-group">
            <label for="email">Введи свою Почту</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Помнишь своё имя ?">
          </div>
          <div class="form-group">
            <label for="name">Вводи свой Пароль</label>
            <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="Пароль это пол дела.">
          </div>
          <button type="submit" class="btn btn-primary">Входи!</button>
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

.custom-login {
  width: 50%;
  background-color: brown;
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