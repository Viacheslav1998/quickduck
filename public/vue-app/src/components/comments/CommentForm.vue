<script>
import { defineComponent, ref, onMounted, watch } from 'vue';
import { useAuthStore } from '@/stores/authStore';
import { useRouter } from 'vue-router';
import Swal from 'sweetalert2';

export default defineComponent({
  name: 'CommentForm',
  props: {
    modelValue: {
      type: Object,
      require: true
    }
  },
  emits: ["update:modelValue"],
  setup(props, { emit }) {  
    function updateField(field, value) {
      emit("update:modelValue", {
        ...props.modelValue,
        [field]: field === "id" ? Number(value) : value
      })
    }
    
    const auth = useAuthStore()
    const router = useRouter()
    let person_id = ref(null)
    let person_name = ref(null)

   const showAlert = ({status, message}) => {
      Swal.fire({
        text: message,
        icon: status
      })
    }

    const status = ref('published')
    const comment = ref('')
    const reaction = ref('/soc-icons/sm1.png')

    // box smiles
    const smileyOptions = [
      { value: '/soc-icons/sm1.png', src: '/soc-icons/sm1.png', alt: 'seriously' },
      { value: '/soc-icons/sm2.png', src: '/soc-icons/sm2.png', alt: 'surprise' },
      { value: '/soc-icons/sm3.png', src: '/soc-icons/sm3.png', alt: 'smile' },
      { value: '/soc-icons/sm4.png', src: '/soc-icons/sm4.png', alt: 'big smile' },
      { value: '/soc-icons/sm5.png', src: '/soc-icons/sm5.png', alt: 'angry' }
    ]

    const loginClick = (e) => {
      router.push('/login')
    }

    const url = "http://quickduck.com/auth/post-comment"

    const postComment = async () => {

      if(!comment.value || comment.value.trim() === '') {
        alert('комментарий пустой!')
        return;
      }

      try {
        const commentData = {
          post_name: props.modelValue.name,
          person_name: person_name.value,
          comment: comment.value,
          user_id: person_id.value,
          post_id: props.modelValue.id,
          status: status.value,
          reaction: reaction.value
        }

        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(commentData)
        })

        if (!response.ok) throw new Error('Ошибка сети')

        const result = await response.json()

        showAlert({
          status: 'success',
          message: result.message,
        })

        // console.log('Success send: ', result)

      } catch (error) {

        showAlert({
          status: 'error',
          message: error.message,
        })

        // console.error('Error send: ', error)       
      }
    } 

    onMounted(() => {
      watch(() => auth.user, 
      (newUser) => {
        if (newUser) {
          person_id.value = newUser.id
          person_name.value = newUser.name
        } else {
          console.log("Пользователь не авторизован")
        }
      }, {immediate: true, deep: true});
    });

    return {
      auth,
      person_id,
      person_name,
      status,
      comment,
      reaction,
      smileyOptions,
      loginClick,
      updateField,
      postComment
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
      <form @submit.prevent="postComment">
        <div class="reactions d-flex">
          <div class="pt-1"><p>Среагировать:</p></div>
        </div>
        <div>
          <!-- post data need test - just or not data here -->
          <input type="hidden" v-model="modelValue.name">
          <input type="hidden" v-model="modelValue.id">
          <!-- person data -->
          <input type="hidden" v-model="person_id">
          <input type="hidden" v-model="person_name">
          <!-- publication status [published]-->
          <input type="hidden" v-model="status">
        </div>
        <div class="image-radio-group">
          <label 
            v-for="option in smileyOptions"
            :key="option.value"
          >
            <input 
              type="radio"
              name="reaction"
              v-model="reaction"
              :value="option.value"
            />
            <img 
              :src="option.src"
              :alt="option.alt"
            />
          </label>
        </div>
        <div class="person py-2">
          <label>я комментирую: </label>
        </div>
        <div class="form-group">
          <textarea
            v-model="comment"
            class="form-control"
            id="justCommentPerson"
            rows="3"
            placeholder="Например: Отличная статья, здесь много полезного"
          ></textarea>
        </div>
        <button type="submit" class="btn btn-info">Отправить комментарий</button>

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
    <div class="guest mb-3 pb-1 pt-2 px-2">
      <h5>Что бы комментировать <span><a style="color: orange; font-weight: 700; " href="#" @click.prevent="loginClick">Зайди</a></span> в систему</h5> 
    </div>    
  </div>
</template>