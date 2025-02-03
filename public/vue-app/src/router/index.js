import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import FormView from '../views/FormView.vue'
import LoginView from '../views/LoginView.vue'
import SingleView from '../views/SingleView.vue'
import NotFoundView from '../views/NotFoundView.vue'
import TagView from '../views/TagView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    },
    {
      path: '/form',
      name: 'form',
      component: FormView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      // /news/{id} or {name}
      path: '/news',
      name: 'news',
      component: SingleView
    },
    {
      path: '/:catchAll(.*)',
      name: 'NotFoundView',
      component: NotFoundView,
    },
    {
      path: '/tag',
      name: 'tag',
      component: TagView,
    },
  ]
})

export default router
