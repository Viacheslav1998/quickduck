<template>
  <div class="container">
    <div class="about-title">
      <h1>Страница обо мне</h1>
    </div>
    <div class="custom-description">
      <h2>Это проект Славика</h2>
      <p>
        Вячеслав очень любит программирование
        он хотел давненько уже сделать подобный сайт, идеей которой будут памятки, шаблоны, шпоргалки, напоминалки
        по любимым технологиям.
        Вячеслав увлекался программированием с 14 лет а плотно начал заниматся им с 16 лет
        У Вячеслава не всегда получалось и его спасло только то что он любил свое дело.
        Хоть и не обходилось без сгоревших тостов!
      </p>
      <p>Тут мы постараемся рассмотреть многое, например как работает компьютер и понимает нас, или как работает интерпретатор, некоторые алгоритмы для саморазвития, патерны проектирования, принципи и т д.
        И вероятно дополнять его я буду в свободное время.
      </p>
      <p>Да я точно знаю, любой проект можно доводить до бесконечности - что то добавил что то убрал, особенно приятно это делать
      когда ты понимаешь уже очень хорошо определенные технологии. Но в голове все не удержишь и часто приходиться смотреть в документацию или узнавать что то более новое.
        Давайте пожелаем нашим новичкам <span style="color: olivedrab; font-weight: bold">Успехов и радостного Кодинга</span>
      </p>
      <p>Этот проект конечно <span style="color: deepskyblue; font-weight: bold; font-family: helvetica;">"МОНОЛИТ"</span> но ты удивишься что данные поступают совсем с другого ресурса. </p>
    </div>
    <div class="about-img">
      <img src="/images/m4.jpg" class="img-fluid" alt="img">
    </div>
  </div>
</template>

<style scoped>
.about-title {
  border: 1px solid #555555;
  padding: 20px;
  margin: 20px auto 20px auto;
  color: whitesmoke;
  border-right: 15px solid orange;
}
.about-title h1 {
  margin: 0;
  padding: 0;
  font-size: 30px;
  font-weight: lighter;}
.custom-description {
  padding: 20px;
  margin-bottom: 20px;
}
.about-img {
  padding: 20px;
  margin-bottom: 40px;
  height: 400px;
  overflow: hidden;
}
</style>
