<template>
  <div class="container user">
     <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tag
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'Tag' }">Tag</router-link></li>
            <li class="breadcrumb-item active pull-right">Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Add Tag</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form @submit.prevent="Tag">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" v-model="addTag.name" autofocus>
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
  name: 'AddTag',
  components: {
    Sidebar
  },

  data() {
    return {
        addTag: {
            name: ''
        },
        errors: {}
    }
  },

    methods: {
      Tag() {
          axios.post('/api/manage/tags', this.addTag)
          .then(res => {
            this.$router.push('/admin/tag')
            console.log(res.data);
          })
          .catch((err) => this.errors = err.response.data.errors)
      },
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