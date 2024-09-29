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
    
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit" @click="editUser(user)">
              <i class="fas fa-edit"></i> 
            </button>
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalView" @click="viewUser(user.id)">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger" @click="deleteUser(user.id)">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <br />
    <div class="form-group">
      <!-- Botão para cadastrar um novo usuário -->
      <button class="btn btn-primary" @click="goToRegister"><i class="fas fa-plus"></i>Cadastrar Novo Usuário</button>
      <br />
      <br />
      <button class="btn btn-primary" @click="goToGroupList">Listar Grupo de Permissão</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewUserModalLabel">Detalhes do Usuário</h5>
          </div>
          <div class="modal-body">
            <!-- Informações do usuário -->
            <p><strong>ID:</strong> {{ selectedUser.id }}</p>
            <p><strong>Nome:</strong> {{ selectedUser.name }}</p>
            <p><strong>Email:</strong> {{ selectedUser.email }}</p>
            <p><strong>Permissão:</strong> {{ selectedUser.permission_id }}</p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i>Fechar</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal de Edição -->
  <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
        </div>
        <div class="modal-body">
          <form @submit.prevent="saveUser">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" v-model="selectedUser.name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" v-model="selectedUser.email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" v-model="selectedUser.password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
              <label for="group">Group</label>
              <select v-model="selectedUser.permission_id" class="form-control" id="group" required>
                <option v-for="group in groups" :value="group.id" :key="group.id">{{ group.name }}</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" data-bs-dismiss="modal"><i class="fas fa-save"></i>Salvar</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i>Fechar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'UserList',
  data() {
    return {
      activeModal: null,
      users: [],
      groups: [],
      selectedUser: {},
      viewedUser: null,
    };
  },
  mounted() {
    this.fetchUsers();
    this.fetchGroups();
  },
  methods: {
    async fetchUsers() {
      try {
        const response = await axios.get('/api/users');
        this.users = response.data;
      } catch (error) {
        alert('Erro ao criadar um usário!');
      }
    },
    async deleteUser(userId) {
      if (confirm('Você tem certeza que deseja deletar este usuário?')) {
        try {
          await axios.delete(`/api/users/${userId}`);
          this.fetchUsers(); // Atualiza a lista após a deleção
          alert('Usuário deletado com sucesso!');
        } catch (error) {
          alert('Erro ao deletar usuário!');
          console.error('Erro ao deletar usuário:', error);
          alert('Erro ao deletar usuário.');
        }
      }
    },
    fetchGroups() {
      axios.get('/api/groups').then(response => {
        this.groups = response.data;
      });
    },
    editUser(user) {

      this.selectedUser = { ...user };
    },


    viewUser(idUser) {
      // Faz uma requisição GET para a API para buscar os dados do usuário
      axios.get('/api/users/' + idUser).then(response => {
        console.log(response.data);
        this.selectedUser.id = response.data.id;
        this.selectedUser.name = response.data.name;
        this.selectedUser.email = response.data.email;

        axios.get('/api/group/' + response.data.permission_group_id).then(response => {
          console.log(response.data);
          this.selectedUser.permission_id = response.data.name;
        });
      });
    },

    saveUser() {
      axios.put('/api/users/'+this.selectedUser.id, this.selectedUser).then(response => {
        console.log(response.data);
        this.fetchUsers();
        this.selectedUser = response.data;
      });
    },

    goToRegister() {
      // Redireciona para a tela de cadastro
      window.location.href = '/newuser'; // A rota do cadastro
    },
    goToGroupList() {
      window.location.href = '/groups'; // Direciona para a rota de cadastro de grupo
    },

    closeModal() {
      this.activeModal = null; // Fecha o modal
    },

  }
};
</script>

<style scoped></style>