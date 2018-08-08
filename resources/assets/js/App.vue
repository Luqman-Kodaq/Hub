<template>
<div id="app" class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container">
            <ul class="navbar-nav" v-for="setting in settings" :key="setting.id">
                <a class="navlink navbar-brand"><router-link :to="{ name: 'Home' }" class="nav-link" style="cursor: pointer">{{ setting.site_name }}</router-link></a>
            </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav  ml-auto navRoutes">
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
                                <a class="navlink"><router-link :to="{ name: 'Login' }" class="nav-link" active-class="active" style="cursor: pointer" v-if="!isLoggedIn">Log In</router-link></a>
                            </li>
                            <li class="nav-item">
                                <a class="navlink"><router-link :to="{ name: 'Register' }" class="nav-link" active-class="active" style="cursor: pointer" v-if="!isLoggedIn">Sign Up</router-link></a>
                            </li>
                            <span v-if="isLoggedIn">
                                <ul class="navbar-nav ml-auto navLogs">
                                    <li class="nav-item">
                                        <a class="nav-link" v-if="user_type == 0">Hi {{ name }}</a> <span class="caret"></span>
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
        <main class="py-4">
        <router-view @loggedIn=change></router-view>
        </main>
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
    nav {
    opacity: 0.8;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    background: none;
    height: 50px;
    }
</style>