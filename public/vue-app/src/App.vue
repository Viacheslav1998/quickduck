<template>
  <Header />
  <router-view />
  <Footer />
</template>

<script>
import { defineComponent } from "vue";
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';
import '../src/scripts/work_with_array.js';

export default defineComponent({
  components: {
    Header,
    Footer
  }
})
</script>
