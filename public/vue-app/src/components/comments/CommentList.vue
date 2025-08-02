<script>
import { ref, onMounted, defineComponent } from 'vue';

export default defineComponent({
  name: 'CommentList',
  setup() {
    
  }

})
</script>

<template>
  <div>
     <div class="comment-moment pb-1 pt-2 px-2 mb-4">
        <h5>Блок для комментариев:</h5>
      </div>

      <div class="wrapper-comments-persons">

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