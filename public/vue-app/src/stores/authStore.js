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
      
      if (!token)  {
        console.warn('[fetchMe] Токен не найден')
        return
      }

      try {
        console.log('[fetchMe] Пытаюсь обратиться с токеном:', token)

        const res = await fetch('http://quickduck.com/auth/api/me', {
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json'
          }
        })

        console.log('[fetchMe] ответ получен:', res.status)

        if (res.ok === 401) {
          console.warn('[fetchMe] Токен невалиден, делаем logout')
          throw new Error('Bad token')
        }

        if(!res.ok) {
          console.warn('[fetchMe] Ответ не OK: ', res.status)
          throw new Error(`Ошибка запроса: ${res.status}`)
        }
        
        const data = await res.json()
        console.log('[fetchMe] Пользователь получен: ', data)
        this.setUserData(data.user, token)

      } catch (err) {
        console.error('[fetchMe] Ошибка запроса:', err.message)
        // this.logout()
      }
    }
  }
})