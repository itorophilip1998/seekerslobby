<template>
  <div class="auth  p-lg-4 row m-0 ">   
        <!-- main col -->
        <div class="col-md-8 p-0 m-auto mpage">
          <div class="row m-0  p-0 ">
            <div class="col-12 bg-white  m-0 p-0 maincol     shadow-x rounded-5  ">
              <header class="border-bottom mainheader pt-2 px-3">
            <h6 class="font-wieght-bold mb-0">Available Jobs
              <span>
            <nuxt-link to="/employer/dashboard" class="text-primary float-right">Back <i class="fa fa-long-arrow-right" aria-hidden="true"></i></nuxt-link>
              </span>
            </h6>
          </header>
          <!-- recent jobssection  -->
          <section class="p-2 p-md-3">
              <div class="jobscard border rounded-x mt-3  shadow-x">
                <div class="row m-0 p-0">
                  <div class="col-lg-1 col-3 py-5 headcard text-center px-0">
                    <div class="imghead p-3 bg-accent rounded-lg mt-3 rounded-x">
                    <img src="~assets/images/project.png"  alt="">
                    </div>
                  </div>
                  <div class="col-lg-11 col-9 p-1 text-justify">
                    <div class="headercard ">
                      <div class="headrow float-right px-2">
                        <span class="badge badge-pill bg-accent2 pb-1 px-3 mr-2">pending</span>
                        <img src="~assets/images/tooglebar.png" class="w-40 link" alt="">
                      </div>
                    <h6 class="pt-4 pt-md-2 hcardT  ">I need someone to design a car model in 3D</h6>
                   </div>
                   <div class="skills row m-0">
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Blender</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Photoshop</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Illustrator</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">CoralDraw</small> 
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Figma</small> 
                   </div>
                   <div class="price verifiry p-2">
                     <strong>$200 - $700</strong>
                     <span class="badge badge-pill badge-success pb-1 ml-1">verified pay</span>
                     <div class="small float-right text-muted">1 day ago</div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="jobscard border rounded-x mt-3 shadow-x">
                <div class="row m-0 p-0">
                  <div class="col-lg-1 col-3 py-5 headcard text-center px-0">
                    <div class="imghead p-3 bg-accent rounded-lg mt-3 rounded-x">
                    <img src="~assets/images/project.png"  alt="">
                    </div>
                  </div>
                  <div class="col-lg-11 col-9 p-1 text-justify">
                    <div class="headercard ">
                      <div class="headrow float-right px-2">
                        <span class="badge badge-pill bg-primary text-white pb-1 px-3 mr-2">allocated</span>
                        <img src="~assets/images/tooglebar.png" class="w-40 link" alt="">
                      </div>
                    <h6 class="pt-4 pt-md-2 hcardT ">I need someone to design a car model in 3D</h6>
                   </div>
                   <div class="skills row m-0">
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Blender</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Photoshop</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Illustrator</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">CoralDraw</small> 
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Figma</small> 
                   </div>
                   <div class="price verifiry p-2">
                     <strong>$200 - $700</strong>
                     <span class="badge badge-pill badge-success d-none pb-1 ml-1">verified pay</span>
                   </div>
                  </div>
                </div>
              </div>
              <div class="jobscard border  shadow-x rounded-x mt-3">
                <div class="row m-0 p-0">
                  <div class="col-lg-1 col-3 py-5 headcard text-center px-0">
                    <div class="imghead p-3 bg-accent rounded-lg mt-3 rounded-x">
                    <img src="~assets/images/project.png"  alt="">
                    </div>
                  </div>
                  <div class="col-lg-11 col-9 p-1 text-justify">
                    <div class="headercard ">
                      <div class="headrow float-right px-2">
                        <span class="badge badge-pill bg-accent2 pb-1 px-3 mr-2">pending</span>
                        <img src="~assets/images/tooglebar.png" class="w-40 link" alt="">
                      </div>
                    <h6 class="pt-4 pt-md-2 hcardT ">I need someone to design a car model in 3D</h6>
                   </div>
                   <div class="skills row m-0">
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Blender</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Photoshop</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Illustrator</small>
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">CoralDraw</small> 
                      <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Figma</small> 
                   </div>
                   <div class="price verifiry p-2">
                     <strong>$200 - $700</strong>
                     <span class="badge badge-pill badge-success pb-1 ml-1">verified pay</span>
                   </div>
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
   margin-top: 1px !important;
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