<template>
    <div>
      <h1>Lista de Grupos de Permissão</h1>
      <table>
        <tr v-for="group in permissionGroups" :key="group.id">
          <td>{{ group.name }}</td>
          <td>{{ group.description }}</td>
          <td>
            <button @click="editGroup(group.id)">Editar</button>
            <button @click="deleteGroup(group.id)">Deletar</button>
          </td>
        </tr>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        permissionGroups: []
      };
    },
    async created() {
      const response = await axios.get('/api/permission-groups');
      this.permissionGroups = response.data;
    },
    methods: {
      async deleteGroup(id) {
        await axios.delete(`/api/permission-groups/${id}`);
        this.permissionGroups = this.permissionGroups.filter(group => group.id !== id);
      }
    }
  };
  </script>
  