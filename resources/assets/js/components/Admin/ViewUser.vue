<template>
  <div class="container user">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Directory</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Home' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'User' }">User</router-link></li>
            <li class="breadcrumb-item active pull-right">View</li>
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
                 <router-link :to="'/admin/user/edit/'+user.id" class="btn btn-outline-secondary btn-sm"><span class="fa fa-pencil"></span> Edit User</router-link>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <!-- Media -->
              <div class="media">
                <div class="media-body">
                  <div>
                    <img :src="user.profile_photo" :alt="user.name" width="100" height="100" style="border-radius: 25px">
                  </div>

                    <label for="Name"><strong>Name</strong></label>
                    <div>
                      <p>{{ user.name }}</p>
                    </div>

                    <label for="Email"><strong>Email</strong></label>
                    <div>
                      <p>{{ user.email }}</p>
                    </div>

                    <label for="Slug"><strong>Gender</strong></label>
                    <div>
                      <p>{{ user.gender }}</p>
                    </div>

                    <label for="Status"><strong>Status</strong></label>
                    <div>
                      <p>{{ user.admin }}</p>
                    </div>
              <!-- /.Media -->
              </div>
            </div>
            </div>
          </div>          
        </div>
      </div>
    </section>
    <Sidebar/>
  </div>
</template>
<script>
import Sidebar from './Sidebar'
export default {
  name: 'ViewUser',
  components: {
    Sidebar
  },

  data() {
    return {
      user: ''
    }
  },

  methods: {
    fetchUser(id) {
      axios.get(`/api/manage/users/${id}`)
      .then(res => {
        let data = res.data;
        this.user = data;
      })
      .catch((err) => this.errors = err.response.data.errors);
    }
  },

  created() {
    this.fetchUser(this.$route.params.id);
  }
  }
</script>
<style scoped>
    .user {
      margin-left: 5rem;
    }
</style>