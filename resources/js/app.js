// resources/js/app.js


import { createApp } from 'vue';

// Importa o componente HomePage
import HomePage from './components/HomePage.vue';
import UserList from './components/UserList.vue';
import NewUserForm from './components/NewUserForm.vue';
import GroupList from './components/GroupList.vue';
import NewGroupForm from './components/NewGroupForm.vue';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';
import 'bootstrap-icons/font/bootstrap-icons.css';





// Cria a instância do Vue
const app = createApp({});

// Registra o componente
app.component('home-page', HomePage);

app.component('user-list', UserList);

app.component('group-list', GroupList);

app.component('new-user-form', NewUserForm);

app.component('newgroup-form', NewGroupForm);

// Adiciona o método para navegação
app.mixin({
    methods: {
        goToUsers() {
            window.location.href = '/users'; // Redireciona para a rota de listagem de usuários
        }
    }
});

// Monta o Vue na div com ID 'app'
app.mount('#app');

