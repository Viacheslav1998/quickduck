<script>
import { defineComponent, onMounted } from 'vue';
import { useAuthStore } from '@/stores/authStore';

export default defineComponent({
  name: 'CommentForm',
  setup() {  
    const auth = useAuthStore();

    onMounted(() => {
      // fetch -> get current person name
    })

    return {
      auth
    }
  }
})

</script>
<template>

  <div 
    v-show="auth.isUser"
  >
    <div class="comment-moment pb-1 pt-2 px-2">
      <h5>Оставь свой комментарий:</h5>
    </div>

    <div class="space-comment-area">
      <form @submit.prevent="createComment">
        <div class="reactions d-flex">
          <div class="pt-1"><p>Среагировать:</p></div>
        </div>
        <div class="image-radio-group">
          <label>
            <input type="radio" name="smiley" value="/soc-icons/sm1.png" />
            <img src="/soc-icons/sm1.png" alt="seriously" />
          </label>
          <label>
            <input type="radio" name="smiley" value="/soc-icons/sm2.png" />
            <img src="/soc-icons/sm2.png" alt="surprise" />
          </label>
          <label>
            <input type="radio" name="smiley" value="/soc-icons/sm3.png" />
            <img src="/soc-icons/sm3.png" alt="Smile" />
          </label>
          <label>
            <input type="radio" name="smiley" value="/soc-icons/sm4.png" />
            <img src="/soc-icons/sm4.png" alt="big smile" />
          </label>
          <label>
            <input type="radio" name="smiley" value="/soc-icons/sm5.png" />
            <img src="/soc-icons/sm5.png" alt="angry" />
          </label>
        </div>

        <div class="person py-2">
          <label>я комментирую: </label>
        </div>

        <div class="form-group">
          <textarea
            class="form-control"
            id="justCommentPerson"
            rows="3"
            placeholder="Например: Отличная статья, здесь много полезного"
          ></textarea>
        </div>

        <button type="button" class="btn btn-info">Отправить комментарий</button>

        <br />
        <br />
        <div style="height: 1px; background-color: silver"></div>
        <br />

        <div class="desk-for-person d-flex">
          <div class="d-flex w-50">
            <div><img class="ico-flames" src="/icons/flames.png" /></div>
            <div class="text-flames">
              <p>451</p>
            </div>
          </div>

          <div class="blockq-wrapper w-50">
            <blockquote class="blockquote text-right">
              <p class="mb-0">Не стоит переживать о своих данных:</p>
              <footer class="blockquote-footer">
                Конечно твоё имя будет видно,
                <cite title="Source Title" style="color: darkorange">но не почту.</cite>
              </footer>
            </blockquote>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div
    v-show="auth.isGuest"
  >
    <div class="guest mb-4 pb-1 pt-2 px-2">
      <h5>Что бы комментировать зайди в систему</h5>
    </div>
  </div>

</template>