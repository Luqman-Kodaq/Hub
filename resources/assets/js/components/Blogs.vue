<template>
<div>
      <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
            <h2 class="title">Welcome to Content Lounge</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                            <!-- Card -->
                            <div  class="col-md-4 card" v-for="post in posts" :key="post.id">
                                <router-link :to="{name: 'SingleBlog', params: {id: post.id}}">
                                        <!-- Card image -->
                                        <img class="card-img-top" :src="post.image" :alt="post.title">

                                        <!-- Card content -->
                                        <div class="card-img-overlay">

                                            <!-- Title -->
                                            <h4 class="card-title"><a>{{post.title}}</a></h4>
                                            <!-- Text -->
                                            <p class="card-text"></p>
                                            <!-- Button -->
                                            <a href="#" class="btn btn-primary">Button</a>

                                        </div>
                                </router-link>

                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Card -->
</template>

//  <script>
//     export default{
//         data() {
//             return {
//                 posts: []
//             }
//         },
        
//         mounted() {
//                 axios.get("posts")
//                     .then(res => {
//                     this.posts = res.data;
//                     })
//                     .catch(err => {
//                     console.log(err);
//                 });
//         }
//     }
// </script>