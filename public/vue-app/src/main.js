import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { useAuthStore } from './stores/authStore.js'

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import './assets/main.css'

import App from './App.vue'
import router from './router'

import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

import.meta.env.DEV && import('@vite/client')

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(VueSweetalert2)

const auth = useAuthStore()
auth.fetchMe()

app.mount('#app')
