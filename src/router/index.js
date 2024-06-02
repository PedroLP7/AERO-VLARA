import { createRouter, createWebHistory } from 'vue-router'

import Landing from '../views/Landing.vue'
import IndexView from '@/views/IndexView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Landing
    },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // },
    {
      path: '/index',
      name: 'index',
      component: IndexView,
      meta: { requiresAuth: true }
    }


    
  ] 
})
router.beforeEach((to, from, next) => {
  const isAuthenticated = !!localStorage.getItem('authToken'); // Verifica si el token está en localStorage
  
  if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
    console.log('Not authenticated, redirecting to home.');
    next('/'); // Redirige a la página de inicio si no está autenticado
  } else {
    console.log('Authenticated or public route, proceeding.');
    next(); // Continúa a la ruta
  }
});



export default router
