<template>
  <div class="container">
    <div class="custom-footer d-flex justify-content-between">
      <div class="l-block">
        <h6>подвал</h6>
        <b>Современные технологии разработки:</b><br>
        <div class="d-flex custom-box-icons">
          <div class="ico ci4">
            <img src="/icons/ci4.png" alt="ci4" title="codeigniter4">
          </div>
          <div class="ico">
            <img src="/icons/js.png" alt="js" title="javascript">
          </div>
          <div class="ico php">
            <img src="/icons/php.png" alt="php" title="php">
          </div>
          <div class="ico">
            <img src="/icons/sql.png" alt="sql" title="sql">
          </div>
          <div class="ico">
            <img  style="background-color: #fff; border-radius: 7px; " src="/icons/vue.png" alt="vue" title="vue">
          </div>
        </div>
        <i>работает над проектом: Вячеслав</i><br> <b style="color: darkorange">Компания: SilentStorm | 2024-2025</b><br>
        <i>ресурсы взяты с:</i><br>
        <b style="color: deepskyblue; font-family: Calibri;">www.flaticon.com</b><br>
        <b style="color: tomato; font-family: Calibri;">www.lottiefiles.com</b>
      </div>
      <div class="c-block">
        <h1>&lt;hello-<span style="color: deeppink;">world
          /></span></h1>
        <p>you're in the knowledge resource</p>
        <p style="font-size: 18px; color: aqua; padding: 0;">you'll learn how technology works</p>
        <p style="font-size: 18px; color: darkgoldenrod; padding: 0; border-bottom: 1px solid silver; border-color: darkgoldenrod; border-radius: 0;">here is high technology</p>
      </div>
      <div class="r-block">
        <div class="d-flex">
          <img src="/images/php.png" alt="php">
        </div>
        <p>Custom-Style-HEre</p>
        <p>TheCodeclub</p>
      </div>
    </div>
    <div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Footer.vue"
}
</script>

<style scoped>
  .custom-footer {
    margin-bottom: 10px;
    padding: 20px 20px 13px 20px;
    background: #232222;
  }
  .l-block { background-color: #181818; padding: 20px; border-radius: 15px;}

  .r-block {
    font-family: razed-light;
    font-size: 21px;
    color: rgb(173, 179, 179);
  }
  .r-block p { padding: 0; margin: 0;}

  .r-block img {
    border-radius: 50px;
    width: 100px;
    height: 100px;
    object-fit: cover;
  }
  .custom-box-icons { 
    border-radius: 50px;
    background-color: #181818;
    border: 2px solid rgb(87, 56, 189);
    padding-left: 20px;
    padding-top: 8px;
    padding-bottom: 8px;
    margin: 20px 0;
    
    -webkit-box-shadow:0px 0px 36px 4px rgba(4,106,184,0.3);
    -moz-box-shadow: 0px 0px 36px 4px rgba(4,106,184,0.3);
    box-shadow: 0px 0px 36px 4px rgba(4,106,184,0.3);
  }
  .ico {cursor: pointer;}
  .ico img { padding: 5px;}
  .ci4 { background-color: orangered; border-radius: 20px;}
  .php { background-color: silver; border-radius: 50px; height: 32px; }

  .c-block { 
    border-radius: 20px;
    background-color: #181818;
    padding: 10px 20px;
  }
  .c-block h1 {
    border-radius: 20px;
    padding: 15px 10px 0 10px;
    font-family: razed-galerie;
    font-size: 50px;
    color: rgb(179, 205, 214)
  }
  .c-block p {
    font-family: razed-light;
    font-size: 25px;
    color: rgb(222, 97, 52);
    border-radius: 20px;
    margin-left: 10px;
  }
</style>
