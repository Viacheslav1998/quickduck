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
      if (!token) return

      try {
        const res = await fetch('http://quickduck.com/api/me', {
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json'
          }
        })

        if (!res.ok) throw new Error('Bad token')
        
        const data = await res.json()
        this.setUserData(data.user, token)
      } catch (err) {
        this.logout()
      }
    }
  }
})