<template>
<div>
    <!-- Showcase $ Nav -->
<header id="home-section">
    <div class="dark-overlay">
        <div class="home-inner">
                <h1>Content Lounge</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut eius molestiae nobis doloribus qui veniam!</p>
                <a class="btn btn-outline-secondary">Explore</a>
        </div>
    </div>
</header>

    <!-- Post Section -->
    <section id="post-section" class="bg-light text-muted py-5">
        <div class="container">
            <div class="row">
            <div class="col text-center">
                <div class="py-3">
                <h2 class="post-section-head display-4">Latest Post</h2>
                <div class="col-md-10 post-card">
                <div class="card my-3" v-for="post in posts" :key="post.id">
                <div class="card-body d-flex flex-row">
                    <div class="col-md-6 align-self-start image-div">
                        <img :src="post.image" :alt="post.title" class="img-fluid image">
                    </div>
                    <div class="col-md-4 align-self-start title-div">
                        <h2 class="card-title">{{ post.title }}</h2>
                        <div class="post_author d-flex flex-row">
                            <div class="align-self-start p-2">
                            <img class="author_image" :src="post.user_id.profile_photo" :alt="post.user_id.name">
                            </div>
                            <div class="author_content align-self-start p-2">
                                <h5 class="author_name">{{ post.user_id.name }}</h5>
                                <small class="text-muted published">published {{ post.created_at }}</small>
                            </div>
                        </div>
                        <div class="post_excerpt">
                            <h3 class="excerpt-title display-5"><i>"{{ post.excerpt }}"</i></h3>
                        </div>
                        <div class="post_content">
                            <p class="content-paragraph lead">{{ post.contents }}...</p>
                        </div>
                        <div class="btn-div">
                        <router-link :to="{name: 'SingleBlog', params: {id: post.id}}"><a class="btn btn-outline-secondary btn-sm button">Read More</a></router-link>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section id="contents" class="bg-light text-muted py-5">
        <div class="container">
            <div class="row">
            <div class="col text-center">
            <div class="py-3">
            <h3 class="contents-section display-5">Not just contents, but Quality. Nourished contents enhances the cognition.</h3>
            <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati delectus aspernatur ipsam harum beatae! Natus dignissimos totam cumque aliquam enim, laboriosam iure quis in tenetur expedita fuga saepe voluptate quisquam porro molestias deleniti? Quia soluta vel impedit sint voluptas, earum reiciendis sed placeat velit! Nihil quaerat ex similique accusantium delectus.</p>
        </div>
        </div>
        </div>
        </div>
    </section>

    <!-- Footer -->
</div>
</template>

<script>
   export default{
        data() {
            return {
                posts: [],
                users: []
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
                  vm.posts = res.data.data;
                //   vm.user = res.data.user_id
                //   console.log(this.posts.user);
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
    #home-section {
        background: url('/uploads/img/adventure-backpack-blue-mountains.jpg') no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .home-inner {        
        align-items: center;
        text-align: center;
    }

    .card-body {
        margin: 0px;
        padding: 0px;
        width: 59rem;
        height: 23rem;
    }

    .image {
        height: 21rem;
        width: 30rem;
    }

    .image-div {
        margin: 0;
        padding: 0;
    }

    .title-div {
        margin-left: 5rem;
        padding: 0;
        height: 20rem;
        /* width: 40rem; */
    }

    .card {
        height: 21rem;
        box-shadow: 1px 1px #666666;
    }

    .post-card {
        margin-left: 6rem;
    }

    .author_image {
        border-radius: 50px;
        margin: 0;
        padding: 0;
    }

    h5.author_name {
        text-align: left;
    }

    small.published {
        font-style: italic;
    }

    .btn-div a {
        color: #343a40;
    }

    .btn-div a:hover {
        background: none;
    }

    section#contents {
        background: url('/uploads/img/books-clock-contemporary.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 10rem 0;
        /* color: black; */
    }
</style>
