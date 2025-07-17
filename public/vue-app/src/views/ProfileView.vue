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
      <div class="context-profile text-center pt-5 pb-3">
        <h4>Logo</h4>
        <p>sweeeeep</p>
      </div>
      <div class="act-profile p-2">
        <div class="comment">
          <img src="" alt="">
          <p>Комментарии: 200</p>
        </div>
        <div class="reating">
          <img src="" alt="">
          <p>Активность: 10</p>
        </div>
      </div>
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
</style>