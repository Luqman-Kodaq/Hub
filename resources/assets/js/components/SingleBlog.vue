<template>
<div class="container">
    <h5>Hello Post</h5>
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
      fetchSingle(slug) {
        axios.get("post/"+slug)
          .then(res => {
          console.log(res.data);
          })
          .catch(err => {
          console.log(err);
      });
      }
  },

  created: function(){
    this.fetchSingle(this.$route.params.slug);
  }
}
</script>