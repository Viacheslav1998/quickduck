<script>
import { defineComponent , ref } from "vue";
import Swal from "sweetalert2";

export default defineComponent({
  name: "FormView",
  setup() {
    // checkbox IsShow
    const special = ref(false);
    
    // person-form
    const name = ref('');
    const email = ref('');
    const password = ref('');
    const imagen = ref('');

    // if there`s special code, it`s not required
    const secret = ref(1010);

    const validatePerson = ({ name, email, password, secret }) => {
      const errors = [];

      if(!name || name.length < 3) {
        errors.push("Имя должно содержать не менее 3 символов");
      }

      if(!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        errors.push("Необходим ввод корректного email - почты");
      }

      if(!password || password.length <= 6) {
        errors.push("Пароль должен содержать не менее 6 символов.");
      }

      if(!secret || isNaN(secret)) {
        errors.push("Код должен быть числом.");
      }

      return errors;
    };

    const createPerson = async () => {
      
      const personData = {
        name: name.value,
        email: email.value,
        password: password.value,
        secret: secret.value
      };

      // run validate
      const errors = validatePerson(personData);

      // attention to errors
      if(errors.length > 0) {
        Swal.fire({
          title: "Уведомления об допущенных ошибках",
          text: errors.join("\n"),
          icon: "question"
        });
        return;
      }      

      const person = new FormData();

      Object.entries(personData).forEach(([key, value]) => {
        person.append(key, value);
      });

      // console.log(person);

      try {
        const response = await fetch('http://quickduck.com/api/person', {
          method: "POST",
          body: person,
        });

        if(!response.ok) {
          Swal.fire({
            title: "Ошибка - пользователь не зарегестрирован",
            text: "что то пошшло не так!",
            icon: "error"
          });
          throw new Error("Ошибка при создании пользователя");
        }

        const result = await response.json();
        Swal.fire({
          title: "Успех!",
          text: "Пользователь Зарегестрирован!",
          icon: "success"
        });        

        console.log("Пользователь создан:", result);
      } catch (error) {
        console.error("Ошибка: ", error.message);
        Swal.fire({
          title: "Ошибка:",
          text: error.message,
          icon: "error"
        });
      }
    };

    return {
      special,
      createPerson,
      name,
      email,
      password,
      imagen,
      secret,
      validatePerson,
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
      <form @submit.prevent="createPerson">
        <div class="form-group">
          <label for="name">Выше имя</label>
          <input v-model="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Введите ваше имя">
          <small id="name" class="form-text text-muted">Имя важно - куда же без него</small>
        </div>
        <div class="form-group">
          <label for="name">Твоё изображение</label>
          <input type="file" class="form-control" id="imagen" aria-describedby="imagen">
          <small id="imagen" class="form-text text-muted">Выбрать изображение - аватарку.</small>
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
          <label for="secret">спец код</label>
          <input v-model.number="secret" type="text" class="form-control" id="secret" placeholder="специальный код">
          <small id="secret" class="form-text text-muted">Если тебе дали специальный код - пиши его сюда</small>
        </div>
        <button type="submit" class="btn btn-primary">Регистрация</button>
      </form>
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