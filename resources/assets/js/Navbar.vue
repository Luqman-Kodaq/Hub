<template>
<div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container">
            <ul class="navbar-nav">
                <a class="navlink navbar-brand"><router-link :to="{ name: 'Home' }" class="nav-link" style="cursor: pointer"><b>{{ settings.site_name }}</b></router-link></a>
            </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav navRoutes">
                        <li class="nav-item">
                                <a class="navlink"><router-link :to="{ name: 'Home' }" class="nav-link" active-class="active" exact style="cursor: pointer">Home</router-link></a>
                        </li>
                        <li class="nav-item">
                               <a class="navlink"><router-link :to="{ name: 'Blogs' }" class="nav-link" active-class="active" style="cursor: pointer">Blog</router-link></a>
                        </li>                  
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto navLogs">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="navlink"><router-link :to="{ name: 'Login' }" class="nav-link" active-class="active" style="cursor: pointer">Log In</router-link></a>                            
                            </li>
                            <li class="nav-item">
                                <a class="navlink"><router-link :to="{ name: 'Register' }" class="nav-link" active-class="active" style="cursor: pointer">Sign Up</router-link></a>                            
                            </li>                           
                    </ul>
                </div>
            </div>
        </nav>
      </div>
</template>

<script>
    export default{
        data() {
            return {
                settings: []
            }
        },

         methods: {
                fetchSettings() {
                    axios.get('index')
                    .then(res => {
                    this.settings = res.data;
                    })
                    .catch(err => {
                    console.log(err);
                });
            }
        },

        created() {
        this.fetchSettings();
        }
}
</script>

<style scoped>
nav {
  opacity: 0.8;
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  background: none;
}

ul.navRoutes {
  margin-left: 18rem;
}

ul.navRoutes li {
  margin-left: 13px;
  margin-right: 10px;
}

li .navlink:hover {
  text-decoration: none;
}

ul.navLogs li .navlink {
  font-weight: bold;
}
</style>