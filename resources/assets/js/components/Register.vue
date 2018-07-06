<template>
<div class="container" id="registerContainer">
    <div class="row justify-content-center">
            <div class="col-md-12 col-md-offset-2 col-xs-12">
            <div class="card" id="registerCard">
                <div class="loginText">REGISTER</div>
                <hr>

                <div class="card-body">
                    <form>
                          <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div class="form-group" id="inputRegisterName">
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                            <label id="inputRegisterNameLabel" for="name">Name</label>
                            <div id="inputRegisterProgress"></div>                                
                        </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div id="inputRegisterEmail" class="form-group">
                            <input id="email" type="email" class="form-control" name="email"  required>
                            <label id="inputRegisterEmailLabel" for="email">E-Mail Address</label>
                            <div id="inputRegisterProgressEmail"></div>                                
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xm-12">
                           <div class="form-group" id="genderDiv">
                            <label for="gender" class="control-label"><strong>Gender</strong></label>
                            <div class="form-group">
                            <input type="radio" id="male" value="Male" v-model="radioBoxOption"><strong> Male</strong>
                            </div>
                            <div class="form-group">
                            <input type="radio" id="female" value="Female" v-model="radioBoxOption"><strong> Female</strong>
                            </div>                              
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                                <div id="inputRegisterPassword" class="form-group">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label id="inputRegisterPasswordLabel" for="password">Password</label>
                                    <div id="inputRegisterProgressPassword"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                             <div id="inputRegisterConfirm" class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>                                
                            <label id="inputRegisterConfirmLabel" for="password-confirm">Confirm Password</label>
                            <div id="inputRegisterProgressConfirm"></div>
                                </div>
                            </div>
                        </div>

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
                radioBoxOption: 'Male'
            }
        }
    }
</script>