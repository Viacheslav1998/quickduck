<script>
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Card',
})

</script>

<template>
  <div class="d-flex justify-content-center mb-4">
     <div class="row bg-dark w-100">
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <slot name="title">
              <h5 class="card-title">Card title</h5>
            </slot>
            <slot name="text"> 
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </slot>
           <slot name="actions">
             <a href="#" class="btn btn-primary">Go somewhere</a>
           </slot>       
          </div>
        </div>
    </div>
  </div>
 
</template>

<style>
</style>