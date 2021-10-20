<template>
  <div class=" ">
    <jobseekerheader class=" d-md-none"></jobseekerheader>

    <main class=" px-0 ">
        <div class="me p-2 d-md-none">
       <b> Hello Christabel</b>,<br>
        <small>Welcome to your Profile. Check out your details</small>
      </div>
 <div class="row m-0  p-0 ">
            <div class="col-12  m-0 p-0 maincol bg-white border-left border-bottom  border-right  rounded-x  ">
              <header class="border-bottom mainheader pt-2 m-0 px-3">
            <h6 class="font-weight-bold mb-0 headtext ">Your Profile
  <small class="float-right text-primary link"><u><strong>29%</strong> <nuxt-link to="/jobseeker/profile?page=1" class="text-primary">Edit Profile</nuxt-link></u> </small>

            </h6>
          </header>
          <!-- profile  -->

        <div class="skills row m-0 p-2 border-bottom">
          <div class="col-12 pl-0">
            <h6>Skills  </h6>
          </div>
            <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Blender</small>
            <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Photoshop</small>
            <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Illustrator</small>
            <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">CoralDraw</small>
            <small class="btn skillsbtn rounded-5 btn-sm mx-1 mt-1">Figma</small>
          </div>
        <div class="skills row m-0 p-2 border-bottom">
          <div class="col-12 pl-0">
            <h6>Education  </h6>
          </div>
             <p>MSc, BSC, PGD</p>
          </div>

        <div class="skills row m-0 p-2 border-bottom">
          <div class="col-12 pl-0">
            <h6>Work Experience  </h6>
          </div>
             <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, aliquam obcaecati eveniet natus explicabo officiis fugit impedit possimus perferendis.</p>
          </div>

        <div class="skills row m-0 p-2 border-bottom">
          <div class="col-12 pl-0">
            <h6>Language Skills  </h6>
          </div>
             <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, aliquam obcaecati eveniet natus explicabo officiis fugit impedit possimus perferendis.</p>
          </div>

        <div class="skills row m-0 p-2 border-bottom">
          <div class="col-12 pl-0">
            <h6>About you   </h6>
          </div>
             <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, aliquam obcaecati eveniet natus explicabo officiis fugit impedit possimus perferendis.</p>
          </div>


                <div class="message-box  bg-primary text-white text-right p-2 mt-5">
                        <span class="float-left">Messages</span>       <nuxt-link to="/employer/chats"><img src="~assets/images/message.png" class=" link imgM mx-5" alt=""> </nuxt-link> <div class="ico"></div> <img src="~assets/images/minimize.png" class=" link ml-1 imgM" alt="">
                  </div>
            </div>
          </div>

    </main>
  </div>
</template>

<script>
import Password from 'vue-password-strength-meter';
import jobseekerheader from '@/components/jobseeker-header.vue'
export default {
  components:{
        Password,
        jobseekerheader
    },
    auth:'guest',
  data() {
    return {
      passwordCheckData:false,
      page1:true,
      page2:false,
      is_saved:false,
    }
  },

 methods: {
 
 }
}
</script>

<style scoped>
.hcardT:hover{
  cursor:pointer;
  text-decoration: underline;
}
.listme{
  font-size: 14px;
}
.check-job{
  font-size:16px
}
.check-job2{
  font-size:16px;
  position:absolute;
  margin-top:11px !important;
  margin-left:-13px !important;
}
.headtext{
  /* color:grey ; */
  padding-bottom:5px;
  font-size:14px;
}
.mainheader{
  background: #FCCA8F;
border-radius: 10px 10px 0px 0px;
}
.searchboxs{
  background: #FCCA8F;
  margin-top:50px;
  padding-top:30px;
}
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
   margin-top:50px !important;

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
    background: #F1EEEECC !important;
  }
  .skillsbtn{
   background: rgba(241, 241, 241, 1);
 font-size:9px !important;
 /* font-weight:bold */
  }
  .search{
   box-shadow:0px 0px 8px rgb(131, 96, 96) !important;
}
/* @media queries */
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) and (max-width: 768px)  {
  .searchboxs{
  margin-top:6px !important;
  /* margin-top:16px !important;  */
}

.searchbtn{
  display:none !important;
}
  }
</style>
