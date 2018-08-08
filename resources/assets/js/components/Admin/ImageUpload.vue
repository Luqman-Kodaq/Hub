<template>
  <input type="file" name="file" id="file" accept="image/*" @change="attachPhoto">
</template>

<script>
  export default {
    methods: {
      attachPhoto(e) {
      if (!e.target.files.length) return;

      let file = e.target.files[0];

      let reader = new FileReader();

      reader.readAsDataURL(file);

      reader.onload = e => {
        let src = e.target.result;

        this.$emit('loaded', { src, file });
      };
    }
    }
  }
</script>
