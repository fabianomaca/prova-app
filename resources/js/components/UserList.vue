<template>
    <div class="container mt-5">
      <h1>Lista de Usuários</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
                <!-- Botão para deletar o usuário -->
            <button class="btn btn-danger" @click="deleteUser(user.id)">Deletar</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Botão para cadastrar um novo usuário -->
    <button class="btn btn-primary" @click="goToRegister">Cadastrar Novo Usuário</button>
    <button class="btn btn-primary" @click="goToGroupList">Listar Grupo de Permissão</button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'UserList',
    data() {
      return {
        users: [] // Armazena os usuários vindos da API
      };
    },
    mounted() {
    this.fetchUsers();
    },
  methods: {
    async fetchUsers() {
      try {
        const response = await axios.get('/api/users');
        this.users = response.data;
      } catch (error) {
        console.error('Erro ao buscar usuários:', error);
      }
    },
    async deleteUser(userId) {
      if (confirm('Você tem certeza que deseja deletar este usuário?')) {
        try {
          await axios.delete(`/api/users/${userId}`);
          this.fetchUsers(); // Atualiza a lista após a deleção
          alert('Usuário deletado com sucesso!');
        } catch (error) {
          console.error('Erro ao deletar usuário:', error);
          alert('Erro ao deletar usuário.');
        }
      }
    },
    goToRegister() {
      // Redireciona para a tela de cadastro
      window.location.href = '/newuser'; // A rota do cadastro
    },
    goToGroupList() {
      window.location.href = '/groups'; // Direciona para a rota de cadastro de grupo
    }
  }
  };
  </script>
  
  <style scoped>
  
  </style>
  