<script>
import { defineComponent, ref, onMounted, watch } from 'vue'
import { useRoute } from 'vue-router'

import CommentForm from '@/components/comments/CommentForm.vue'
import CommentList from '@/components/comments/CommentList.vue'

export default defineComponent({
  name: 'SingleView',
  components: {
    CommentForm,
    CommentList
  },
  setup() {
    const item = ref(null)
    const preloader = ref(true)
    const route = useRoute()

    // navigation
    const nextNews = ref(null)
    const prevNews = ref(null)
    
    //obj
    const formData = ref(null)

    const newsNavigation = async (id) => {
      try {
        const response = await fetch(`http://quickduck.com/news/navigation/${id}`, {
          method: 'GET',
          headers: {
            Accept: 'application/json'
          }
        })

        if (!response.ok) throw new Error('Ошибка загрузки данных навигации')

        const data = await response.json()
        nextNews.value = data.next
        prevNews.value = data.prev
      } catch (error) {
        console.log('Ошибка загрузки:', error)
      }
    }

    // screening of the last three Reaction
    const images = ref([
      { src: '/soc-icons/sm1.png', alt: 'ico 1' },
      { src: '/soc-icons/sm2.png', alt: 'ico 2' },
      { src: '/soc-icons/sm3.png', alt: 'ico 3' }
    ])

    async function getItem(id) {
      const url = `http://quickduck.com/api/news/${id}`
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
        return await response.json()
      } catch (error) {
        console.error('Ошибка: ', error.message)
        return null
      }
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

    const fetchItem = async (id) => {
      preloader.value = true
      item.value = await getItem(id)
      formData.value = { ...item.value }
      await newsNavigation(id)
      preloader.value = false
    }

    onMounted(() => {
      fetchItem(route.params.id)
    })

    watch(
      () => route.params.id,
      async (newId) => {
        await fetchItem(newId)
      },
      { immediate: true }
    )

    return {
      images,
      item,
      preloader,
      formatDate,
      formatTime,
      prevNews,
      nextNews,
      formData
    }
  }
})
</script>

<template>
  <div class="preloader d-flex justify-content-center" v-if="preloader">
    <div class="wrapper-preloader">
      <div class="preloader-gif">
        <img src="/icons/anobus.gif" alt="загрузка" />
      </div>
      <div style="text-align: center; color: burlywood;">
        <h3>Загрузка . . .</h3>
      </div>
    </div>
  </div>

  <div class="container" v-else-if="item">
    <div class="begin-news">
      <h1>{{ item.name }}</h1>
    </div>

    <nav aria-label="breadcrumb" class="pt-2">
      <div class="breacrumb-fone">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Домой</a></li>
          <li class="breadcrumb-item"><a href="/">Рубрика</a></li>
          <li class="breadcrumb-item active" aria-current="page">новости | игры | природа</li>
        </ol>
      </div>
    </nav>

    <div class="custom-news">
      <div class="wrapper-main-box d-flex justify-content-between">
        <div class="box-date-time">
          <span>публикация: </span>
          <span style="color: orange">{{ formatDate(item.created_at || item.updated_at) }}</span>
          <p>
            опублитковано в:
            <span style="color: orangered">
              {{ formatTime(item.created_at || item.updated_at) }}
            </span>
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
      <div class="custom-text pt-3">
        <p v-html="item.desc"></p>
      </div>
      <div class="wrapper-soc-content d-flex justify-content-between">
        <div class="box-info d-flex align-items-center" style="color: whtie">
          <div class="px-2 box-icons"><img src="/icons/views.png" alt="просмотры" /> 825</div>
          <div class="pr-2 box-icons"><img src="/icons/comments.png" alt="комментарии" /> 200</div>
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
      </div>
    </div>
    <div class="wrapper-navi mb-4">
      <div class="fone-space d-flex justify-content-between p-4">
        <div>
          <RouterLink v-if="prevNews" :to="'/news/' + prevNews.id">
            <button type="button" class="btn btn-warning">Прошлая страница</button>
          </RouterLink>
        </div>
        <div>
          <RouterLink v-if="nextNews" :to="'/news/' + nextNews.id">
            <button type="button" class="btn btn-warning">Следующая страница</button>
          </RouterLink>
        </div>
      </div>
    </div>
    <!-- comments -->
    <div class="wrapper-comment my-2 pt-4">
      <CommentForm
        v-model="formData"
      />
      <div class="line"></div> <br />
      <CommentList />
    </div>
    <!-- end comments -->
  </div>

  <div v-else>
    <h1>Новость не найдена</h1>
  </div>
</template>

<style>
.begin-news {
  margin: 20px auto 10px auto;
  padding: 20px;
  border: 1px solid #666666;
  border-right: 20px solid rgb(255, 51, 61);
}

.reactions p {
  font-size: 14px;
  color: rgb(153, 141, 110);
}
.reactions img {
  width: 40px;
  height: 40px;
  border-radius: 12px;
}

hr.new1 {
  border-top: 1px solid rgb(209, 209, 209);
}

.begin-news h1 {
  font-weight: lighter;
}
.breadcrumb {
  background-color: rgba(26, 24, 24, 0.966);
  border: 1px solid #666666;
}
.breacrumb-fone {
  background: url('../images/space3.jpg');
}
.breadcrumb-item a {
  color: goldenrod;
}
.breadcrumb-item {
  color: white;
}

.wrapper-navi {
  background: url('../images/space3.jpg');
  background-size: cover;
  border: 1px solid rgb(95, 95, 95);
}
.fone-space {
  background-color: rgba(26, 24, 24, 0.966);
}

.custom-comments {
  border: 1px solid #666666;
  padding: 10px;
  margin: 20px auto 20px auto;
}

.line {
  height: 20px;
  background-color: #181818;
}
.space-comment-area,
.wrapper-comments-persons {
  padding: 20px;
}
.guest {
  background-color: rgb(152, 33, 24);
  margin-left: 20px;
  margin-right: 20px;
}
.comment-moment {
  background-color: darkslateblue;
  margin-left: 20px;
  margin-right: 20px;
}
.wrapper-comment {
  background-color: #232222;
}
.person {
  font-size: 20px;
}
.media img {
  width: 32px;
  height: 32px;
}
.media {
  margin: 20px 0;
  padding: 20px;
  background-color: #a8b1e16c;
}
.ico-flames {
  height: 30px;
  width: 30px;
}
.text-flames > p {
  font-weight: lighter;
  font-family: razed-light;
  font-size: 24px;
  animation-iteration-count: infinite;
  animation-name: flames;
  animation-duration: 10s;
}

@keyframes flames {
  0% {
    color: #d10028;
  }
  10% {
    color: #b7022d;
  }
  20% {
    color: #ef7816;
  }
  30% {
    color: #f79219;
  }
  40% {
    color: #ffa91a;
  }
  50% {
    color: #f79219;
  }
  60% {
    color: #ef7816;
  }
  90% {
    color: #d10028;
  }
  100% {
    color: #b7022d;
  }
}

label > input {
  visibility: hidden;
  position: absolute;
}

label > input + img {
  cursor: pointer;
  border: 2px solid transparent;
  transition: all 0.3s ease;
  background-color: rgba(153, 50, 204, 0.158);
}

label > input:checked + img {
  border-radius: 50px;
  background-color: yellow;
}

label > input:hover + img {
  background-color: darkorchid;
}
</style>
