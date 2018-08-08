<template>
  <div class="container dashboard">
    <h1>Hello Dashboard!</h1>
    <p>This is the Dashboard page</p>
        <Sidebar/>
  </div>
</template>

<script>
import Sidebar from './Sidebar'
  export default {
    name: 'Dashboard',
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
    .dashboard {
      margin-left: 5rem;
    }
</style>