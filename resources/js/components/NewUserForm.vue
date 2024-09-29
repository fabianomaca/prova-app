<template>
  <div class="container mt-5">
    <h1>Cadastro de Novo Usuário</h1>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" v-model="name" id="name" required />
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" v-model="email" id="email" required />
      </div>

      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" v-model="password" id="password" required />
      </div>

      <div class="form-group">
        <label for="group">Grupo</label>
        <select class="form-control" v-model="selectedGroup" id="group" required>
          <option v-for="group in groups" :key="group.id" :value="group.id">
            {{ group.name }}
          </option>
        </select>
      </div>
      <br />
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <br />
        <br />
        <button class="btn btn-primary" @click="goToUsers">Voltar para Lista de Usuários</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      selectedGroup: null,
      groups: [], // Armazena os grupos que serão carregados da API
    };
  },
  created() {
    this.loadGroups();
  },
  methods: {
    // Carrega os grupos da API
    loadGroups() {
      axios.get('/api/groups')
        .then(response => {
          this.groups = response.data;
        })
        .catch(error => {
          console.error('Erro ao carregar grupos:', error);
        });
    },
    // Enviar os dados do formulário
    submitForm() {
      const userData = {
        name: this.name,
        email: this.email,
        password: this.password,
        permission_group_id: this.selectedGroup
      };

      axios.post('/api/newuser', userData)
        .then(response => {
          alert('Usuário criado com sucesso!');
          this.resetForm();
        })
        .catch(error => {
          alert('Erro ao criadar um usário!');
          console.error('Erro ao criar usuário:', error);
        });
    },
    // Resetar o formulário após o envio
    resetForm() {
      this.name = '';
      this.email = '';
      this.password = '';
      this.selectedGroup = null;
    }
  }
};
</script>

<style scoped>
/* Estilos para o formulário */
</style>
