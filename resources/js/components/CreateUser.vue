<template>
    <div>
      <h1>Cadastrar Usuário</h1>
      <form @submit.prevent="createUser">
        <div>
          <label>Nome</label>
          <input type="text" v-model="form.name" required />
        </div>
        <div>
          <label>Email</label>
          <input type="email" v-model="form.email" required />
        </div>
        <div>
          <label>Senha</label>
          <input type="password" v-model="form.password" required />
        </div>
        <div>
          <label>Permissão</label>
          <select v-model="form.permission_group_id" required>
            <option v-for="group in permissionGroups" :key="group.id" :value="group.id">
              {{ group.name }}
            </option>
          </select>
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
          email: '',
          password: '',
          permission_group_id: ''
        },
        permissionGroups: []
      };
    },
    async created() {
      // Carregar os grupos de permissão
      const response = await axios.get('/api/permission-groups');
      this.permissionGroups = response.data;
    },
    methods: {
      async createUser() {
        await axios.post('/api/users', this.form);
        alert('Usuário cadastrado com sucesso!');
        this.$router.push('/users'); // Redireciona para a lista de usuários
      }
    }
  };
  </script>
  