<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-holder">
                <div class="card">
                     <ValidationObserver ref="observer" v-slot="{ handleSubmit }" tag="form" @submit.prevent>
                        <div class="card-body card-login">
                            <div class="d-flex justify-content-between flex-column">
                                <div class="login-header">
                                    <span class="login-text">Registration Form</span>
                                </div>
                                <div class="login-body">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="firstname">First Name</label>
                                            <ValidationProvider rules="required" v-slot="{errors}">
                                                <input name="firstname" v-model="userInfo.firstName"  type="text" class="form-control" />
                                                <span class="error-input">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastname">Last Name</label>
                                            <ValidationProvider rules="required" v-slot="{errors}">
                                                <input name="lastname" v-model="userInfo.lastName"  type="text" class="form-control" />
                                                <span class="error-input">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtEmail">E-mail</label>
                                        <ValidationProvider rules="required|email" v-slot="{errors}">
                                            <input id="txtEmail" name="E-mail" v-model="userInfo.email"  type="text" class="form-control" />
                                            <span class="error-input">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact No.</label>
                                        <ValidationProvider rules="required|numeric" v-slot="{errors}">
                                            <input name="Contact No" v-model="userInfo.contactNo"  type="text" class="form-control"  />
                                            <span class="error-input">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <ValidationProvider rules="required|min:6" v-slot="{errors}">
                                            <input name="Password" type="password" v-model="userInfo.password" class="form-control" />
                                            <span class="error-input">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="login-footer">
                                    <button @click="handleSubmit(onRegister)" class="btn btn-primary login-button">REGISTER</button>
                                </div>
                            </div>
                        </div>                    
                    </ValidationObserver>
                </div>
            </div>
        </div>
            <div>
            <b-modal ref="my-modal" hide-footer title="User Registration Info">
            <div class="d-block text-center">
                <h5>Confirm Registration Info</h5>
            </div>
            <hr>
            <div class="registration-info">
                <div class="form-group">                        
                    <label>First Name</label>
                    <input type="text" v-model="confirmInfo.firstName" class="form-control" disabled="true" >
                </div>
                <div class="form-group">                        
                    <label>Last Name</label>
                    <input type="text" v-model="confirmInfo.lastName" class="form-control" disabled="true" >
                </div>
                <div class="form-group">                        
                    <label>E-mail Address</label>
                    <input type="text" v-model="confirmInfo.email" class="form-control" disabled="true" >
                </div>
                <div class="form-group">                        
                    <label>Contact No</label>
                    <input type="text" v-model="confirmInfo.contactNo" class="form-control" disabled="true" >
                </div>
            </div>
            <div class="modal-footer">
                <router-link to="success" class="col-md-12"> <button class="btn btn-primary col-md-12">Continue</button></router-link>
            </div>
            </b-modal>
        </div>
    </div>
</template>

<script>
    import { ValidationObserver, ValidationProvider, extend } from 'vee-validate'; 
    import { required, email, min, numeric } from 'vee-validate/dist/rules';
    import { BModal, VBModal  } from 'bootstrap-vue';

    extend('email', email);
    extend('numeric', numeric);

    extend('min', {
        validate(value, args) {
            return value.length >= args.length
        },
        params: ['length'],
        message: 'Password must contain at least 6 characters'
    })

    extend('required', {
        ...required,
        message: 'This field is required'
    })

    export default {
        components: {
           ValidationObserver, ValidationProvider, BModal           
        },
        directives: {
            'b-modal': VBModal
        },
        data() {
           return {
                userInfo: {
                    firstName: null,
                    lastName: null,
                    email: null,
                    contactNo: null,
                    password: null
                },
                confirmInfo: {
                    firstName: null,
                    lastName: null,
                    email: null,
                    contactNo: null,
                    password: null
                }
           } 
        },
        methods: {
            onRegister() {
                this.$store.state.registration = [];
                
                this.$store.state.registration.push({
                    firstName: this.userInfo.firstName,
                    lastName: this.userInfo.lastName,
                    email: this.userInfo.email,
                    contactNo: this.userInfo.contactNo,
                    password: this.userInfo.password
                });
                
                this.$refs['my-modal'].show();

                this.confirmInfo.firstName = this.$store.state.registration[0].firstName;
                this.confirmInfo.lastName = this.$store.state.registration[0].lastName;
                this.confirmInfo.email = this.$store.state.registration[0].email;
                this.confirmInfo.contactNo = this.$store.state.registration[0].contactNo;
            }
        }
    }
</script>
