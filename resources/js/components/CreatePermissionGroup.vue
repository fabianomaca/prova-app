<template>
    <div>
      <h1>Cadastrar Grupo de Permissão</h1>
      <form @submit.prevent="createGroup">
        <div>
          <label>Nome</label>
          <input type="text" v-model="form.name" required />
        </div>
        <div>
          <label>Descrição</label>
          <textarea v-model="form.description"></textarea>
        </div>
        <button type="submit">Cadastrar</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          name: '',
          description: ''
        }
      };
    },
    methods: {
      async createGroup() {
        await axios.post('/api/permission-groups', this.form);
        alert('Grupo de permissão cadastrado com sucesso!');
        this.$router.push('/permission-groups'); // Redireciona para a lista de grupos de permissão
      }
    }
  };
  </script>
  