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
                            <input id="name" type="text" class="form-control" v-model="register.name" name="name" required autofocus>
                            <label id="inputRegisterNameLabel" for="name">Name</label>
                            <div id="inputRegisterProgress"></div>                                
                        </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div id="inputRegisterEmail" class="form-group">
                            <input id="email" type="email" class="form-control" v-model="register.email" name="email"  required>
                            <label id="inputRegisterEmailLabel" for="email">E-Mail Address</label>
                            <div id="inputRegisterProgressEmail"></div>                                
                            </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                                <div id="inputRegisterPassword" class="form-group">
                                <input id="password" type="password" class="form-control" v-model="register.password" name="password" required>
                                <label id="inputRegisterPasswordLabel" for="password">Password</label>
                                    <div id="inputRegisterProgressPassword"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xm-12">
                           <div class="form-group row">
                            <div class="col-md-6">
                            <select name="gender"
                            class="form-control select" v-model="register.gender">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                            </div>
                        </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                             <div id="inputRegisterConfirm" class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>                                
                            <label id="inputRegisterConfirmLabel" for="password-confirm">Confirm Password</label>
                            <div id="inputRegisterProgressConfirm"></div>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-xm-12">
                               <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block">
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
        data() {
            return {
                register: {
                    name: "",
                    email: "",                    
                    password: "",
                    gender: "1"
                }
            }
        },

        methods: {
            registerUser() {
                axios.post('api/register', this.register)
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error.response);
                });
            }
        }
    }
</script>