<template>
  <div>
    <div class="container mt-5" id="app">

      <form @submit.prevent="login">
        <div class="form-group">
          <label>Email:</label>
          <input type="email" v-model="email" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Senha:</label>
          <input type="password" v-model="password" class="form-control" required />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
      </form>
      <div v-if="errorMessage" class="alert alert-danger">
        {{ errorMessage }}
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
      errorMessage: null,
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/api/login', {
          email: this.email,
          password: this.password,
        });
      
        const token = response.data.token;
        localStorage.setItem('token', token); 
        this.$router.push('/users');
        
      } catch (error) {
        this.errorMessage = 'Login ou senha incorretos!';
      }
    },
  },
};
</script>
