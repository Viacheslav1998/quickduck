<template>
  <Header />
  <router-view />
  <Footer />
</template>

<script>
import { defineComponent } from 'vue'
import Header from '@/components/layout/Header.vue'
import Footer from '@/components/layout/Footer.vue'

export default defineComponent({
  components: {
    Header,
    Footer
  }
})
</script>
