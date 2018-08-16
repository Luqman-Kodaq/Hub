<template>
  <div class="container settings">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Settings
            <small>Directory</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item active pull-right">View</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Settings Directory</h3>
              <!-- <div class="card-header-pills pull-right">
                 <router-link :to="'/admin/settings/edit/'+setting.id" class="btn btn-outline-secondary btn-sm"><span class="fa fa-pencil"></span> Edit Settings</router-link>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <!-- Media -->
              <div class="media">
                <div class="media-body" v-for="setting in settings" :key="setting.id">

                    <label for="Site Name"><strong>Site Name</strong></label>
                    <div>
                      <p>{{ setting.site_name }}</p>
                    </div>

                    <label for="Address"><strong>Address</strong></label>
                    <div>
                      <p>{{ setting.address }}</p>
                    </div>

                    <label for="Contact"><strong>Contact Number</strong></label>
                    <div>
                      <p>{{ setting.contact_us }}</p>
                    </div>

                    <label for="Email"><strong>Contact Email</strong></label>
                    <div>
                      <p>{{ setting.contact_email }}</p>
                    </div>

                    <label for="About"><strong>About Us</strong></label>
                    <div>
                      <p>{{ setting.about_us }}</p>
                    </div>

                    <label for="Services"><strong>Our Services</strong></label>
                    <div>
                      <p>{{ setting.our_services }}</p>
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
    name: 'Settings',
    components: {
        Sidebar
    },
    data() {
                return {
                    settings: {}
                }
            },

             mounted() {
              this.fetchSettings();
            },

            methods: {
              fetchSettings() {
                axios.get('/api/manage/settings')
                .then(res => {
                  this.settings = res.data;
                  console.log(this.settings);
                })
                .catch((err) => this.errors = err.response.data.errors)
              }
            }
  }
</script>
<style scoped>
    .settings {
      margin-left: 5rem;
    }
</style>
