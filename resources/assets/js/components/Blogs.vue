<template>
<div>
      <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
            <h2 class="title">Welcome to Content Lounge</h2>
        </div>
        <div class="container">
                <!-- <div class="col-md-12"> -->
                    <div class="row">
                            <!-- Card -->
                            <div  class="col-md-4" v-for="post in posts" :key="post.id">
                                <router-link :to="{name: 'SingleBlog', params: {id: post.id}}">
                                        <!-- Card image -->
                                        <img class="card-img-top" :src="post.image" :alt="post.title">

                                        <!-- Card content -->
                                        <div class="card-img-overlay">

                                            <!-- Title -->
                                            <h4 class="card-title"><a>{{post.title}}</a></h4>
                                            <!-- Text -->
                                            <p class="card-text">{{ post.excerpt }}</p>
                                            <!-- Button -->
                                            <a class="btn btn-outline-secondary btn-sm showcaseBtn">Explore</a>

                                        </div>
                                </router-link>

                            </div>
                    </div>
                <!-- </div> -->
        </div>
</div>
<!-- Card -->
</template>

 <script>
    export default{
        data() {
            return {
                posts: []
            }
        },
        
        mounted() {
            this.fetchPosts();
        },
        
         methods: {
              fetchPosts(page_url) {
                let vm = this;
                page_url = page_url || '/api/manage/posts'
                axios.get(page_url)
                .then(res => {
                  this.posts = res.data.data;
                  console.log(res.data.meta);
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
              }
            }
    }
</script>
<style scoped>
    .tiles {
        height: 10rem;
        width: 5rem;
    }
</style>
