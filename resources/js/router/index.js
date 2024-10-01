import { createRouter, createWebHistory } from 'vue-router'; // Vue Router para Vue 3
import Login from '../components/Login.vue';
import HomePage from '../components/HomePage.vue';

import UserList from '../components/UserList.vue';
import NewUserForm from '../components/NewUserForm.vue';
import GroupList from '../components/GroupList.vue';
import NewGroupForm from '../components/NewGroupForm.vue';


const routes = [
  {
    path: '/',
    name: 'HomePage',
    component: HomePage,
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/users',
    name: 'Users',
    component: UserList,
    meta: { requiresAuth: true },
  },

  {
    path: '/groups',
    name: 'Groups',
    component: GroupList,
    meta: { requiresAuth: true },
  },

  {
    path: '/newuser',
    name: 'newuser',
    component: NewUserForm,
    meta: { requiresAuth: true },
  },

  {
    path: '/newgroup',
    name: 'newgroup',
    component: NewGroupForm,
    meta: { requiresAuth: true },
  },


];

const router = createRouter({
  history: createWebHistory(), // Usa o histórico sem hash (#)
  routes,
});

// Guardas de navegação para verificar a autenticação
router.beforeEach((to, from, next) => {
  const isAuthenticated = !!localStorage.getItem('token'); // Verifica se o token está presente no localStorage

  // Se a rota requer autenticação e o usuário não está autenticado
  if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
    next({ name: 'Login' }); // Redireciona para a página de login
  } else {
    next(); // Permite a navegação
  }
});

export default router;
