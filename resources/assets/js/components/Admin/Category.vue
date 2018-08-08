<template>
  <div class="container user">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
            <small>Directory</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category Directory</h3>
                        <div class="card-header-pills pull-right">
                          <router-link :to="{ name: 'AddCategory' }" class="btn btn-outline-secondary btn-sm"><span class="fa fa-plus"></span> New Category</router-link>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td>{{ category.id }}</td>
                                    <td>{{ category.name }}</td>
                                    <td>{{ category.created_at }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                               <router-link :to="'/admin/category/show/'+category.id" class="btn btn-default"><i class="fa fa-eye"></i></router-link>
                                                <router-link :to="'/admin/category/edit/'+category.id" class="btn btn-default"><i class="fa fa-pencil"></i></router-link>
                                                <a @click="deleteCategory(category.id)" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <li v-bind:class="[{ disabled: !pagination.prev_page_url }]" class="page-item"><a @click="fetchCategory(pagination.prev_page_url)" class="page-link">Prev</a></li>
                    <li class="page-item disabled"><a class="page-link text-dark"> {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                    <li v-bind:class="[{ disabled: !pagination.next_page_url }]"  class="page-item"><a @click="fetchCategory(pagination.next_page_url)" class="page-link">Next</a></li>
                  </ul>
                </nav>
                <!-- /.pagination -->
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
    name: 'Category',
    components: {
      Sidebar
    },
    data() {
                return {
                    categories: [],
                    pagination: {},
                    errors: {}
                }
            },

            created() {
              this.fetchCategory();
            },

            methods: {
              fetchCategory(page_url) {
                let vm = this;
                page_url = page_url || '/api/manage/categories'
                axios.get(page_url)
                .then(res => {
                  this.categories = res.data;
                  // console.log(res.data);
                  vm.makePagination(res.data.meta, res.data.links);
                })
                .catch((err) => this.errors = err.response);
              },

              makePagination(meta, links) {
                let pagination = {
                  current_page: meta.current_page,
                  last_page: meta.last_page,
                  next_page_url: links.next,
                  prev_page_url: links.prev
                }

                this.pagination = pagination;
              },

              deleteCategory(id) {
                if(confirm('Are You sure ?')) {
                    axios.delete(`/api/manage/categories/${id}`, {
                      method: 'delete'
                    })
                    .then(res => {
                      // console.log('deleted');
                      alert('Category Removed');
                      this.fetchCategory();
                    })
                    .catch(err => this.errors = err.response.data.errors);
                }
              }
            }
  }
</script>
<style scoped>
    .user {
      margin-left: 5rem;
    }
</style>