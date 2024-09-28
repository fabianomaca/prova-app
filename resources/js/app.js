// resources/js/app.js
import './bootstrap';

import { createApp } from 'vue';

// Importa o componente HomePage
import HomePage from './components/HomePage.vue';
import UserList from './components/UserList.vue';
import NewUserForm from './components/NewUserForm.vue';
import GroupList from './components/GroupList.vue';
import NewGroupForm from './components/NewGroupForm.vue';


import 'bootstrap/dist/css/bootstrap.min.css'; // Importa o CSS do Bootstrap
import 'bootstrap'; // Importa o JavaScript do Bootstrap

// Cria a instância do Vue
const app = createApp({});

// Registra o componente
app.component('home-page', HomePage);

app.component('user-list', UserList);

app.component('group-list', GroupList);

app.component('new-user-form', NewUserForm);

app.component('new-group-form', NewGroupForm);

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

