<template>
  <div class="auth  p-lg-4 row m-0 ">   
        <!-- main col -->
        <div class="col-md-8 p-0 m-auto mpage">
          <div class="row m-0  p-0 ">
            <div class="col-12 bg-white  m-0 p-0 maincol     shadow-x rounded-5  ">
                  <header class="border-bottom mainheader pt-2 px-3">
            <h6 class="font-wieght-bold mb-0">Recent Bids
              <span>
            <nuxt-link to="/employer/dashboard" class="text-primary float-right">View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></nuxt-link>
              </span>
            </h6>
          </header>
          <!-- recent bids  -->
          <section class="p-2 p-md-3 pt-1 ">
              <div class="jobscard border rounded-x mt-3  shadow-x">
                <div class="row m-0 p-0">
                  <div class="col-lg-1 col-3 py-5 headcard text-center px-0">
                    <div class="imghead p-3  rounded-lg mt-3 rounded-x">
                    <img src="~assets/images/profileavatar.png" class="border rounded-circle p-1"  alt="">
                    </div>
                  </div>
                  <div class="col-lg-11 col-9 p-1 text-justify">
                    <div class="headercard ">
                      <div class="headrow float-right px-2">
                        <small class="badge  pb-1 px-3 mr-2">
                        <img src="~assets/images/time.png" class="w-40 link pr-1" alt="">
                          4 days</small> 
                        <small class="badge  pb-1 px-3 mr-2">
                        <img src="~assets/images/bid.png" class="w-40 link pl-1" alt="">
                          Bid $20</small> 
                      </div>
                    <h6 class="pt-4 pt-md-2 hcardT ">Annastesia Olajumoke</h6>
                   </div>
                   <div class="skills p col-md-8 mx-1 m-0 p-2 small bg-light ">
                       Lorem imposum is a dummy text, this is a dummy text, but you already know that. This is also your best shot at finding your best job....
                   </div> 
                     <div class="small float-right text-muted pr-1">1 day ago</div>

                  </div>
                </div>
              </div> 
               
              <div class="jobscard border rounded-x mt-3  shadow-x">
                <div class="row m-0 p-0">
                  <div class="col-lg-1 col-3 py-5 headcard text-center px-0">
                    <div class="imghead p-3  rounded-lg mt-3 rounded-x">
                    <img src="~assets/images/profileavatar.png" class="border rounded-circle p-1"  alt="">
                    </div>
                  </div>
                  <div class="col-lg-11 col-9 p-1 text-justify">
                    <div class="headercard ">
                      <div class="headrow float-right px-2">
                        <small class="badge  pb-1 px-3 mr-2">
                        <img src="~assets/images/time.png" class="w-40 link pr-1" alt="">
                          4 days</small> 
                        <small class="badge  pb-1 px-3 mr-2">
                        <img src="~assets/images/bid.png" class="w-40 link pl-1" alt="">
                          Bid $20</small> 
                      </div>
                    <h6 class="pt-4 pt-md-2 hcardT ">Annastesia Olajumoke</h6>
                   </div>
                   <div class="skills p col-md-8 mx-1 m-0 p-2 small bg-light ">
                       Lorem imposum is a dummy text, this is a dummy text, but you already know that. This is also your best shot at finding your best job....
                   </div> 
                     <div class="small float-right text-muted pr-1">1 day ago</div>

                  </div>
                </div>
              </div> 
               
          </section>
            </div> 
          </div>
        </div>
      
  </div>
</template>

<script> 
import Password from 'vue-password-strength-meter';
import employerheader from '@/components/employer-header.vue'
export default {
  components:{
        Password,
      employerheader
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
   
 }
} 
</script>

<style scoped>
.mpage{
   margin-top: 0px !important;
}
.message-box{
  position: fixed ;
}
.ico{
  background:white;
  width:6px;
  height:6px;
  border-radius: 4px;
  position: absolute;
 margin-top: -20px;
  right: 70px;
}
.imgM{
height:15px;
}
.badge{
  font-size:10px !important;
  font-weight: normal !important;
}
 .incomTxt{
  font-size: 11px;
 }
 main{
   margin-top:100px;
   

 }
.imghead{
  left: 10px;
top: 12px;
position: absolute;
}
 a:hover{
   color: var(--primary) !important;
 }
  .jobscard{
    background: #FFFFFF;
/* opacity: 0.1; */
border: 1px solid #000000;
box-sizing: border-box;
border-radius: 10px;
box-shadow: 10px 10px 11px rgba(245, 245, 245, 0.959) !important;
cursor: pointer;
  }
  .jobscard:hover{
    background: #FFFFFFCC !important;  
  }
  .skillsbtn{ 
   background: rgba(241, 241, 241, 1);
 font-size:9px !important;
 /* font-weight:bold */
  }
</style>