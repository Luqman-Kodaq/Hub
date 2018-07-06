<template>
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Front End Component</div>

                    <div class="card-body">
                       <div v-for="post in posts">
                                <li>{{ post.id }}</li>
                                <li>{{ post.title }}</li>
                                <li>{{ post.contents }}</li>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
      data() {
          return{
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
              pagination: {}
          }
      },
      created() {
          this.fetchAllPosts();
      },
      methods: {
          fetchAllPosts() {
              axios.get('http://127.0.0.1:8000/posts')
              .then((res) => {
                  console.log(res.data);
              })
              .catch((err) => {
                  console.log(err);
              });
          }
      }

  }
</script>