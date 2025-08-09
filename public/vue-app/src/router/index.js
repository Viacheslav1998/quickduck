import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/authStore'

import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import FormView from '../views/FormView.vue'
import LoginView from '../views/LoginView.vue'
import SingleView from '../views/SingleView.vue'
import NotFoundView from '../views/NotFoundView.vue'
import TagNewsView from '../views/TagNewsView.vue'
import ProfileView from '../views/ProfileView.vue'
import SecretView from '../views/SecretView.vue'
import TestApplicationView from '../views/TestApplicationView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/test-app',
    name: 'TestApplicationView',
    component: TestApplicationView
  },
  {
    path: '/about',
    name: 'about',
    component: AboutView
  },
  {
    path: '/form',
    name: 'form',
    component: FormView,
    meta: {requiresGuest: true}
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView,
    meta: { requiresGuest: true } 
  },
  {
    path: '/profile',
    name: 'profile',
    component: ProfileView,
    meta: { requiresAuth: true } 
  },
  {
    path: '/secret',
    name: 'secret',
    component: SecretView,
    meta: { requiresAuth: true } 
  },
  {
    path: '/news/:id',
    name: 'news',
    component: SingleView
  },
  {
    path: '/tag/:tag',
    name: 'tagNews',
    component: TagNewsView
  },
  {
    path: '/:catchAll(.*)',
    name: 'NotFoundView',
    component: NotFoundView
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

router.beforeEach(async (to, from, next) => {
  const auth = useAuthStore()

  if(!auth.user && localStorage.getItem('token')) {
    await auth.fetchMe()
  }

  if(to.meta.requiresAuth && !auth.isAuthenticated) {
    return next('/login')
  }

  if(to.meta.requiresGuest && auth.isAuthenticated) {
    return next('/')
  }

  next()
})

export default router
