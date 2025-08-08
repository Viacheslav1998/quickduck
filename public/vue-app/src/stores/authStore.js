import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null, 
    token: null    
  }),

  getters: {
    isAuthenticated: (state) => !!state.user && !!state.token,
    role: (state) => state.user?.role || 'guest',

    isAdmin: (state) => state.user?.role === 'admin',
    isUser: (state) => state.user?.role === 'user',
    isGuest: (state) => !state.user || state.user?.role === 'guest',
  },

  actions: {
    setUserData(user, token) {
      this.user = user
      this.token = token
      localStorage.setItem('token', token)
    },
    
    logout() {
      this.user = null
      this.token = null
      localStorage.removeItem('token')
    },

    async fetchMe() {
      const token = localStorage.getItem('token')
      
      if (!token) {
        console.warn('[fetchMe] Токен не найден в localStorage')
        return
      }

      try {
        // console.log('[fetchMe] Пытаюсь обратиться с токеном:', token)

        const res = await fetch('http://quickduck.com/auth/api/me', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          }
        })

        // console.log('[fetchMe] ответ получен:', res.status)

        if (res.status === 401) {
          console.warn('[fetchMe] Токен невалиден, делаем logout')
          this.logout()
          return
        }

        if(!res.ok) {
          console.warn('[fetchMe] Ответ не OK: ', res.status)
          throw new Error(`Ошибка запроса: ${res.status}`)
        }

        const data = await res.json()
        // console.log('[fetchMe] Пользователь получен: ', data)
        
        this.setUserData(data.user, token)
      } catch (err) {
        console.error('[fetchMe] Ошибка запроса:', err.message)
      }
    }
  }
})