<template>
<div class="container">
    <h5>{{ post.title }}</h5>
    <img class="card-img-top" :src="post.image" :alt="post.title">
</div>
</template>

<script>
export default {
  data(){
    return {
        post: ''
    }
  },

  methods: {
      fetchSingle(id) {
        axios.get("shows/"+id)
          .then(res => {
          this.post = res.data;
          })
          .catch(err => {
          console.log(err);
      });
      }
  },

  created: function(){
    this.fetchSingle(this.$route.params.id);
  }
}
</script>