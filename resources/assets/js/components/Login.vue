<template>
<div class="container" id="loginContainer">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2 col-xs-12">
            <div class="card" id="loginCard">
                <div class="loginText">LOG IN</div>
                <hr>

                <div class="card-body">
                    <form>
                    <div class="form-group row">
                        <div class="col-md-12 col-xm-12">
                          <div id="inputEmail" class="form-group">
                                <input id="email" type="email" class="form-control form-control-lg" name="email" v-model="userData.email" required autofocus>
                            <label id="input-label" for="email">Enter Email</label>
                                <div id="inputProgressEmail"></div>                                   
                         </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div id="inputPassword" class="form-group">
                                <input id="password" type="password" class="form-control form-control-lg" name="password" v-model.lazy="userData.password" required>
                                <label id="input-label" for="password">Password</label>
                                <div id="inputProgressPassword"></div>                                
                        </div>
                        </div>
                        </div>

                        <div class="form-group row">
                                <div class="col-md-6 col-xm-12">
                                <div class="checkbox">
                                    <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="remember ml-2" name="remember" >Remember Me
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-12 col-xm-12">
                                    <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg" id="btn">LOG IN</button>
                                <a class="btn btn-link text-muted" id="checkbox">
                                    Forgot Your Password?
                                </a>
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
                userData: {
                    email: '',
                    password: ''
                }
            }
        }
    }
</script>