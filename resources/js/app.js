// resources/js/app.js


import { createApp } from 'vue';
import router from './router'; // Importa o router que acabamos de configurar


// Importa o componente HomePage
import HomePage from './components/HomePage.vue';
import UserList from './components/UserList.vue';
import NewUserForm from './components/NewUserForm.vue';
import GroupList from './components/GroupList.vue';
import NewGroupForm from './components/NewGroupForm.vue';
import Login from './components/Login.vue'; 
import App from './App.vue';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';
import 'bootstrap-icons/font/bootstrap-icons.css';


// Cria a instância do Vue
const app = createApp(App);

// Registra o componente
app.component('home-page', HomePage);

app.component('user-list', UserList);

app.component('group-list', GroupList);

app.component('new-user-form', NewUserForm);

app.component('newgroup-form', NewGroupForm);

app.component('login-component', Login);

// Adiciona o método para navegação
app.mixin({
    methods: {
        goToUsers() {
            window.location.href = '/login'; // Redireciona para a rota de listagem de usuários
        }
    }
});

//app.use(router);
// Monta o Vue na div com ID 'app'
//app.mount('#app');

app.use(router).mount('#app');

