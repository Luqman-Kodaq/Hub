<style scoped>
  .slug-widget {
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }
</style>

<template>
  <div class="slug-widget">
    <div class="icon-wrapper">
      <i class="fa fa-link"></i>
    </div>
    <div class="url-wrapper">
      <span class="root-url">http://mainurl.com</span
      ><span class="subdirectory-url">/blog/</span
      ><span class="slug">coolest-post-ever</span>
    </div>

    <div class="button-wrapper">
      <button class="save-slug-button btn btn-sm btn-outline-success">Save</button>
    </div>
  </div>
</template>

<script>
      export default {
        
      }
</script>