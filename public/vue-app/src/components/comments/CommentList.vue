<script>
import { defineComponent, toRefs, ref, watch} from 'vue'
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
      required: true
    }
  },
  setup(props) {
    const {userId, postId} = toRefs(props)
    const auth = useAuthStore()  

    const comments = ref(null)

    // all comments
    // get all eyes current news
    // get last 3 amoji
    // show all comments current news

    watch([userId, postId], async ([newUser, newPost]) => {
      if (!newUser || !newPost ) return

      const payload = {
        userId: newUser, 
        postId: newPost
      }

      const result = await fetch('http://quickduck.com/auth/person-comment', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload)
      })

      const answer = await result.json()
      comments.value = answer.comment

    }, {immediate: true}) 

    return {
      auth,
      comments
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
        <div>
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

      <div>
        <p>Показаны последние 10 комментариев:</p>
      </div>

      <div class="media">
        <img class="mr-3" src="/icons/user.png" alt="user" />
        <div class="media-body">
          <i>дата комментария: 2021-01-02</i>
          <hr class="new1" />
          <h5 class="mt-0"><span>тема:</span> какая то новость</h5>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quaerat explicabo esse.
          Labore fuga eligendi incidunt ea officia sapiente, deserunt aliquam ad laborum soluta
          unde harum obcaecati repellendus perferendis aliquid!
        </div>
      </div>

      <div class="media">
        <img class="mr-3" src="/icons/avatar.png" alt="user" />
        <div class="media-body">
          <i>дата комментария: 2021-01-02</i>
          <hr class="new1" />
          <h5 class="mt-0"><span>тема:</span> какая то новость</h5>
          я считаю, что это отличная статья
        </div>
      </div>

      <div class="media">
        <img class="mr-3" src="/icons/user.png" alt="user" />
        <div class="media-body">
          <i>дата комментария: 2021-01-02</i>
          <hr class="new1" />
          <h5 class="mt-0"><span>тема:</span> какая то новость</h5>
          я считаю, что это отличная статья
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  
</style>