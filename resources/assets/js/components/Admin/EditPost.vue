<template>
  <div class="container user">
     <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Post
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link :to="{ name: 'Dashboard' }"><i class="fa fa-dashboard"> Home</i></router-link></li>
            <li class="breadcrumb-item"><router-link :to="{ name: 'Post' }">Post</router-link></li>
            <li class="breadcrumb-item active pull-right">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Edit Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form @submit.prevent="updatePost">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" placeholder="Post Title" v-model="post.title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                  <div class="col-md-12 col-xm-12">
                                      <div class="form-group">
                                          <textarea name="excerpt" id="excerpt" rows="3" class="form-control" placeholder="Excerpt..." v-model="post.excerpt"></textarea>
                                      </div>
                                  </div>
                                  <div class="col-md-12 col-xm-12">
                                        <div class="form-group">
                                            <image-upload name="image" class="form-control" @loaded="onload"></image-upload>
                                        </div>
                                  </div>
                                  <div class="col-md-12 col-xm-12">
                                    <div class="form-group">
                                    <select name="category_id" data-placeholder="Select category..." id="category" class="form-control" v-model="post.category_id">
                                      <option v-for="category in categories" v-bind:key="category.id" :value="category.id">{{ category.name }}</option>
                                    </select>
                                  </div>
                                </div>                    
                                <div class="col-md-12 col-xm-12">
                                    <div class="form-group">
                                    <select name="tags[]" class="form-control select2-multi" data-placeholder="Select tag..." v-model="post.tag">
                                      <option v-for="tag in tags" v-bind:key="tag.id">{{ tag.name }}</option>
                                    </select>
                                  </div>
                                </div>
                                  <div class="col-md-12 col-xm-12">
                                      <div class="form-group">
                                          <textarea name="contents" id="contents" class="form-control" cols="30" rows="20" placeholder="Compose your piece..." v-model="post.contents"></textarea>
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
            <div class="col-md-3 col-xs-12">
                      <div class="card" style="border-radius: 5%">
                        <img class="card-img-top" :src=user.profile_photo :alt=user.name style="border-radius: 5%">
                        <span class="hidden-xs"></span>
                        <div class="caption form-group">
                        <div class="form-group text-center">
                          <h3><strong>{{ user.name }}</strong></h3>
                          <p>{{ user.profile }}</p>
                        </div>
                        <div class="form-group">
                          <router-link :to="{ name: 'Post' }" class="btn btn-sm btn-outline-info btn-block pull-right"><span class="fa fa-arrow-left"></span> Cancel</router-link>
                        </div>
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
import ImageUpload from './ImageUpload.vue';
import Sidebar from './Sidebar'
export default {
  name: 'EditUser',
  components: {
    Sidebar,
    ImageUpload
  },

  data() {
    return {
        post: {},
        user: {},
        errors: {},
        categories: [],
        tags: [],
        user_id: ''
    }
  },

    methods: {
      fetchPost(id) {
      axios.get(`/api/manage/posts/${id}`)
      .then(res => {
        let data = res.data;
        this.post = data;
      })
      .catch((err) => this.errors = err.response.data.errors);
    },

      updatePost(e) {
          let updPost = {
            title: this.post.title,
            excerpt: this.post.excerpt,
            image: this.post.image,
            category_id: this.post.category_id,
            user_id: this.post.user_id,
            tag: this.post.tag,
            contents: this.post.contents
          }
          console.log(updPost);
          axios.put('/api/manage/posts/'+this.$route.params.id, updPost)
          .then(res => {
            console.log(res.data);
            this.$router.push('/admin/posts')
          })
          .catch((err) => this.errors = err.response.data.errors)
      },

        onload(image) {
            this.addPost.image = image.src;

            this.persist(image.file);
        },

        persist(image) {
            let data = new FormData();

            data.append('image', image);

            let headers = {'Content-Type': 'multipart/form-data'}

            axios.post('/api/upload-photo', data, {headers})
            .then(res => {
              this.addPost.image = res.data;
              console.log(this.addPost.image);
            })
            .catch((err) => this.errors = err.response.data.errors)
        },

        fetchCategory() {
              axios.get('/api/manage/categories/')
              .then(res => {
                let data = res.data;
                this.categories = data;
              })
              .catch((err) => this.errors = err.response.data.errors);
            },

        fetchTag() {
          axios.get('/api/manage/tags/')
          .then(res => {
            let data = res.data;
            this.tags = data;
          })
          .catch((err) => this.errors = err.response.data.errors);
        },

        fetchUsers() {
                let user = JSON.parse(localStorage.getItem('credentials'));
                let id = user.data.credentials.id;
                axios.get(`/api/manage/users/${id}`)
                .then(res => {
                    this.user = res.data;
                    this.user_id = res.data.id;
                  console.log(this.user_id);
                  console.log(this.user);
                })
                .catch((err) => this.errors = err.response.data.errors);
              },
    },

    mounted() {
      this.fetchPost(this.$route.params.id);
      this.fetchUsers();
      this.fetchCategory();
      this.fetchTag();
    }
  }
</script>
<style scoped>
    .user {
      margin-left: 5rem;
    }
</style>