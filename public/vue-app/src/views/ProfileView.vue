<script>
import { defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'Profile',
  setup() {
    const me = ref('user')
  }
})

</script>

<template>
  <div class="container">
    <div class="profile-box my-4">
      <div class="text-center ">
         <img src="/images/m4.jpg" class="logo shadow" alt="user" />
      </div>
      <div class="context-profile text-center pt-5 pb-1">
        <h4>Logo</h4>
        <p>Астон Мартин</p>
      </div>
      <div class="act-profile d-flex justify-content-center">
         <div class="p-2 d-flex flex-row text-center">
          <div class="round shadow comment m-3 pt-2">
            <img src="/profile/chat-bubble.png">
            <p>Комментарии: 200</p>
          </div>
          <div class="round shadow reating m-3 pt-2">
            <img src="/profile/electrocardiogram.png">
            <p>Активность: 10</p>
          </div>
        </div>
      </div>
      <div class="logout text-center mt-4">
        <button type="button" class="btn btn-warning btn-lg">Выход из системы</button>
      </div>
      <br>
    </div>
  </div>
</template>

<style scoped>
.profile-box {
  border-radius: 20px;
  background-color: #7129C4;
}
.logo {
  border: 4px solid rgb(231, 228, 224);
  border-radius: 40px;
  position: relative;
  top: 30px;
  object-fit: cover;
  width: 250px;
  height: 250px;
}
.context-profile {
  background-color: #9457EB;
}
.act-profile {
  background-color: #9457EB;
}
.round {
  width: 150px;
  border-bottom: 2px solid white;
  border-left: 2px solid white;
  border-radius: 10px;
  background-color: #262424;
}
.round:hover {
  border-bottom: 0px;
  border-left: 0px;
}
</style>