<template>
<div id="app">
    <!-- <div id="dark-overlay"> -->
    <nav id="dark-overlay" class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container" v-for="setting in settings" :key="setting.id">
            <!-- <ul class="navbar-nav" v-for="setting in settings" :key="setting.id"> -->
                <router-link :to="{ name: 'Home' }" active-class="active" exact><a class="navbar-brand nav-link">{{ setting.site_name }}</a></router-link>
            <!-- </ul> -->
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav  ml-auto">
                        <li class="nav-item">
                                <router-link :to="{ name: 'Home' }" active-class="active" exact style="cursor: pointer"><a>Home</a></router-link>
                        </li>
                        <li class="nav-item">
                               <router-link :to="{ name: 'Blogs' }" active-class="active" style="cursor: pointer"><a>Blog</a></router-link>
                        </li>          
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <router-link :to="{ name: 'Login' }" active-class="active" style="cursor: pointer" v-if="!isLoggedIn"><a>Log In</a></router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{ name: 'Register' }" active-class="active" style="cursor: pointer" v-if="!isLoggedIn"><a>Sign Up</a></router-link>
                            </li>
                            <span v-if="isLoggedIn">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a v-if="user_type == 0">Hi {{ name }}</a> <span class="caret"></span>
                                        <a class="nav-link" v-if="user_type == 1">{{ name }}</a> <span class="caret"></span>
                                    </li>
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="cursor: pointer" v-if="isLoggedIn" @click="logout"> Logout</a>

                                    <form id="logout-form" style="display: none;">
                                    </form>
                                </div>
                            </li>
                            </ul>
                            </span>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- </div> -->
        <router-view @loggedIn=change></router-view>
</div>
</template>

<script>
   export default{
        data() {
            return {
                settings: [],
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('credentials') != null
            }
        },

         methods: {
                fetchSettings() {
                    axios.get('/api/manage/settings')
                    .then(res => {
                    this.settings = res.data;
                    })
                    .catch(err => {
                    console.log(err);
                });
            },

                setDefaults() {
                        let user = JSON.parse(localStorage.getItem('credentials'))
                    if (this.isLoggedIn) {
                        this.name = user.data.credentials.name
                    }
                },

                change() {
                    this.isLoggedIn = localStorage.getItem('credentials') != null;
                    this.setDefaults();
                },

                logout() {
                    localStorage.removeItem('credentials');
                    this.change();
                    this.$router.push('/login');
                }
        },

        mounted() {
        this.fetchSettings();
        this.setDefaults();
        }
}
</script>

<style scoped>

</style>