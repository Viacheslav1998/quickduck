<script>
import { defineComponent, reactive, ref } from 'vue';

export default defineComponent ({
  name: 'testComponent',
  emits: ['someEvent'],
  setup() {
    const textTestComponent = ref('подключен тест компонент')
    const count = ref(0)
    const handleExample = ref('example')

    const exampleValue = ref('example value')
    console.log(exampleValue)
    console.log(exampleValue.value)

    const attrObjExample = {
      id: 'example',
      class: 'bg-warning m-3 p-3',
      style: 'color: black; font-family: Calibri; font-size: 28px;'
    }

    const stateDefault = reactive({ count: 0 })

    // just example run event 
    const greet = (e) => {
      alert(`hello ${handleExample.value}!`)
      console.dir(`hello ${handleExample.value}`)
      if(e) {
        alert(e.target.tagName)
        console.warn(e.target.tagName)
      }
    }

    // another type func for example
    function say(message) {
      alert(message)
    }    

    return {
      textTestComponent,
      count,
      greet,
      say,
      attrObjExample,
      stateDefault
    }
  }
  
})

</script>

<template>
  <div class="container bg-dark pt-1">
    <h2>{{ textTestComponent }}</h2>
    <p>смысл в этом компоненте будет заключатся в emit</p>
    <div class="m-2 p-2 justify-content-start text-left">
      <div 
        class="btn btn-success"
        @click="$emit('someEvent', 1)"
      >
        Клик сработал 
      </div><br></br>
      <div class="btn btn-info my-2" @mouseout="count++">просто пример другого события - счет: {{ count }}</div>
      <br></br>
      <div class="btn btn-info" @click.stop="greet">отобразить что и где вызвалось</div>
    </div>
    <div v-bind="attrObjExample">
      пример работы с атрибутами - класс и стиль работает через обьект
      <br></br>
      <i>а это "рективная" кнопка </i>
      <div class="btn btn-danger" @click="stateDefault.count++"> {{ stateDefault.count }}</div>
    </div>
    <br></br>
  </div>
</template>