<template>
  <div>
    <aside class="admin-sidebar">
      <section class="section">
        <ul>
            <li class="header">MAIN NAVIGATION</li>
              <li class="navlink"><router-link :to="{ name: 'Dashboard' }" class="nav-link" active-class="active" style="cursor: pointer">Dashboard</router-link></li>
               <li href="#collapse-users" data-toggle="collapse" aria-controls="collapse-pages" class="navlink"  style="cursor: pointer">User Management</li>
              <ul class="collapse collapseable" id="collapse-users">
                      <li class="navlink"><router-link :to="{ name: 'User' }" class="nav-link" active-class="active" style="cursor: pointer">List User</router-link></li>
                      <li class="navlink"><router-link :to="{ name: 'AddUser' }" class="nav-link" active-class="active" style="cursor: pointer">Add User</router-link></li>
              </ul>
              <li href="#collapse-posts" data-toggle="collapse" aria-controls="collapse-pages" class="navlink"  style="cursor: pointer">Post Management</li>
              <ul class="collapse collapseable" id="collapse-posts">
                  <li class="navlink"><router-link :to="{ name: 'AddPost' }" class="nav-link" active-class="active" style="cursor: pointer">Add Post</router-link></li>
                  <li class="navlink"><router-link :to="{ name: 'Post' }" class="nav-link" active-class="active" style="cursor: pointer">List Post</router-link></li>
              </ul>
              <li href="#collapse-category" data-toggle="collapse" aria-controls="collapse-pages" class="navlink"  style="cursor: pointer">Category Management</li>
              <ul class="collapse collapseable" id="collapse-category">
                  <li class="navlink"><router-link :to="{ name: 'AddCategory' }" class="nav-link" active-class="active" style="cursor: pointer">Add Category</router-link></li>
                  <li class="navlink"><router-link :to="{ name: 'Category' }" class="nav-link" active-class="active" style="cursor: pointer">List Category</router-link></li>
              </ul>
              <li href="#collapse-tags" data-toggle="collapse" aria-controls="collapse-pages" class="navlink"  style="cursor: pointer">Tag Management</li>
              <ul class="collapse collapseable" id="collapse-tags">
                  <li class="navlink"><router-link :to="{ name: 'AddTag' }" class="nav-link" active-class="active" style="cursor: pointer">Add Tag</router-link></li>
                  <li class="navlink"><router-link :to="{ name: 'Tag' }" class="nav-link" active-class="active" style="cursor: pointer">List Tag</router-link></li>
              </ul>
               <li class="navlink"><router-link :to="{ name: 'Profile' }" class="nav-link" active-class="active" style="cursor: pointer">My Account</router-link></li>
                <li class="navlink"><router-link :to="{ name: 'Settings' }" class="nav-link" active-class="active" style="cursor: pointer">System Settings</router-link></li>
        </ul>
      </section>
    </aside>
  </div>
</template>

<script>
  export default {
    name: 'Sidebar',
    data() {
                return {
                    user: null
                }
            },

    methods: {}
  }
</script>
