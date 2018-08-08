<template>
  <div class="container settings">
    <h1>Hello Settings</h1>
    <p>This is the Settings page</p>
    <Sidebar/>
  </div>
</template>

<script>
import Sidebar from './Sidebar'
  export default {
    name: 'Settings',
    components: {
        Sidebar
    },
    data() {
                return {
                    
                }
            }
  }
</script>
<style scoped>
    .settings {
      margin-left: 5rem;
    }
</style>
