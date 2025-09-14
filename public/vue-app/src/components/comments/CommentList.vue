<script>
import { defineComponent, toRefs, ref, watch, compile} from 'vue'
import { useAuthStore } from '@/stores/authStore'

export default defineComponent({
  name: 'CommentList',
  props: {
    postId: {
      type: Number,
      required: true
    },
    userId: {
      type: Number,
      default: null
    }
  },
  setup(props) {
    const {userId, postId} = toRefs(props)
    const auth = useAuthStore()  

    const comments = ref(null)
    const last_comments = ref([])
    const loading_all = ref(null)

    // all comments
    // get all eyes current news
    // get last 3 amoji
    // show all comments current news

    watch([userId, postId], async ([newUser, newPost]) => {
      if (!newPost) return

      const payload = {
        userId: newUser ?? null, 
        postId: newPost
      }

      try {
        if(newUser) {
          const result = await fetch('http://quickduck.com/auth/person-comment', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(payload)
          })

          const answer = await result.json()
          comments.value = answer.comment
        }

        // load all comments current news
        loadCurrentComments(newPost)
      } catch(e) {
        console.error('Ошибка при загрузке комменатриев', e)
      }
    }, {immediate: true}) 

    async function loadCurrentComments(postId) {
      loading_all.value = true

      try {
        const result = await fetch('http://quickduck.com/auth/get-ten-last-comments', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify({ postId })
        })

        const answer = await result.json()

        if( answer ) {
          return last_comments.value = answer.comments || []
        }

        last_comments.value = []     

      } catch (e) {
        console.error('ошибка загрузки комментариев', e)
        last_comments.value = []
      } finally {
        loading_all.value = false
      }
    }

    return {
      auth,
      comments,
      last_comments,
      loading_all
    }
  }
})
</script>

<template>
  <div>
    <div class="comment-moment pb-1 pt-2 px-2 mb-4">
      <h5>Блок для комментариев:</h5>
    </div>

    <div class="wrapper-comments-persons">
      <div
        v-show="auth.isUser"
      >
        <div v-if="comments" >
          <p>Твой комментарий</p>
        </div>

        <div class="media" v-if="comments">
          <img class="mr-3" src="/icons/user.png" alt="user" />
          <div class="media-body">
            <h3>{{ comments.person_name }}</h3>
            <i>дата комментария: {{ comments.created_at }}</i>
            <hr class="new1" />
            <h5 class="mt-0"><span>тема:</span>{{ comments.post_name }}</h5>
            {{ comments.comment }}
          </div>
        </div>
        <div class="media" v-else>
          <p class="m-0">Ты еще не оставил сюда комментарий</p>
        </div>
      </div>


      <div
        v-if="last_comments.length"
      >
        <div>
          <p>Показаны последние 10 комментариев:</p>
        </div>
        
        <div 
          class="media"
          v-for="stuff_comments in last_comments"
        >
          <img class="mr-3" src="/icons/user.png" alt="user" />
          <div class="media-body">
            <h3>{{ stuff_comments.person_name }}</h3>
            <p>дата комментария: {{ stuff_comments.created_at }}</p>
            <hr class="new1" />
            <h5 class="mt-0"><span>тема:</span> {{ stuff_comments.post_name }}</h5>
            <p>{{ stuff_comments.comment }}</p>
          </div>
        </div>
      </div>

      <div v-else>
        Данных нет будь первым и напиши комментарий сам
      </div>
    </div>
  </div>
</template>

<style scoped>
  
</style>