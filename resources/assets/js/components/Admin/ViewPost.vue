<template>
  <div class="container user">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Post
            <small>Directory</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'Post' }">Post</router-link></li>
            <li class="breadcrumb-item active pull-right">View</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="col-xs 12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Post Directory</h3>
              <div class="card-header-pills pull-right">
                 <router-link :to="'/admin/post/edit/'+post.id" class="btn btn-outline-secondary btn-sm"><span class="fa fa-pencil"></span> Edit Post</router-link>
              </div>
              <!-- <div class="form-group">
                        <a href="{{ route('post.publish', ['id' => $post->id]) }}" class="btn btn-default" type="submit" role="button" name="published" value="1"><i class="fa fa-check"></i> Publish</a>
              </div> -->
              <!-- <div class="form-group">
                <a href="{{ route('post.publish', ['id' => $post->id]) }}" class="btn btn-success" type="submit" role="button" disabled><i class="fa fa-check"></i> Published</a>
              </div> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Media -->
              <div class="media">               
                <div class="media-body">
                  <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-1 col-xm-12">
                       <div>
                        <img :src="post.image" :alt="post.name" width="800" height="800" style="border-radius: 25px">
                      </div>
                        <hr>
                        <!-- <p><strong> Published: {{ post.created_at }}</strong> </p> -->
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1 col-xm-12">
                          <h1>{{ post.title }}</h1>
                          <hr>
                          <i>"{{ post.excerpt }}"</i>
                          <hr>
                          <p>{{ post.contents }}</p>
                          <hr>
                          <p>Category: {{ post.category }}</p>
                        <div class="tags">
                              <span class="label label-default">{{ post.tag }}</span>
                        </div>                       
                      </div>
                    </div>
                </div>
              </div>
              </div>
              <!-- /.Media -->
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
    name: 'ViewPost',
    components: {
      Sidebar
    },
    data() {
                return {
                    post: ''
            }
    },
            methods: {
              fetchPost(id) {
              axios.get(`/api/manage/posts/${id}`)
              .then(res => {
                let data = res.data;
                this.post = data;
                // console.log(res.data);
              })
              .catch((err) => this.errors = err.response.data.errors);
            }
            },

              mounted() {
                    this.fetchPost(this.$route.params.id);
                  }
  }
</script>
<style scoped>
    .user {
      margin-left: 5rem;
    }
</style>