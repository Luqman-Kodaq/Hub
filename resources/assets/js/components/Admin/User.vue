<template>
  <div class="container user">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Directory</small>
        </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Directory</h3>
                        <div class="card-header-pills pull-right">
                          <router-link :to="{ name: 'AddUser' }" class="btn btn-outline-secondary btn-sm"><span class="fa fa-plus"></span> New User</router-link>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Posts</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.posts }}</td>
                                    <td>{{ user.status }}</td>
                                    <td>{{ user.created_at }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                               <router-link :to="'/admin/user/show/'+user.id" class="btn btn-default"><i class="fa fa-eye"></i></router-link>
                                                <router-link :to="'/admin/user/edit/'+user.id" class="btn btn-default"><i class="fa fa-pencil"></i></router-link>
                                                <a @click="deleteUser(user.id)" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <li v-bind:class="[{ disabled: !pagination.prev_page_url }]" class="page-item"><a @click="fetchUsers(pagination.prev_page_url)" class="page-link">Prev</a></li>
                    <li class="page-item disabled"><a class="page-link text-dark"> {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                    <li v-bind:class="[{ disabled: !pagination.next_page_url }]"  class="page-item"><a @click="fetchUsers(pagination.next_page_url)" class="page-link">Next</a></li>
                  </ul>
                </nav>
                <!-- /.pagination -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <Sidebar/>
  </div>
</template>

<script>
import Sidebar from './Sidebar'
  export default {
    name: 'User',
    components: {
      Sidebar
    },
    data() {
                return {
                    users: [],
                    pagination: {},
                    errors: {}
                }
            },

            mounted() {
              this.fetchUsers();
            },

            methods: {
              fetchUsers(page_url) {
                let vm = this;
                page_url = page_url || '/api/manage/users'
                axios.get(page_url)
                .then(res => {
                  this.users = res.data.data;
                  console.log(res.data.meta);
                  vm.makePagination(res.data.meta, res.data.links);
                })
                .catch((err) => this.errors = err.response.data.errors);
              },

              makePagination(meta, links) {
                let pagination = {
                  current_page: meta.current_page,
                  last_page: meta.last_page,
                  next_page_url: links.next,
                  prev_page_url: links.prev
                }

                this.pagination = pagination;
              },

              deleteUser(id) {
                if(confirm('Are You sure ?')) {
                    axios.delete(`/api/manage/users/${id}`, {
                      method: 'delete'
                    })
                    .then(res => {
                      // console.log('deleted');
                      alert('User Removed');
                      this.fetchUsers();
                    })
                    .catch(err => this.errors = err.response.data.errors);
                }
              }
            }
  }
</script>
<style scoped>
    .user {
      margin-left: 5rem;
    }
</style>