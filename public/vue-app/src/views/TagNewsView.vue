<script>
import { defineComponent, ref, onMounted, watch } from 'vue'
import { useRoute, RouterLink } from 'vue-router'

export default defineComponent({
  name: 'HomeView',
  setup() {
    const route = useRoute()
    const tag = ref(route.params.tag)
    const news = ref([])
    const currentPage = ref(1)
    const totalPages = ref(1)
    const preloader = ref(true)

    const images = ref([
      { src: '/soc-icons/sm1.png', alt: 'ico 1' },
      { src: '/soc-icons/sm2.png', alt: 'ico 2' },
      { src: '/soc-icons/sm3.png', alt: 'ico 3' }
    ])

    async function getTagNews(tag, page = 1) {
      const url = `http://quickduck.com/api/news/tags?tags=${tag}&page=${page}`
      try {
        const response = await fetch(url, {
          method: 'GET',
          headers: {
            Accept: 'application/json'
          }
        })
        if (!response.ok) {
          throw new Error(`Статус ответа: ${response.status}`)
        }
        const result = await response.json()
        return result || {}
      } catch (error) {
        console.error('Ошибка: ', error.message)
        return {}
      }
    }

    async function goToPage(page) {
      if (page < 1 || page > totalPages.value || page === currentPage.value) return

      preloader.value = true
      currentPage.value = page

      const result = await getTagNews(tag.value, currentPage.value)
      news.value = result.data || []
      totalPages.value = result.pagination?.pageCount || 1
      preloader.value = false
    }

    const formatDate = (date) => {
      if (!date) return 'данных нет'
      return new Date(date).toLocaleDateString('ru-RU')
    }

    const formatTime = (date) => {
      if (!date) return 'данных нет'
      return new Date(date).toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
      })
    }

    onMounted(async () => {
      const result = await getTagNews(tag.value, currentPage.value)
      news.value = result.data || []
      currentPage.value = result.pagination?.currentPage || 1
      totalPages.value = result.pagination?.pageCount || 1
      preloader.value = false
    })

    watch(
      () => route.params.tag,
      async (newTag) => {
        tag.value = newTag
        preloader.value = true
        currentPage.value = 1
        const result = await getTagNews(newTag, currentPage.value)
        news.value = result.data || []
        totalPages.value = result.pagination?.pageCount || 1
        preloader.value = false
      }
    )

    return {
      images,
      news,
      preloader,
      formatDate,
      formatTime,
      tag,
      currentPage,
      totalPages,
      goToPage
    }
  }
})
</script>

<template>
  <div class="container">
    <div class="begin">
      <h1>
        Новости по тегу:
        <span style="color: greenyellow; font-weight: bold; text-transform: uppercase">{{
          tag
        }}</span>
      </h1>
    </div>

    <div class="preloader d-flex justify-content-center" v-if="preloader">
      <div class="wrapper-preloader">
        <div class="preloader-gif">
          <img src="/icons/anobus.gif" alt="загрузка" />
        </div>
        <div style="text-align: center; color: burlywood">
          <h3>Загрузка . . .</h3>
        </div>
      </div>
    </div>

    <div class="wrapper-news" v-else>
      <div v-if="Array.isArray(news) && news.length === 0">
        <h1>Данных нет</h1>
      </div>

      <div v-else>
        <div class="custom-news" v-for="item in news">
          <div class="main-news">
            <h1>{{ item.name }}</h1>
          </div>
          <div class="wrapper-main-box d-flex justify-content-between">
            <div class="box-date-time">
              <span>публикация: </span>
              <span style="color: orange">{{
                formatDate(item.created_at || item.updated_at)
              }}</span>
              <p>
                опублитковано в:
                <span style="color: orangered">{{
                  formatTime(item.created_at || item.updated_at)
                }}</span>
              </p>
            </div>
            <div class="tags">
              <div class="tags">
                <span v-if="item.tags">Теги: </span>
                <RouterLink
                  v-for="(tag, index) in item.tags.split(',').map((t) => t.trim())"
                  :key="index"
                  :to="{ name: 'tagNews', params: { tag } }"
                >
                  {{ tag }}
                </RouterLink>
              </div>
            </div>
          </div>
          <img :src="item.path_to_image || '/images/notFoundImg.jpg'" class="custom-images" />
          <div class="pt-3" style="color: silver">
            <span>Короткое описание новости: </span>
          </div>
          <div class="custom-text">
            <p v-html="item.desc"></p>
          </div>
          <div class="wrapper-soc-content d-flex justify-content-between">
            <div class="box-info d-flex align-items-center" style="color: whtie">
              <div class="px-2 box-icons"><img src="/icons/views.png" alt="просмотры" /> 825</div>
              <div class="pr-2 box-icons">
                <img src="/icons/comments.png" alt="комментарии" /> 200
              </div>
              <div class="box-reaction p-2 d-flex">
                <div class="image-stack">
                  <img
                    v-for="(image, index) in images"
                    :key="index"
                    :src="image.src"
                    :alt="image.alt"
                    class="stacked-image"
                    :style="{ left: `${index * 27}px` }"
                  />
                </div>
              </div>
            </div>
            <div class="custom-text d-flex align-items-end">
              <RouterLink :to="{ name: 'news', params: { id: item.id } }">
                <button type="button" class="btn btn-outline-success">Посмотреть новость</button>
              </RouterLink>
            </div>
          </div>
        </div>
        <!-- pagination -->
        <div class="box-pagination">
          <nav aria-label="navigation custom-pagination">
            <ul class="pagination justify-content-center">
              <li class="page-item" :class="{ disabled: currentPage === 1 }">
                <a class="page-link" href="#" @click.prevent="goToPage(currentPage - 1)">туда</a>
              </li>

              <li
                v-for="page in totalPages"
                :key="page"
                class="page-item"
                :class="{ active: currentPage === page }"
              >
                <a href="#" class="page-link" @click.prevent="goToPage(page)">{{ page }}</a>
              </li>

              <li class="page-item" :class="{ disabled: currentPage === totalPages }">
                <a class="page-link" href="#" @click.prevent="goToPage(currentPage + 1)">сюда</a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- end pagination -->
      </div>
    </div>
  </div>
</template>

<style>
.begin {
  margin: 20px auto 10px auto;
  padding: 30px;
  border: 1px solid #666666;
  border-right: 20px solid rgb(2, 201, 62);
}
.begin h1 {
  font-weight: lighter;
}
.tags a {
  padding-left: 5px;
  color: grey;
}
.tags a:hover {
  color: deepskyblue;
}
.box-date-time {
  color: grey;
}
.preloader-gif {
  height: 150px;
  width: 150px;
  background-color: rgba(46, 109, 66, 0.429);
  border-radius: 50%;
}
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
.main-news {
  border-bottom: 1px solid grey;
  margin-bottom: 5px;
}
.box-info {
  border: 1px solid #49494a;
}
.box-icons {
  font-size: 19px;
  color: grey;
}
.box-icons img {
  width: 35px;
  height: 35px;
}
.custom-text > p {
  font-size: 18px;
  background: #343434;
}
.right {
  text-align: right;
}

.box-reaction {
  background-color: rgba(46, 50, 54, 0.518);
}

.image-stack {
  position: relative;
  width: 95px;
  height: 40px;
}
.image-stack img {
  width: 40px;
  height: 40px;
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
