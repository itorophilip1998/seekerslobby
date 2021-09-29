<template>
  <div class="auth pt-md-5">
    <div class="authpage col-md-5 col-lg-3 py-3  signupage">
      <header class="text-center">
        <h4 ><strong><nuxt-link to="/" class="text-dark">Seekerslobby</nuxt-link></strong></h4>
        <h6>Forgot Password</h6>
      </header>
      <main class="px-3 mt-5">
     
        <form action="">
          <div class="form-group">
            <input type="email" v-model="auth_details.email" class="form-control rounded-4" name="" id="" aria-describedby="emailHelpId" placeholder="Email">
            <small id="emailHelpId" class="form-text d-none text-muted">Help text</small>
          </div>
           
          <div class="form-group  text-center ">
            <button class="btn btn-primary text-white w-75 rounded-4">Verify</button>
          </div>
          <hr>
          <small class="d-block text-center">Don’t have an account? <nuxt-link to="/signup" class="text-primary">Sign up</nuxt-link></small>
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