<script>
import { ref, onMounted, defineComponent } from 'vue'
import { useAuthStore } from '@/stores/authStore'

export default defineComponent({
  name: 'CommentList',
  setup() {
    const auth = useAuthStore()  
    
    async function fetchData() {
      try {
        const response = await fetch('http://quickduck.com/get-user-comment');
        
        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const text = await response.text();
        
        // Проверка на пустой ответ
        if (!text) {
          throw new Error('Empty response');
        }

        let data;
        try {
          data = JSON.parse(text);
        } catch (jsonError) {
          throw new Error('Invalid JSON format');
        }

        console.log(data);
      } catch (error) {
        console.error('Fetch error:', error);
      }
    }

    fetchData();

    return {
      auth
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
      <!-- проверка если есть комментарий -->
      <div
        v-show="auth.isUser"
      >
        <div>
          <p>Твой комментарий</p>
        </div>

        <div class="media">
          <img class="mr-3" src="/icons/user.png" alt="user" />
          <div class="media-body">
            <h3>Вячеслав / mr-Corvski</h3>
            <i>дата комментария: 2021-01-02</i>
            <hr class="new1" />
            <h5 class="mt-0"><span>тема:</span> какая то новость</h5>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quaerat explicabo esse.
            Labore fuga eligendi incidunt ea officia sapiente, deserunt aliquam ad laborum soluta
            unde harum obcaecati repellendus perferendis aliquid!
          </div>
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