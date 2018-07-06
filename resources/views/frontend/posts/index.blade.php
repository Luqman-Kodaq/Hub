@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2 col-xs-12">
            <!-- Card -->
              <div v-for="post in posts" :key="post.id" class="card card-image mb-3" style="background-image: @{{ asset('uploads/post_photo/' .  post.image) }}">

                  <!-- Content -->
                  <div class="text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                      <div>
                          <h5 class="pink-text"><i class="fa fa-pie-chart"></i> @{{ post.title }}</h5>
                          <h3 class="card-title pt-2"><strong>@{{ post.excerpt }}</strong></h3>
                          <p>@{{ post.contents }}</p>
                          <a class="btn btn-outline-primary"><i class="fa fa-clone left"></i> Read More</a>
                      </div>
                  </div>
                  <!-- Content -->
              </div>
              <!-- Card -->
      </div>
    </div>
</div>
@endsection
@section('vue')
    <script>
        var app = new Vue({
          el: '#root',
          data() {
            return {
          posts: [],
              post: {
                  id: '',
                  slug: '',
                  title: '',
                  excerpt: '',
                  contents: '',
                  published: '',
                  image: '',
                  like: '',
                  dislike: '',
                  category_id: '',
                  user_id: '',
                  },
            }
          },
           created() {
              this.fetchPosts();
              },
              methods: {
                fetchPosts() {
                 axios.get('/posts')
                  .then((res) => {
                      this.posts = res.data;
                  })
                  .catch((err) => {
                        console.log(err);
                  });
                }
              }
      });
    </script>
@endsection