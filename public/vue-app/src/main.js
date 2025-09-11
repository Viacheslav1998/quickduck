import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { useAuthStore } from './stores/authStore.js'

import App from './App.vue'
import router from './router'

// Vuetify
import vuetify from './plugins/vuetify.js'
import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'

// Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

// custom css
import './assets/main.css'

// SweetAlert2
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

import.meta.env.DEV && import('@vite/client')

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(VueSweetalert2)
app.use(vuetify)

const auth = useAuthStore()

auth.fetchMe()

app.mount('#app')
