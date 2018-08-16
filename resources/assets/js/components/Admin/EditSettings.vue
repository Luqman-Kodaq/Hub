<template>
  <div class="container profile">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
                Settings
            <small>Details</small>
        </h1>
         <ol class="breadcrumb">
          <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'Settings' }">Settings</router-link></li>
            <li class="breadcrumb-item active pull-right">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Edit Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form @submit.prevent="updSetting">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="site_name" class="form-control" placeholder="Site Name" v-model="settings.site_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control" placeholder="Address" v-model="settings.address">
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="contact_us" class="form-control" placeholder="Our Number" v-model="settings.contact_us">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <input type="text" name="contact_email" class="form-control" placeholder="Our Email Address" v-model="settings.contact_email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <textarea name="about_us" id="about" class="form-control" cols="30" rows="10" placeholder="About Us" v-model="settings.about_us"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <textarea name="our_services" id="services" class="form-control" cols="30" rows="10" placeholder="Our Services" v-model="settings.our_services"></textarea>
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
    name: 'EditSettings',
    components: {
        Sidebar
    },
    
    data() {
                return {
                    settings: {},
                    errors: {}
                }
            },

            mounted() {
              this.fetchSetting();
            },

            methods: {
              fetchSetting() {
                axios.get('/api/manage/settings/1')
                .then(res => {
                  let data = res.data;
                  this.settings = data;
                  // console.log(data)
                })
                .catch((err) => this.errors = err.response.data.errors);
              },

              updSetting(e) {
                let updSet = {
                  site_name: this.settings.site_name,
                  address: this.settings.address,
                  contact_us: this.settings.contact_us,
                  contact_email: this.settings.contact_email,
                  about_us: this.settings.about_us,
                  our_services: this.settings.our_services
                }
                axios.put('/api/manage/settings/1', updSet)
                .then(res => {
                  this.settings = res.data;
                  // console.log(this.settings);
                  this.$router.push('/admin/settings')
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