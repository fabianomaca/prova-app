<!-- resources/js/components/HomePage.vue -->
<template>
    <div class="home-container">
        <h1>Bem-vindo à Home</h1>
        <p>Esta é a tela inicial de nosso sistema de gerenciamento de usuários.</p>
        <p>Prova App - Fabiano Carloto.</p>
      <button class="btn btn-primary" @click="goToLogin">Ir para Login</button>
    </div>
  </template>
  
  <script>
  export default {
    name: 'HomePage',
    methods: {
      goToLogin() {
        window.location.href = '/login'; // Redireciona para a tela de login
      }
    }
  };
  </script>
  
  <style scoped>
  .home-container {
    text-align: center;
    margin-top: 100px;
  }
  
  button {
    background-color: #3490dc;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #2779bd;
  }
  </style>
  