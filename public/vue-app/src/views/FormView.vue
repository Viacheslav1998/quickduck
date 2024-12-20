<script>
import { defineComponent , ref } from "vue";

export default defineComponent({
  name: "FormView",
  setup() {
    const special = ref(false);
    const name = ref('');
    // form elems must have а не по отдельности
    // const form = new FormData();

    const f1 = () => {
      console.log(special.value);
      console.log(name.value);
    }

    return {
      special,
      f1,
      name
    };
  },
});
</script>

<template>
  <div class="container">
    <div class="begin">
      <h2>Регистрация</h2>
    </div>
    <div class="custom-form">
      <div class="form-group">
        <label for="name">Выше имя</label>
        <input v-model="name" type="name" class="form-control" id="name" aria-describedby="name" placeholder="Введите ваше имя">
        <small id="name" class="form-text text-muted">Имя важно - куда же без него</small>
      </div>
      <div class="form-group">
        <label for="password">Пароль</label>
        <input v-model="password" type="password" class="form-control" id="password" placeholder="Пароль - придумай, второй раз спрашивать не стану">
        <small id="password" class="form-text text-muted">Пароль- способ доступа</small>
      </div>
      <div class="form-group">
        <label for="email">Почта</label>
        <input v-model="email" type="email" class="form-control" id="email" placeholder="Введи пожалуйста твою почту">
        <small id="email" class="form-text text-muted">Почта поможет, восстановить данные или получать рассылку</small>
      </div>
      <div class="form-check">
        <input 
          class="form-check-input"
          type="checkbox"
          id="toogleFieldCheckbox"
          v-model="special"
          aria-label="Отметь если есть код от автора"
        >
        <label for="toogleFieldCheckbox"> Есть специальный код ?</label><br>
      </div>
      <div class="form-group" v-if="special">
        <label for="special">спец код</label>
        <input type="special" class="form-control" id="special" placeholder="специальный код">
        <small id="special" class="form-text text-muted">Если тебе дали специальный код - пиши его сюда</small>
      </div>
      <button type="submit" @click="f1" class="btn btn-primary">Регистрация</button>
    </div>

    <div class="alert alert-warning" role="alert">
      <h3 style="font-weight: 400;">Внимание</h3>
      Твои данные не кому не передаються - не ведись на скам (то-есть обман)!
    </div>

  </div>
</template>

<style scoped>
.custom-form {
  border: 1px solid #666666;
  padding: 10px;
  margin: 20px auto 20px auto;
}

</style>