<template>
  <div class="auth  p-lg-4 row m-0">
    <div class=" col-lg-4 bg-white authpage p-1 p-lg-3 text-justify signupage ">
     
     <form action="">
        <header class="pl-3 pt-3 pb-0 pl-0">
        
        <button type="button"  class="btn mb-4 text-primary bg-white shadow-x rounded-x  bg-white">Post a Job</button>
 
      </header>
      <!-- page1 -->
       <div class="page1"  >
          
       <div class="row m-0">
        
         <div class="col-12 mt-2">
           <div class="form-group"> 
             <input type="text" class="form-control border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="Job Title">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-12 ">
           <div class="form-group"> 
            <textarea name="" id="" cols="30" rows="5" class="form-control border-secondary rounded-x  p-2" placeholder="Job Description"></textarea>
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
          <div class="col-12 ">
           <div class="form-group">  
              <select class="custom-select border-secondary rounded-x  " name="" id="">
                <option value="" selected>Time Line</option>
                <option>Remote</option>
                <option>PartTime</option>
                <option>FullTime</option>
                <option>Contract</option>
                <option>Frelance</option>
              </select> 
           </div>
         </div>
         <div class="col-12">
           <div class="form-group"> 
             <input type="text" class="form-control  border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="Salary">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-12">
           <div class="form-group"> 
             <input type="text" class="form-control  border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="Location">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>

         <div class="col-12 mt-3">
        <button type="button" @click="$router.push('/employer/dashboard')" class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white w-25">Cancel</button>
        <button   class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white w-25">Post</button>
         
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
 
 
</style>