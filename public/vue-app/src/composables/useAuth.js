/**
 * check is role
 * return token || default role = 'guest'  
 * use token
 * use LocalStorage
 * 
 * but you can use pinia ***
 */
export function useAuth() {
  const getRole = () => {
    const token = localStorage.getItem('token')

    if(!token) return 'guest'

    try {
      const payload = JSON.parse(atob(token.split('.')[1]))
      return payload.role || 'guest'
    } catch (e) {
      return 'guest'
    }
  }  

  const isGuest = () => getRole() === 'guest'
  const isAdmin = () => getRole() === 'admin'
  const isUSer = () => getRole() === 'user'

  return { getRole, isGuest, isAdmin, isUSer }
}