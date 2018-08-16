<template>
  <div class="container user">
     <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'User' }">User</router-link></li>
            <li class="breadcrumb-item active pull-right">Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form @submit.prevent="User">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="User Name" v-model="addUser.name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email Address" v-model="addUser.email">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xm-12">
                                        <div class="form-group">
                                            <image-upload name="profile_photo" class="form-control" @loaded="onload"></image-upload>
                                        </div>
                                </div>
                                <div class="col-md-12 col-xm-12">
                                  <div class="form-group row">
                                    <div class="col-md-12">
                                    <select name="gender"
                                    class="form-control select" v-model="addUser.gender">
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                    </div>
                                </div>
                                </div>  
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" v-model="addUser.password">
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
  name: 'AddUser',
  components: {
    Sidebar,
    ImageUpload
  },

  data() {
    return {
        addUser: {
            name: '',
            email: '',
            password: '',
            gender: '1',
            profile_photo: ''
        },
        errors: {}
    }
  },

    methods: {
      User(e) {
          axios.post('/api/manage/users', this.addUser)
          .then(res => {
            this.$router.push('/admin/user/index')
            alert('User added Successfully')
            console.log(res.data);
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
              this.addUser.profile_photo = res.data;
              console.log(this.addUser.profile_photo);
            })
            .catch((err) => this.errors = err.response.data.errors)
        }
    },

    // created() {
    //   this.User(this.$route.params.id);
    // }
  }
</script>
<style scoped>
    .user {
      margin-left: 5rem;
    }
</style>