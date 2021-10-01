<template>
  <div class="mainpage">
    <employerheader></employerheader>

    <main class="px-md-4 p-0">
      <div class="row m-0 ">
        <!-- main col -->
        <div class="col-md-8 bg-white maincol   shadow-x rounded-5  p-0">
          <header class="border-bottom mainheader pt-2 px-3">
            <h6 class="font-wieght-bold">Recent Job Posts
              <span>
            <nuxt-link to="/employer/jobs" class="text-primary float-right">View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></nuxt-link>
              </span>
            </h6>
          </header>
          <!-- recent jobssection  -->
          <section class="p-3 pt-1 ">
              <div class="jobscard border rounded-x mt-3">
                <div class="row m-0 p-0">
                  <div class="col-lg-1 col-3 py-5 headcard text-center px-0">
                    <div class="imghead p-3 bg-accent rounded-lg mt-3 rounded-x">
                    <img src="~assets/images/project.png"  alt="">
                    </div>
                  </div>
                  <div class="col-lg-11 col-9 p-1 text-justify">
                    <div class="headercard ">
                      <div class="headrow float-right px-2">
                        <span class="badge badge-pill bg-accent2 pb-1 px-3 mr-3">pending</span>
                        <img src="~assets/images/tooglebar.png" class="w-40 link" alt="">
                      </div>
                    <h6 class="pt-4 pt-md-2 hcardT ">I need someone to design a car model in 3D</h6>
                   </div>
                   <div class="skills">
                      <small class="btn skillsbtn rounded-5 btn-sm">Blender</small>
                      <small class="btn skillsbtn rounded-5 btn-sm">Photoshop</small>
                      <small class="btn skillsbtn rounded-5 btn-sm">Illustrator</small>
                      <small class="btn skillsbtn rounded-5 btn-sm">CoralDraw</small> 
                   </div>
                  </div>
                </div>
              </div>
              <div class="jobscard border rounded-x mt-3">
                <div class="row m-0 p-0">
                  <div class="col-lg-1 col-3 py-5 headcard text-center px-0">
                    <div class="imghead p-3 bg-accent rounded-lg rounded-x">
                    <img src="~assets/images/project.png" alt="">
                    </div>
                  </div>
                  <div class="col-lg-11 col-9 p-1 text-justify">
                    <div class="headercard ">
                      <div class="headrow float-right">
                        <span class="badge badge-pill bg-accent2 pb-1 px-3 mr-3">pending</span>
                        <img src="~assets/images/tooglebar.png" class="w-40 link" alt="">
                      </div>
                    <h6>I need someone to design a car model in 3D</h6>
                   </div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis rerum quaerat, nemo voluptatum saepe dolorum aspernatur quo ullam fuga explicabo, libero nulla rem dolorem suscipit laudantium repellat nisi a numquam.
                  </div>
                </div>
              </div>
              <div class="jobscard border rounded-x mt-3">
                <div class="row m-0 p-0">
                  <div class="col-lg-1 col-3 py-5 headcard text-center px-0">
                    <div class="imghead p-3 bg-accent rounded-lg rounded-x">
                    <img src="~assets/images/project.png" alt="">
                    </div>
                  </div>
                  <div class="col-lg-11 col-9 p-1 text-justify">
                    <div class="headercard px-3">
                      <div class="headrow float-right">
                        <span class="badge badge-pill bg-primary pb-1 px-3 mr-3 ">allocated</span>
                        <img src="~assets/images/tooglebar.png" class="w-40 link" alt="">
                      </div>
                    <h6>I need someone to design a car model in 3D</h6>
                   </div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis rerum quaerat, nemo voluptatum saepe dolorum aspernatur quo ullam fuga explicabo, libero nulla rem dolorem suscipit laudantium repellat nisi a numquam.
                  </div>
                </div>
              </div>
          </section>
        </div>
        <!-- other col -->
        <!-- <div class="col-md-4 "></div> -->
      </div>
    </main>
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
  }
  .skillsbtn{ 
   background: rgba(241, 241, 241, 1);

  }
</style>