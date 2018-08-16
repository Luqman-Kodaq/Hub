<template>
  <div class="container user">
     <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'Category' }">Category</router-link></li>
            <li class="breadcrumb-item active pull-right">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form @submit.prevent="updateCategory">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Category Name" v-model="category.name" autofocus>
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
  name: 'EditUser',
  components: {
    Sidebar
  },

  data() {
    return {
        category: {},
        errors: {}
    }
  },

    methods: {
      fetchCategory(id) {
      axios.get(`/api/manage/categories/${id}`)
      .then(res => {
        let data = res.data;
        this.category = data;
      })
      .catch((err) => this.errors = err.response.data.errors);
    },

      updateCategory(e) {
          let updCategory = {
            name: this.category.name
          }
        //   console.log(updCategory);
          axios.put('/api/manage/categories/'+this.$route.params.id, updCategory)
          .then(res => {
            this.category = res.data;
            this.$router.push('/admin/category')
          })
          .catch((err) => this.errors = err.response.data.errors)
      }
    },

    mounted() {
      this.fetchCategory(this.$route.params.id);
    }
  }
</script>
<style scoped>
    .user {
      margin-left: 5rem;
    }
</style>