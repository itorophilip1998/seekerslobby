<template>
  <div class="auth pt-md-5">
    <div class="authpage col-md-5 col-lg-3 py-3">
      <header class="text-center">
        <h4 ><strong> <nuxt-link class="text-dark" to="/">Seekerslobby</nuxt-link> </strong></h4>
        <h6>Welcome Back</h6>
      </header>
      <main class="px-3 mt-5">
        <div class="google rounded-4 link border border-dark text-center  p-1">
          <img src="~assets/images/google.jpg" class="googlelogo" alt="">  Log in with Google
        </div>
        <div class="google    text-center mt-3 p-1">
          <!-- <img src="~assets/images/apple.png" class="googlelogo" alt="">  Log in with Apple -->
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
            <input type="email" class="form-control rounded-4" name="" id="" aria-describedby="emailHelpId" placeholder="Email or Username">
            <small id="emailHelpId" class="form-text d-none text-muted">Help text</small>
          </div>
          <div class="form-group">
            <input type="password"  class="form-control rounded-4" name="" ref="password" aria-describedby="emailHelpId" placeholder="Password">
          <i class="link fa fa-eye" v-if="!passwordCheckData"  @click="passwordCheck('show')"></i>
          <i class="link fa fa-eye-slash"  v-if="passwordCheckData" @click="passwordCheck('open')"></i>
            <small id="emailHelpId" class="form-text d-none text-muted">Help text</small>
          </div> 
            <div class="form-check px-2 pb-5">
              <label class="form-check-label mt-1">
                <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue"  >
               Remember Me
              </label>
              <small class="small float-right "><u><nuxt-link class="text-primary" to="/forgot-password">Forgot Password?</nuxt-link></u></small>
            </div> 
          <div class="form-group  text-center ">
            <button class="btn btn-primary text-white w-75 rounded-4">Log in</button>
          </div>
          <hr>
          <small class="d-block text-center">Don’t have an account? <nuxt-link to="/signup" class="text-primary link">Sign Up</nuxt-link></small>
        </form>
      </main> 
    </div>
    <div  class="kisspng d-none d-lg-block" alt=""></div>

  </div>
</template>

<script> 
export default {
    auth:'guest',
data() {
  return {
    passwordCheckData:false,
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
 },
 }
</script>

<style scoped>
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