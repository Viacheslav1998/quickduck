<script>
export default {
  name: "FormView"
}
</script>

<template>
  <div class="container">
    <div class="begin">
      <h2>Регистрация</h2>
    </div>
    
    <div class="custom-form">
      <div class="form-group">
        <label for="name">Выше имя</label>
        <input type="name" class="form-control" id="name" aria-describedby="name" placeholder="Введите ваше имя">
        <small id="name" class="form-text text-muted">Имя важно - куда же без него</small>
      </div>
      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" placeholder="Пароль - придумай, второй раз спрашивать не стану">
      </div>
      <div class="form-group">
        <label for="email">Пароль</label>
        <input type="email" class="form-control" id="email" placeholder="Введи пожалуйста твою почту">
      </div>
      <div class="form-check">
        <input 
          class="form-check-input position-static"
          type="checkbox"
          id="toogleFieldCheckbox"
          value="option1"
          aria-label="тут кто то есть"
        >
        <label for="toogleFieldCheckbox">Отметь если есть код от автора</label>
      </div>
      <button type="submit" class="btn btn-primary">Регистрация</button>
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