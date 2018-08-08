<template>
  <div class="container">    
        <Sidebar/>
        <div>            
            <p>Hello there!!!</p>
        </div>
        <!-- <router-view></router-view> -->
  </div>
</template>

<script>
import Sidebar from './components/Admin/Sidebar'
  export default {
    name: 'Admin',
      components: {
          Sidebar
      },
        data() {
                return {
                   
                }
            }    
  }
</script>