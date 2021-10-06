<template>
  <div class="mainpage">
    <employerheader></employerheader>
    <main class="px-md-4 px-0">
      <div class="row m-0 ">
        <!-- main col -->
        <div class="col-md-8 p-0 ">
          <div class="row m-0  p-0 ">
            <div class="col-12 bg-white  m-0 p-0 maincol     shadow-x rounded-5  ">
              <header class="border-bottom mainheader pt-2 px-3">
            <h6 class="font-wieght-bold mb-0">Recent Job Posts
              <span>
            <nuxt-link to="/employer/jobs" class="text-primary float-right">View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></nuxt-link>
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
            <div class="col-12 bg-white  maincol mt-5 p-0   shadow-x rounded-5  ">
              <header class="border-bottom mainheader pt-2 px-3">
            <h6 class="font-wieght-bold mb-0">Recent Bids
              <span>
            <nuxt-link to="/employer/applications" class="text-primary float-right">View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></nuxt-link>
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
        <!-- other col -->
        <div class="col-md-4 px-lg-5 py-3 py-md-1 order-md-last order-first px-md-4">
          <div class="row m-0">
            <div class="col-12 p-0">  <div class="cards shadow  bg-white">
                <div class="header p-3 text-white bg-primary">
                  <div class="sub-header">
                      <span>welcome back</span>
                  <span class="star float-right">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  </span>
                  </div>
                  <div class="sub-header2 mt-3">
                  <strong>Felicity Okoronkwo</strong>
                  <small class="sub-package float-right">
                    Free Member
                  </small>
                </div>
                  <div class="sub-header2 mt-1">
                  <span>@onlineemployer</span>
                  <button class="btn bg-transparent px-3 p-1 text-white border-white btn-sm skillsbtn font-weight-bold  float-right">
                   Upgrade
                  </button>
                </div>
                </div>

                <div class="main border-bottom bg-white py-4">
                  <div class="bars p-3">
                    <small>Set up your account </small>
                    <small class="float-right">44%</small>
                      <div class="progress bg-li" style="height:7px">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 44%;"
                              aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="incomplet p-2">
                        <div class="card-incomplete bg-light shadow-x p-1 row m-0">
                          <div class="col-2"><i class="fa fa-address-card text-primary" aria-hidden="true"></i></div>
                          <div class="col-8 incomTxt text-justify">Verify Your Country of Residence to Allow Freelancers Find You</div>
                          <div class="col-2 incomTxt">+15</div>
                        </div>
                        <hr>
                        <small class="font-weight-bold">Account balance</small>
                       <small class="float-right text-muted">Top up your account</small>
                       <div class="deposit bg-white my-1">
                          <span class="text-muted ">$150.00 USD</span>
                       <button class="btn btn-sm btn-primary float-right">Deposit funds</button>
                       <hr class="mt-3 p-0">

                       </div>
                      </div>
                  </div>

                </div>

            </div></div>
            <div class="col-12 p-0 mt-3">
              <div class="plan bg-white mt-1 p-2 pb-0 shadow-x">
                          <span class=" ">Your Credits</span>
                       <small class="btn btn-sm btn-primary float-right">Free Plan</small>
                       <hr class="mt-3 p-0">
                       <span><strong>2 credits</strong> <span class="text-muted">left out of 5</span></span>
                       <p class="p-0 text-muted small m-b0">
                         You will not be able to post new jobs when you run out of credits
                       </p>

                       </div>
                       <button class="w-100 btn btn-sm btn-primary mt-0">Upgrade Your Plan to Recieve More Credits</button>
        <div class="message-box  bg-primary text-white text-right p-2 mt-5">
             <span class="float-left">Messages</span>       <nuxt-link to="/employer/chats"><img src="~assets/images/message.png" class=" link imgM mx-5" alt=""> </nuxt-link> <div class="ico"></div> <img src="~assets/images/minimize.png" class=" link ml-1 imgM" alt="">
        </div>
            </div>
          </div>
        </div>
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
.message-box{
  position: fixed ;
  bottom: 3px;
  right: 3px;
  /* top: 30px; */
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
