<!-- resources/js/components/PermissionGroups.vue -->
<template>
    <div class="container mt-5">
      <h1>Grupos de Permissão</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="group in permissionGroups" :key="group.id">
            <td>{{ group.id }}</td>
            <td>{{ group.name }}</td>
            <td>{{ group.description }}</td>
          </tr>
        </tbody>
      </table>
      <br />
      <div class="form-group">
      <button class="btn btn-primary" @click="goToRegisterGroup">Cadastrar Grupo</button>
      <br />
      <br />
      <button class="btn btn-primary" @click="goToUsers">Voltar para Lista de Usuários</button>
    </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'GroupList',
    data() {
      return {
        permissionGroups: [] // Array para armazenar os grupos de permissão
      };
    },
    mounted() {
      // Faz a requisição para a API assim que o componente é montado
      axios.get('/api/groups')
        .then(response => {
          this.permissionGroups = response.data; // Armazena os dados dos usuários
        })
        .catch(error => {
          console.error("Erro ao buscar grupo:", error);
        });
    },
    methods: {
      async fetchGroups() {
      try {
        const response = await axios.get('/api/groups');
        this.permissionGroups = response.data;
      } catch (error) {
        console.error('Erro ao buscar grupo:', error);
      }
    },
    async deleteGroup(groupId) {
      if (confirm('Você tem certeza que deseja deletar este grupo?')) {
        try {
          await axios.delete(`/api/group/${groupId}`);
          this.fetchGroups(); // Atualiza a lista após a deleção
          alert('Grupo deletado com sucesso!');
        } catch (error) {
          console.error('Erro ao deletar grupo:', error);
          alert('Erro ao deletar grupo.');
        }
      }
    },
    goToRegisterGroup() {
      // Redireciona para a tela de cadastro
      window.location.href = '/newgroup'; // A rota do cadastro
    },
    }
  };
  </script>
  
  <style scoped>
  /* Adicione estilos adicionais, se necessário */
  </style>
  