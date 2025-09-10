import { defineStore } from 'pinia';

export const useTestUserId = defineStore('userId', {
  state: () => ({ user_id: null }),
  getters: {
    getCurrentId: () => {
      console.log(state)
    }
  },
  actions: {
    setCurrentId() {
      //тут можно будект сделать обращение к id 
      this.user_id
    }
  }
})