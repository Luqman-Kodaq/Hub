<template>
<div class="container">
    <div class="card">
      <div class="image">
         <img class="post_image" :src="post.image" :alt="post.title">
      </div>
      <div class="post_content">
        <div class="col-md-9">
          <header class="post_header">
            <h1 class="post_title">{{ post.title }}</h1>
          </header>
          <p><i>"{{ post.excerpt }}"</i></p>
          <p>{{ post.contents }}</p>
        </div>
      </div>
      <div class="post_footer">
        <div class="post_author">
          <img class="author_image" :src="user.profile_photo" :alt="user.name">
          <div class="author_content">
            <h4 class="author_name">
              "by "
              <a class="label">{{ user.name }}</a>
            </h4>
          </div>
        </div>
      </div>
    </div>
</div>
</template>

<script>
export default {
  data(){
    return {
        post: '',
        user: '',
    }
  },

  methods: {
      fetchSingle(id) {
        axios.get(`/api/manage/posts/${id}`)
          .then(res => {
          let data = res.data;
          this.post = data;
          this.user = data.user_id
          console.log(this.user);
          })
          .catch((err) => this.errors = err.response.data.errors);
      }
  },

  mounted() {
    this.fetchSingle(this.$route.params.id);
  }
}
</script>
<style scoped>
  /* .card{
    height: 
    width: 1110px;
    background:  rgb(42, 42, 42);
  } */
  .image{
    /* display: block; */
    color: rgb(42, 42, 42);
    font-size: 16px;
    /* -ms-text-size-adjust: 100%; */
  }

  .post_image {
    /* display: block; */
    font-size: 16px;
    color: rgb(42, 42, 42);
    /* border-image-repeat: stretch; */
    /* border-image-slice: 100%; */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 40rem;
    width: 67.4rem;
  }

  .post_content {
    display: block;
    font-size: 20px;
    padding: 100px 90px 90px 100px;
  }

  .post_header {
    display: block;
    color: rgb(82, 82, 82);
    font-size: 20px;
    line-height: 30px;
  }

  .post_title {
    display: block;
    font-size: 60px;
    margin: 0px 0px 20px 0px;
  }

  p {
    color: rgb(82, 82, 82);
    display: block;
    font-size: 20px;
    margin: 0px 30px;
    padding: 30px 0px 0px 0px;
  }

  .post_footer {
    align-items: flex-end;
    color: rgb(42, 42, 42);
    display: flex;
    flex-wrap: wrap;
    font-size: 16px;
    justify-content: space-between;
    padding: 45px 85px 45px 85px;
  }

  .post_author {
    display: block;
    color: rgb(197, 197, 197);
    font-size: 13px;
    margin: 5px 5px 5px 5px;
  }

  .author_image {
    border-radius: 50px;
  }

  .label {
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    display: inline;
    background-color: rgba(0, 0, 0, 0)
  }
</style>
