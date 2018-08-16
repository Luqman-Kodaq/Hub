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
            <li class="breadcrumb-item"><router-link :to="{ name: 'Profile' }">Profile</router-link></li>
            <li class="breadcrumb-item active pull-right">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form @submit.prevent="updProfile">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="facebook" class="form-control" placeholder="Facebook ID" v-model="profile.facebook">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="twitter" class="form-control" placeholder="Twitter ID" v-model="profile.twitter">
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="instagram" class="form-control" placeholder="Instagram ID" v-model="profile.instagram">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="about" id="about" class="form-control" cols="30" rows="10" placeholder="About you..." v-model="profile.about"></textarea>
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
import Sidebar from './Sidebar'
  export default {
    name: 'Profile',
    components: {
        Sidebar
    },
    
    data() {
                return {
                    profile: {},
                    errors: {}
                }
            },

            mounted() {
              this.fetchProfile(this.$route.params.id);
            },

            methods: {
              fetchProfile(id) {
                axios.get(`/api/manage/profile/${id}`)
                .then(res => {
                  let data = res.data;
                  this.profile = data;
                  // console.log(data)
                })
                .catch((err) => this.errors = err.response.data.errors);
              },

              updProfile(e) {
                let updProfile = {
                  facebook: this.profile.facebook,
                  twitter: this.profile.twitter,
                  instagram: this.profile.instagram,
                  about: this.profile.about
                }
                axios.put('/api/manage/profile/'+this.$route.params.id, updProfile)
                .then(res => {
                  this.profile = res.data;
                console.log(this.profile);
                  this.$router.push('/admin/profile')
                })
                .catch((err) => this.errors = err.response.data.errors)
              }
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