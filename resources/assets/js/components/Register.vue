<template>
<div class="container" id="registerContainer">
    <div class="row justify-content-center">
            <div class="col-md-12 col-md-offset-2 col-xs-12">
            <div class="card" id="registerCard">
                <div class="loginText">REGISTER</div>
                <hr>

                <div class="card-body">
                    <form @submit.prevent="registerUser">
                          <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div class="form-group" id="inputRegisterName">
                            <input id="name" type="text" class="form-control" v-model="register.name" name="name" autofocus>
                            <label id="inputRegisterNameLabel" for="name">Name</label>
                            <div id="inputRegisterProgress"></div>
                            <small v-if="errors.name" class="text-danger">{{ errors.name[0] }}</small>
                        </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div id="inputRegisterEmail" class="form-group">
                            <input id="email" type="email" class="form-control" v-model="register.email" name="email">
                            <label id="inputRegisterEmailLabel" for="email">E-Mail Address</label>
                            <div id="inputRegisterProgressEmail"></div>
                            <small v-if="errors.email" class="text-danger">{{ errors.email[0] }}</small>
                            </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                                <div id="inputRegisterPassword" class="form-group">
                                <input id="password" type="password" class="form-control" v-model="register.password" name="password">
                                <label id="inputRegisterPasswordLabel" for="password">Password</label>
                                    <div id="inputRegisterProgressPassword"></div>
                            <small v-if="errors.password" class="text-danger">{{ errors.password[0] }}</small>
                                </div>
                            </div>
                        </div>


                         <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                             <div id="inputRegisterConfirm" class="form-group">
                                <input id="password-confirm" type="password" class="form-control" v-model="register.password_confirmation" name="password_confirmation">
                            <label id="inputRegisterConfirmLabel" for="password-confirm">Confirm Password</label>
                            <div id="inputRegisterProgressConfirm"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-xm-12">
                           <div class="form-group row">
                            <div class="col-md-12">
                            <select name="gender"
                            class="form-control select" v-model="register.gender">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                            </div>
                        </div>
                        </div>                       

                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-xm-12">
                               <div class="form-group">
                                <button type="submit" class="btn btn-outline-secondary btn-lg btn-block">
                                    REGISTER
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default{
        props: ['nextUrl'],
        data() {
            return {
                register: {
                    name: "",
                    email: "",                    
                    password: "",
                    password_confirmation: "",
                    gender: "1"
                },
                errors: {}
            }
        },

        methods: {
            registerUser() {
                // if (this.register.password !== this.register.password_confirmation || this.register.password.length <= 0) {
                //     this.register.password = ""
                //     this.register.password_confirmation = ""
                //     return alert('Passwords do not match');
                // }
                axios.post('api/register', this.register)
                .then(res => {
                    let data = res.data;
                    localStorage.setItem('credentials', JSON.stringify(data.data));
                        this.$emit('loggedIn')
                        let nextUrl = this.$route.params.nextUrl;
                        this.$router.push((nextUrl != null ? nextUrl : '/'))
                    console.log(data);
                })
                .catch((error) => this.errors = error.response.data.errors)
            }
        }
    }
</script>