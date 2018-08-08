<template>
  <div class="container user">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Post
            <small>Directory</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Post</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post Directory</h3>
                        <div class="card-header-pills pull-right">
                          <router-link :to="{ name: 'AddPost' }" class="btn btn-outline-secondary btn-sm"><span class="fa fa-plus"></span> New Post</router-link>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in posts" :key="post.id">
                                    <td>{{ post.id }}</td>
                                    <td>{{ post.user_id }}</td>
                                    <td>{{ post.image }}</td>
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.contents }}</td>
                                    <td>{{ post.created_at }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                               <router-link :to="'/admin/post/show/'+post.id" class="btn btn-default"><i class="fa fa-eye"></i></router-link>
                                                <router-link :to="'/admin/post/edit/'+post.id" class="btn btn-default"><i class="fa fa-pencil"></i></router-link>
                                                <a @click="deletePost(post.id)" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
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
                    <li v-bind:class="[{ disabled: !pagination.prev_page_url }]" class="page-item"><a @click="fetchPosts(pagination.prev_page_url)" class="page-link">Prev</a></li>
                    <li class="page-item disabled"><a class="page-link text-dark"> {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                    <li v-bind:class="[{ disabled: !pagination.next_page_url }]"  class="page-item"><a @click="fetchPosts(pagination.next_page_url)" class="page-link">Next</a></li>
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
    name: 'Post',
    components: {
      Sidebar
    },
    data() {
                return {
                    posts: [],
                    pagination: {},
                    errors: {}
                }
            },

            created() {
              this.fetchPosts();
            },

            methods: {
              fetchPosts(page_url) {
                let vm = this;
                page_url = page_url || '/api/manage/posts'
                axios.get(page_url)
                .then(res => {
                  this.posts = res.data;
                  vm.makePagination(res.data.meta, res.data.links);
                })
                .catch((err) => this.errors = err.response.data.errors);
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

              deletePost(id) {
                if(confirm('Are You sure ?')) {
                    axios.delete(`/api/manage/posts/${id}`, {
                      method: 'delete'
                    })
                    .then(res => {
                      // console.log('deleted');
                      alert('Post Removed');
                      this.fetchPosts();
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