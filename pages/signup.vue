<template>
  <div class="auth pt-md-5">
    <div class="authpage col-md-5 col-lg-3 py-3  signupage">
      <header class="text-center">
        <h4 ><strong><nuxt-link to="/" class="text-dark">Seekerslobby</nuxt-link></strong></h4>
        <h6>Sign up</h6>
      </header>
      <main class="px-3 mt-5">
        <div class="google rounded-4 link border border-dark text-center  p-1">
          <img src="~assets/images/google.jpg" class="googlelogo" alt="">  Log in with Google
        </div>
        <div class=" google  text-center mt-3  p-1 row m-0">
            <div class="form-check form-check-inline col text-right p-0 m-0">
              <small class="form-check-label  p-0 m-0">
                <input class="form-check-input link" type="radio" name="who" id="" value="">Jobseeker
              </small>
            </div>
            <div class="form-check form-check-inline col ">
              <small class="form-check-label">
                <input class="form-check-input link" type="radio" name="who" id="" value="">Employer
              </small>
            </div>
        </div>
        <div class="divider">
          <div class="row m-0 text-center mt-3">
            <div class="col-5"><hr></div>
            <div class="col-2"><b>OR</b></div>
            <div class="col-5"><hr></div>
          </div>
        </div>
        <form action="">
          <div class="form-group">
            <input type="email" v-model="auth_details.email" class="form-control rounded-4" name="" id="" aria-describedby="emailHelpId" placeholder="Email or Username">
            <small id="emailHelpId" class="form-text d-none text-muted">Help text</small>
          </div>
          <div class="form-group">
                <input type="password" v-model="auth_details.password"  class="form-control rounded-4" name="" ref="password" aria-describedby="emailHelpId" placeholder="Password">
          <i class="link fa fa-eye" v-if="!passwordCheckData"  @click="passwordCheck('show')"></i>
          <i class="link fa fa-eye-slash"  v-if="passwordCheckData" @click="passwordCheck('open')"></i>
            <small id="emailHelpId" class="form-text d-none text-muted">Help text</small>
          </div> 
            <div class="form-check px-2 pb-2 pl-4">
               
                 <!-- terms  -->
                    <div class="modal fade pt-1" id="terms_" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                      <terms></terms>
                    </div>
            </div> 
            <div class="form-check px-2 pb-2 pl-4">
              <small class="form-check-label bgtxt mt-1 text-justify">
                <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue"  >
               I understand and agree with Jobber’s  
                      <nuxt-link to="/terms" class="text-primary"> <u>Terms & Conditions</u> </nuxt-link>
                      and
                      <nuxt-link to="/terms" class="text-primary"> <u>Privacy Policy</u> </nuxt-link>

              </small> 
                 <!-- terms  -->
                    <div class="modal fade pt-1" id="terms_" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                      <terms></terms>
                    </div>
            </div> 
          <div class="form-group  text-center ">
            <button class="btn btn-primary text-white w-75 rounded-4">Join Seekerslobby</button>
          </div>
          <hr>
          <small class="d-block text-center">Already have an account? <nuxt-link to="/signin" class="text-primary">Sign In</nuxt-link></small>
        </form>
      </main> 
    </div>
    <div  class="kisspng d-none d-lg-block" alt=""></div>
  </div>
</template>

<script> 
import Password from 'vue-password-strength-meter'
import terms from '@/components/terms.vue'
export default {
  components:{
        Password,
        terms
    },
    auth:'guest',
  data() {
    return {
      passwordCheckData:false,
      auth_details:{
              password:"",
              email:""

      }
    }
  },
   
 methods: {
   passwordCheck(data){
             if (data=="show") {
                 this.passwordCheckData=!this.passwordCheckData;
                 this.$refs.password.type="text"
             }
             else{
                this.passwordCheckData=!this.passwordCheckData;
                this.$refs.password.type="password"
             }
        }
 }
} 
</script>

<style scoped>
/* .bgtxt{
  font-size:13px
} */
  .googlelogo{
    width:23px;
  }
  .rounded-4{
    border: 1px solid rgba(0, 0, 0, 0.65);
    border-radius: 4px;
  }
  div>hr{
    border: 1px solid rgba(0, 0, 0, 0.2);
  }
  i.fa{
    position:absolute;
    margin-top: -30px;
    right: 36px;
  }
  a:focus,a:hover{
   color:var(--primary) !important;
   /* background:var(--primary) !important; */

 }




</style>