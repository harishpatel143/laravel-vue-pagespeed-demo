<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form class="form-horizontal" role="form">

                            <div class="form-group" :class="{'has-error' : errorsName}">
                                 <label for="name" class="col-md-4 control-label">Name </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" v-model="registerDetails.name" required autofocus>

                                    <span v-if="errorsName" class="help-block">
                                        <strong>{{emailName}}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group" :class="{'has-error' : errorsEmail}">
                                 <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" v-model="registerDetails.email" required autofocus>

                                    <span v-if="errorsEmail" class="help-block">
                                        <strong>{{emailError}}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group" :class="{'has-error' : errorsPassword}">
                                 <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="registerDetails.password" name="password" required>
                                    <span v-if="errorsPassword" class="help-block">
                                        <strong>{{passwordError}}</strong>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="form-group" :class="{'has-error' : errorsCoPassword}">
                                 <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" v-model="registerDetails.coPassword" name="password_confirmation" required>
                                    <span v-if="errorsCoPassword" class="help-block">
                                        <strong>{{passwordCoPassword}}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" @click.prevent="registerPost" class="btn btn-primary">
                                        Register
                                    </button>

                                    <a class="btn btn-link" href="">
                                        Forgot Your Password?
                                    </a>
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
    export default {
        data() {
            return{
                registerDetails: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    remember: true
                },
                errorsEmail: false,
                errorsName: false,
                errorsCoPassword: false,
                errorsPassword: false,
                emailError: null,
                nameError: null,
                passwordError: null
            }
        },
        methods: {
            registerPost() {
                let vm = this;
                axios.post('/register', vm.registerDetails)
                        .then(function (response) {
                            console.log(response);
                        })
                        .catch(function (error) {
                            var errors = error.response
                            if (errors.statusText === 'Unprocessable Entity') {
                                if (errors.data) {
                                    if (errors.data.email) {
                                        vm.errorsEmail = true
                                        vm.emailError = _.isArray(errors.data.email) ? errors.data.email[0] : errors.data.email
                                    }
                                    if (errors.data.password) {
                                        vm.errorsPassword = true
                                        vm.passwordError = _.isArray(errors.data.password) ? errors.data.password[0] : errors.data.password
                                    }
                                }
                            }
                        });
            }

        },
        mounted() {
        }
    }
</script>
