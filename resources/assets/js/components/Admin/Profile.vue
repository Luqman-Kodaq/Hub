<template>
  <div class="container profile">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
                Profile
            <small>Details</small>
        </h1>
         <ol class="breadcrumb">
          <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-5 col-xs-12 profile-card">
            <div class="card" style="border-radius: 5%">
              <img class="card-img-top" :src=user.profile_photo :alt=user.name style="border-radius: 5%">
              <span class="hidden-xs"></span>
              <div class="caption form-group text-center">
                <h3><strong>{{ user.name }}</strong></h3>
                <br>
                <p>{{ profile.about }}</p>
                <label for="facebook"><strong>Facebook Id:</strong></label>
                    <p>{{ profile.facebook }}</p>
                <label for="twitter"><strong>Twitter Id:</strong></label>
                    <p>{{ profile.twitter }}</p>
                <label for="instagram"><strong>Instagram Id:</strong></label>
                    <p>{{ profile.instagram }}</p>
                <label for="facebook"><strong>Gender:</strong></label>
                    <p>{{ user.gender }}</p>
              </div>
              <div>
                <p>
                  <a class="btn btn-sm btn-info" style="border-radius: 50px"><router-link :to="'/admin/profile/edit/'+profile.id" class="nav-link" active-class="active" style="cursor: pointer">Edit Profile</router-link></a>
                   <a class="btn btn-sm btn-info pull-right" role="button" style="border-radius: 50px"><router-link :to="{ name: 'Dashboard' }" class="nav-link" active-class="active" style="cursor: pointer"><i class="fa fa-arrow-left"></i> Cancel</router-link></a>
              </p>
              </div>
        </div>
        </div>
    </div>
        <!-- /.row -->
    </section>
    <Sidebar/>
  </div>
</template>

<script>
import Sidebar from './Sidebar'
  export default {
    name: 'Profile',
    components: {
        Sidebar
    },
    
    data() {
                return {
                    profile: {},
                    user: {},
                    errors: {}
                }
            },

            mounted() {
              this.fetchUsers();
            },

            methods: {
              fetchUsers() {
                let user = JSON.parse(localStorage.getItem('credentials'));
                let id = user.data.credentials.id;
                axios.get(`/api/manage/users/${id}`)
                .then(res => {
                    this.user = res.data;
                    this.profile = res.data.profile;
                  // console.log(this.user);
                })
                .catch((err) => this.errors = err.response.data.errors);
              },
            }
  }
</script>
<style scoped>
    .profile {
      margin-left: 5rem;
    }

    .profile-card {
      margin-left: 20rem;
    }
</style>