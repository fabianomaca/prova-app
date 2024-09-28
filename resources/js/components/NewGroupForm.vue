<template>
    <div class="container mt-5">
      <h1>Cadastro de Grupo</h1>
      <form @submit.prevent="registerGroup">
        <div class="form-group">
          <label for="name">Nome:</label>
          <input type="text" v-model="form.name" id="name" required>
        </div>
  
        <div class="form-group">
          <label for="description">Descrição:</label>
          <input type="text" v-model="form.description" id="description" required>
        </div>
  
        <button class="btn btn-primary" type="submit">Cadastrar</button>

        <!-- Botão para ir para a página de listagem de usuários -->
        <button @click="goToUsers">Voltar para Lista de Usuários</button>
      </form>
  
      <!-- Exibe mensagem de sucesso ou erro -->
      <p v-if="successMessage"  class="text-success">{{ successMessage }}</p>
      <p v-if="errorMessage" class="text-danger">{{ errorMessage }}</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        form: {
          name: '',
          description: ''
        },
        successMessage: '',
        errorMessage: ''
      };
    },
    methods: {
      async registerGroup() {
        try {
          // Faz a requisição para a API Laravel
          const response = await axios.post('/api/group', this.form);
          // Define a mensagem de sucesso
          this.successMessage = response.data.message;
          this.errorMessage = '';
          // Limpa o formulário
          this.form.name = '';
          this.form.description = '';
        } catch (error) {
          // Se houver erro, exibe a mensagem de erro
          if (error.response && error.response.data) {
            this.errorMessage = Object.values(error.response.data).join(', ');
          } else {
            this.errorMessage = 'Erro ao cadastrar o grupo.';
          }
          this.successMessage = '';
        }
      }
    }
  };
  </script>
  
  <style scoped>
  
  </style>
  