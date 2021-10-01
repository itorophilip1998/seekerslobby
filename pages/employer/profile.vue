<template>
  <div class="auth  p-lg-4 row m-0">
    <div class=" col-lg-4 bg-white authpage p-1 p-lg-3 text-justify signupage ">
     
     <form action="">
        <header class="pl-3 pt-3 pb-0 pl-0">
        
        <button class="btn mb-4 text-primary btn-white shadow-x rounded-x  bg-white">Update Profile</button>
  <nuxt-link to="/employer/dashboard" class="text-primary float-right text-underline"><i class="fa fa-home" aria-hidden="true"></i> </nuxt-link>
      </header>
      <!-- page1 -->
       <div class="page1"  v-if="page1 && !page2">
         <h5 class="m-0 pl-3">
    Bio Data
  </h5>
       <div class="row m-0">
         <div class="col-lg-6">
           <!-- firstname -->
           <div class="form-group mt-3"> 
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="First Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-lg-6 mt-3">
           <!-- lastname -->
           <div class="form-group"> 
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Last Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-12 mt-3">
           <div class="form-group"> 
             <input type="text" class="form-control border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="User Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-12 mt-3">
           <div class="form-group"> 
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Phone Number">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
          <div class="col-12 mt-3">
           <div class="form-group">  
              <select class="custom-select border-secondary rounded-x  " name="" id="">
                <option selected>Country</option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
              </select> 
           </div>
         </div>
         <div class="col-12 mt-3">
           <div class="form-group"> 
             <input type="date" class="form-control  border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>

         <div class="col-12 mt-3">
        <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white">Skip</button>
        <button type="button" @click="pageFunc(1)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Next</button>
         
         </div>
        
       </div>

       </div>

       <!-- page2 -->
          <div class="page2" v-if="page2 && !page1">
         <h5 class="m-0 pl-3">
page2
  </h5>
       <div class="row m-0">
         <div class="col-lg-6">
           <!-- firstname -->
           <div class="form-group mt-3"> 
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="First Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-lg-6 mt-3">
           <!-- lastname -->
           <div class="form-group"> 
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Last Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-12 mt-3">
           <div class="form-group"> 
             <input type="text" class="form-control border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="User Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-12 mt-3">
           <div class="form-group"> 
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Phone Number">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
          <div class="col-12 mt-3">
           <div class="form-group">  
              <select class="custom-select border-secondary rounded-x  " name="" id="">
                <option selected>Country</option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
              </select> 
           </div>
         </div>
         <div class="col-12 mt-3">
           <div class="form-group"> 
             <input type="date" class="form-control  border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>

         <div class="col-12 mt-3">
        <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white">Skip</button>
        <button type="button" @click="pageFunc(2)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Next</button>
         
         </div>
        
       </div>

       </div>
     </form>
    </div>
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
      page1:true,
      page2:false
       
    }
  },
   
 methods: {
   pageFunc(data){
     if(data==2){
    //  alert(data)

       this.page1==true;
       this.page2==false


     }
     else if(data==1){
       this.page1==false;
       this.page2==true
     alert(data)

     } 
   }
 }
} 
</script>

<style scoped>
a:hover{color:var(--primary) !important;
/* text-decoration: underline !important; */
}
 
 
</style>