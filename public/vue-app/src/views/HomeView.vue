<script>
import { defineComponent, ref } from "vue";

export default defineComponent ({
  name: "HomeView",
  setup() {
    const images = ref([
      { src: "/soc-icons/sm1.png", alt: "ico 1" },
      { src: "/soc-icons/sm2.png", alt: "ico 2" },
      { src: "/soc-icons/sm3.png", alt: "ico 3" },
    ]);

    return {
      images,
    };
  },
});
</script>

<template>
  <div class="container">

    <div class="begin">
      <h1>Какие то новости</h1>
    </div>

    <div class="custom-news">
      <h1>какая то новость</h1>
      <span>публикация: - </span>
      <span>11.02.2024</span>
      <p>время: 22:30</p>
      <img src="/images/m2.jpg" class="custom-images">
      <div class="custom-text pt-3">
        <p>Есть над чем задуматься: многие известные личности призывают нас к новым свершениям, которые, в свою очередь, должны быть в равной степени предоставлены сами себе. Равным образом, современная методология разработки не оставляет шанса для дальнейших направлений развития.</p>
      </div>
      <div class="wrapper-soc-content d-flex justify-content-between">
        <div class="box-info d-flex align-items-center" style="color: whtie;">
          <div class="px-2">Просмотры: 892</div>
          <div class="pr-2">Комментарии: 200</div>
          <div class="box-reaction p-2 d-flex">
            <div class="image-stack">
              <img
                v-for="(image, index) in images" 
                :key="index"
                :src="image.src"
                :alt="image.alt"
                class="stacked-image"
                :style="{ left: `${index * 28}px` }"
              />
            </div>
          </div>
        </div>
        <div class="custom-text d-flex align-items-end">
          <button type="button" class="btn btn-outline-success ">Посмотреть новость</button>
        </div>
      </div>
    </div>

    <div class="custom-news">
      <h1>какая то новость</h1>
      <span>публикация: -  </span>
      <span>11.02.2024</span>
      <p>время: 22:30</p>
      <img src="/images/m3.jpg" class="custom-images" alt="img">
      <div class="custom-text pt-3">
        <p>Есть над чем задуматься: многие известные личности призывают нас к новым свершениям, которые, в свою очередь, должны быть в равной степени предоставлены сами себе. Равным образом, современная методология разработки не оставляет шанса для дальнейших направлений развития.</p>
      </div>
      <div class="custom-text right">
        <button type="button" class="btn btn-outline-success ">Посмотреть новость</button>
      </div>
    </div>
    <!-- pagination -->
    <div class="box-pagination">
      <nav aria-label="navigation custom-pagination">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">туда</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">сюда</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<style>

.begin {
  margin: 20px auto 10px auto;
  padding: 30px;
  border: 1px solid #666666;
  border-right:20px solid rgb(2, 201, 62);
}
.begin h1 {
  font-weight: lighter;}
.custom-news {
  border: 1px solid #666666;
  padding: 10px;
  margin: 20px auto 20px auto;
}
.custom-images {
  height: 400px;
  width: 100%;
  object-fit: cover;
}
.box-info {
  border: 1px solid #49494a;
}
.custom-text > p {
  font-size: 18px;
  padding: 20px;
  background: #343434;
}
.right {
  text-align: right;
}

.box-reaction {
  background-color: #2e323684;
  background-size: contain;
}

.image-stack {  
  position: relative;
  width: 120px;
  height: 64px;
}

.stacked-image {
  position: absolute;
  transition: transform 0.3 ease;
  cursor: pointer;
}
.stacked-image:hover {
  transform: scale(1.05);
  z-index: 10;
}

.box-pagination .pagination .page-link {
  background-color: black;
  color: goldenrod;
  border-color: #181818;
}

.box-pagination .pagination .page-link:hover {
  background-color: goldenrod;
  color: black;
  border-color: goldenrod;
}

.box-pagination .pagination .page-item.disabled .page-link {
  background-color: #333;
  color: #777;
  border-color: #333;
}

</style>
