<template>
  <div class="container profile">
    <h1>Hello Profile</h1>
    <p>This is the Profile page</p>
    <Sidebar/>
  </div>
</template>

<script>
import Sidebar from './Sidebar'
  export default {
    name: 'Profile',
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
    .profile {
      margin-left: 5rem;
    }
</style>