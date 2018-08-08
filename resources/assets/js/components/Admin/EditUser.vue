<template>
  <div class="container user">
     <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Home' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'User' }">User</router-link></li>
            <li class="breadcrumb-item active pull-right">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form @submit.prevent="updateUser">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="User Name" v-model="user.name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email Address" v-model="user.email">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xm-12">
                                        <div class="form-group">
                                            <image-upload name="profile_photo" class="form-control" @loaded="onload"></image-upload>
                                        </div>
                                </div> 
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" v-model="user.password">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button class="btn btn-outline-secondary btn-sm" type="submit" id="submit">
                                            <i class="fa fa-check"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <Sidebar/>
  </div>
</template>

<script>
import ImageUpload from './ImageUpload.vue';
import Sidebar from './Sidebar'
export default {
  name: 'EditUser',
  components: {
    Sidebar,
    ImageUpload
  },

  data() {
    return {
        user: {},
        errors: {}
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
    },

      updateUser(e) {
          let updUser = {
            name: this.user.name,
            email: this.user.email,
            password: this.user.password,
            profile_photo: this.user.profile_photo
          }
          axios.put('/api/manage/users/'+this.$route.params.id, updUser)
          .then(res => {
            this.user = res.data;
            this.$router.push('/admin/user/index')
          })
          .catch((err) => this.errors = err.response.data.errors)
      },

        onload(profile_photo) {
            this.profile_photo = profile_photo.src;

            this.persist(profile_photo.file);
        },

        persist(profile_photo) {
            let data = new FormData();

            data.append('profile_photo', profile_photo);

            let headers = {'Content-Type': 'multipart/form-data'}

            axios.post('/api/upload-photo', data, {headers})
            .then(res => {
              this.user.profile_photo = res.data;
              console.log(this.user.profile_photo);
            })
            .catch((err) => this.errors = err.response.data.errors)
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