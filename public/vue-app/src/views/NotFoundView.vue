<script>
import { defineComponent, ref } from "vue";

export default defineComponent ({
  name: "NotFoundView",
});
</script>

<template>
  <div class="container d-flex justify-content-center my-5">
    <div class="attention-404">
      <div class="wrapper-deskription d-flex justify-content-center align-items-center">
        <div class="description">
          <h1>404</h1>
          <h2>Не найдено!</h2>
          <h3>Переживать за это не стоит</h3>
          <p>
            Вероятно данной страницы не было не когда, быть может она была уничтожена, кто знает ?
            <br>Но факт, ее нет.
          </p>
          <p>И как вы думаете - что я вам могу предложить ?</p>
          <i>ну конечно же:</i><br><br>
          <a href="/" type="button" class="btn btn-secondary">Вернутся</a>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.attention-404 {
  height: 1024px;
  width: 100%;
  background: url('../images/451f.png');
  background-size: cover;
  filter: grayscale(10%);
}

.wrapper-deskription {
  height: 1024px;
  width: 100%;
  background-color: rgba(94, 94, 94, 0.297);
}
.description {
  border-radius: 20px;
  padding: 20px;
  text-align: center;
  color: rgb(81, 81, 81);
  font-size: 20px;
  background-color: rgba(249, 252, 244, 0.9);
}

</style>