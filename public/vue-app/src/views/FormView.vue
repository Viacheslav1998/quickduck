<script>
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router';
import Swal from 'sweetalert2'

export default defineComponent({
  name: 'FormView',
  setup() {
    // checkbox IsShow
    const special = ref(false)
    const router = useRouter()

    // person-form
    const name = ref('')
    const email = ref('')
    const password = ref('')
    const pass_confirm = ref('')
    const imagen = ref(null)
    const role = ref('user')
    const file = ref(null)

    // if there`s special code, it`s not required
    const secret = ref(1010)

    const handleImage = (e) => {
      const selectedFile = e.target.files[0]
      file.value = selectedFile;
    }

    const validatePerson = ({ name, email, password, pass_confirm, secret }) => {
      const errors = []

      if (!name || name.length < 3) {
        errors.push('Имя должно содержать не менее 3 символов')
      }

      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        errors.push('Необходим ввод корректного email - почты')
      }

      if (!password || password.length <= 6) {
        errors.push('Пароль должен содержать не менее 6 символов.')
      }

      if (pass_confirm !== password) {
        errors.push('Пароли не совпадают.')
      }

      if (!secret || isNaN(secret)) {
        errors.push('Код должен быть числом.')
      }

      return errors
    }

    const showAlert = ({ status, message }) => {
      Swal.fire({
        title: status === 'error' ? 'Ошибка' : 'Успех',
        text: message,
        icon: status
      })
    }

    const createPerson = async () => {
      const personData = {
        role: role.value,
        name: name.value,
        email: email.value,
        password: password.value,
        pass_confirm: pass_confirm.value,
        secret: secret.value
      }

      // run validate
      const errors = validatePerson(personData)
      
      // attention to errors
      if (errors.length > 0) {
        Swal.fire({
          title: 'Уведомления об допущенных ошибках',
          text: errors.join('\n '),
          icon: 'question'
        })
        return
      }

      delete personData.pass_confirm

      const person = new FormData()

      Object.entries(personData).forEach(([key, value]) => {
        person.append(key, value)
      })

      if(file.value) {
        person.append('imagen', file.value)
      }

      try {
        const response = await fetch('http://quickduck.com/auth/register', {
          method: 'POST',
          body: person
        })

        const result = await response.json()

        if (!response.ok) {
          let fullMessage = result.message || 'Ошибка при создании пользователя'
          if (result.errors) {
            const details = Object.entries(result.errors).map(([field, msg]) => `${field}: ${msg}`)
            fullMessage += '\n ' + details.join('\n')
          }

          showAlert({
            status: 'error',
            message: fullMessage
          })
          return
        }

        showAlert({
          status: 'success',
          message: 'Пользователь зарегестрирован!'
        })

        setTimeout(() => {
          router.push('/login')
        }, 1200)
      } catch (error) {
        showAlert({
          status: 'error',
          message: 'Произошла ошибка при связи с сервером.' + error.message
        })
      }
    }

    return {
      special,
      createPerson,
      name,
      email,
      password,
      pass_confirm,
      imagen,
      role,
      secret,
      validatePerson,
      handleImage
    }
  }
})
</script>

<template>
  <div class="container">
    <div class="begin">
      <h1>Регистрация</h1>
    </div>
    <div class="custom-form">
      <form @submit.prevent="createPerson">
        <div>
          <input type="hidden" id="role" :value="role"/>
        </div>
        <div class="form-group">
          <label for="name">Выше имя</label>
          <input
            v-model="name"
            type="text"
            class="form-control"
            id="name"
            aria-describedby="name"
            placeholder="Введите ваше имя"
          />
          <small id="name" class="form-text text-muted">Имя важно - куда же без него</small>
        </div>
        <div class="form-group">
          <label for="name">Твоё изображение</label>
          <input @change="handleImage" type="file" class="form-control" id="imagen" aria-describedby="imagen" />
          <small id="imagen" class="form-text text-muted">Выбрать изображение - аватарку.</small>
        </div>
        <div class="form-group">
          <label for="password">Пароль</label>
          <input
            v-model="password"
            type="password"
            class="form-control"
            id="password"
            placeholder="Пароль - придумай, второй раз спрашивать не стану"
          />
          <small id="password" class="form-text text-muted">Пароль - способ доступа</small>
        </div>
        <div class="form-group">
          <label for="pass_confirm">Повтори пароль</label>
          <input
            v-model="pass_confirm"
            type="password"
            class="form-control"
            id="pass_confirm"
            placeholder="Ха-ха спросил."
          />
          <small id="pass_confirm" class="form-text text-muted">Нужно сверить пароли !</small>
        </div>
        <div class="form-group">
          <label for="email">Почта</label>
          <input
            v-model="email"
            type="email"
            class="form-control"
            id="email"
            placeholder="Введи пожалуйста твою почту"
          />
          <small id="email" class="form-text text-muted"
            >Почта поможет, восстановить данные или получать рассылку</small
          >
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            id="toogleFieldCheckbox"
            v-model="special"
            aria-label="Отметь если есть код от автора"
          />
          <label for="toogleFieldCheckbox"> Есть специальный код ?</label><br />
        </div>
        <div class="form-group" v-if="special">
          <label for="secret">спец код</label>
          <input
            v-model.number="secret"
            type="text"
            class="form-control"
            id="secret"
            placeholder="специальный код"
          />
          <small id="secret" class="form-text text-muted"
            >Если тебе дали специальный код - пиши его сюда</small
          >
        </div>
        <button type="submit" class="btn btn-primary">Регистрация</button>
      </form>
    </div>

    <div class="alert alert-warning" role="alert">
      <h3 style="font-weight: 400">Внимание</h3>
      Твои данные не кому не передаются - не ведись на скам (то-есть обман)!
    </div>
  </div>
</template>

<style scoped>
.begin {
  padding: 20px;
  border-right: 15px solid deepskyblue;
}
.begin h1 {
  margin: 0;
  padding: 0;
  font-size: 30px;
  font-weight: lighter;
}
.custom-form {
  border: 1px solid #666666;
  padding: 10px;
  margin: 20px auto 20px auto;
}
</style>
