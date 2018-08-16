<template>
  <div class="container user">
     <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tag
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'Tag' }">Tag</router-link></li>
            <li class="breadcrumb-item active pull-right">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Edit Tag</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form @submit.prevent="updateTag">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Tag Name" v-model="tag.name" autofocus>
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
  name: 'EditTag',
  components: {
    Sidebar
  },

  data() {
    return {
        tag: {},
        errors: {}
    }
  },

    methods: {
      fetchTag(id) {
      axios.get(`/api/manage/tags/${id}`)
      .then(res => {
        let data = res.data;
        this.tag = data;
        // console.log(data)
      })
      .catch((err) => this.errors = err.response.data.errors);
    },

      updateTag(e) {
          let updTag = {
            name: this.tag.name
          }
          // console.log(updTag);
          axios.put('/api/manage/tags/'+this.$route.params.id, updTag)
          .then(res => {
            this.tag = res.data;
            this.$router.push('/admin/tag')
          })
          .catch((err) => this.errors = err.response.data.errors)
      }
    },

    mounted() {
      this.fetchTag(this.$route.params.id);
    }
  }
</script>
<style scoped>
    .user {
      margin-left: 5rem;
    }
</style>