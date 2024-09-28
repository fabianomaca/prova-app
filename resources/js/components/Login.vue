<template>
    <div>
      <h1>Login</h1>
      <form @submit.prevent="login">
        <input type="email" v-model="email" placeholder="Email" />
        <input type="password" v-model="password" placeholder="Senha" />
        <button type="submit">Entrar</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
        password: ''
      };
    },
    methods: {
      async login() {
        const response = await axios.post('/api/login', {
          email: this.email,
          password: this.password
        });
        localStorage.setItem('token', response.data.access_token);
      }
    }
  };
  </script>
  