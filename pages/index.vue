<template>
  <div>
     <!-- header section -->
     <div id="header-section" class="py-5 mt-5">
       <div class="container-fluid mt-md-4">

            <div class="row m-0  px-lg-4 ">
              <div class="  col-lg-7 p-0">
                <!-- search box -->
                <div class="search border-primary d-none d-lg-block border bg-white rounded-x p-2  pl-3">
                    <i class="fa fa-search text-primary" aria-hidden="true"></i>
                  <input type="text" class="searchbox p-2 border-0 " placeholder="Job Title or Keyword">
                <i class="fa fa-map-marker text-primary" aria-hidden="true"></i>
                  <input type="text" class="searchbox p-2 border-0 " placeholder="Location">
                 <button class="btn-primary btn rounded-x p-2 searchbtn">Search Jobs</button>
                </div>

                <!-- bold text -->
                <h1 class="boldtext text-center text-lg-left pt-5">
                  Get the best <br class="d-none d-lg-block"><strong class="text-primary">Jobs</strong> <br class="d-none d-lg-block">
                  In every <span class="text-primary font-weight-bold">niche</span>
                </h1>
                <!-- paragraph -->
                <p class="col-lg-8 p-0 text-center text-lg-left mt-3 mx-auto mx-lg-0">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet officia quaerat repellendus doloribus repudiandae ipsum. Nesciunt nulla,
                   maxime vitae provident.</p>
                   <img src="~assets/images/pcleft.png" alt="" class="pcleft d-none d-lg-inline">

                  <!--two buttons -->
                  <div class="headerbtn col-md-8 p-0 text-center text-lg-left mx-auto mx-lg-0">
                    <button @click="$router.push('/employer/dashboard')" class="btn text-primary border border-primary bg-white shadow mr-md-2 rounded-x">Hire a Freelancer</button>
                    <button @click="$router.push('/jobseeker/dashboard')" class="btn btn-primary shadow border border-primary rounded-x">Find a Job</button>
                  </div>


              </div>
              <div class=" col-lg-5 text-center">
                 <img src="~assets/images/deskman.png" class="deskman mt-md-5 mt-2 d-none d-lg-inline  w-75" alt="">
                 <img src="~assets/images/deskman.png" class="deskman mt-md-5 mt-3 d-none  d-md-inline d-lg-none w-50" alt="">
                 <img src="~assets/images/deskman.png" class="deskman mt-md-5 mt-4  d-inline d-md-none w-75" alt="">
              </div>
            </div>
       </div>
     </div>

     <!-- best team section -->
   <div id="getbest-team" class="py-5">
       <div class="container-fluid mt-md-4 ">

            <div class="row m-0  px-lg-4 ">
              <div class="  col-lg-7 p-0">

                <!-- bold text -->
                <h1 class="boldtext text-center text-white text-lg-left pt-5 ">
                  Get the best <br class="d-none d-lg-block"><strong class="text-primary">Team</strong> <br class="d-none d-lg-block">
                  In every <span class="text-primary font-weight-bold">niche</span>
                </h1>
                <!-- paragraph -->

                <p class="col-lg-8 p-0 text-white text-center text-lg-left mt-3 mx-auto mx-lg-0">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet officia quaerat repellendus doloribus repudiandae ipsum. Nesciunt nulla,
                   maxime vitae provident.</p>
                   <img src="~assets/images/kiss.png" alt="" class="pcleft2 d-none d-lg-inline">




              </div>
              <div class=" col-lg-5 text-center">
                 <img src="~assets/images/kisspng-web.png" class="deskman mt-md-5 mt-2 d-none d-lg-inline  w-75" alt="">
                 <img src="~assets/images/kisspng-web.png" class="deskman mt-md-5 mt-3 d-none  d-md-inline d-lg-none w-50" alt="">
                 <img src="~assets/images/kisspng-web.png" class="deskman mt-md-5 mt-4  d-inline d-md-none w-75" alt="">
              </div>
               <!-- search box -->
                <div class="search border-primary d-none d-lg-block border bg-white col-7 rounded-x p-2 mt-3 pl-3">
                    <i class="fa fa-search text-primary" aria-hidden="true"></i>
                  <input type="text" class="searchbox p-2 border-0 " placeholder="Job Title or Keyword">
                <i class="fa fa-map-marker text-primary" aria-hidden="true"></i>
                  <input type="text" class="searchbox p-2 border-0 " placeholder="Location">
                 <button @click="$router.push('/employer/dashboard')" class="text-primary border border-primary btn rounded-x p-2 searchbtn searchbtn2">Find a freelancer</button>
                </div>
            </div>
       </div>
     </div>

     <!-- need something -->
     <div id="needsomething">

              <div class="row m-0 p-4 text-center text-lg-left">
                  <div class="col-md-6 col-lg-4 px-lg-5 ">
                     <div class="img text-center">
                       <img src="~assets/images/postjob.png" alt="">
                     </div>
                     <p>
                       What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has
                     </p>
                  </div>
                  <div class="col-md-6 col-lg-4 px-lg-5 ">
                     <div class="img text-center">
                       <img src="~assets/images/choocefreelancer.png" alt="">
                     </div>
                     <p>
                       What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has
                     </p>
                  </div>
                  <div class="col-md-6 col-lg-4 px-lg-5 ">
                     <div class="img text-center">
                       <img src="~assets/images/paysafely.png" alt="">
                     </div>
                     <p>
                       What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has
                     </p>
                  </div>

                  <div class="col-lg-7 ml-lg-auto order-first order-lg-last">
                    <h1 class="do p-0 p-md-4">
                      Do You Need Something  Done Right?
                      <br>
                 <button class="btn-primary mt-4 btn rounded-x p-2 px-5" @click="$router.push('/employer/dashboard')">Hire a freelancer</button>
                    </h1>

                  </div>
                  <div class="col-md-6 col-lg-4 px-lg-5  order-last">
                     <div class="img text-center">
                       <img src="~assets/images/custormersupport.png" alt="">
                     </div>
                     <p>
                       What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has
                     </p>
                  </div>
              </div>
     </div>

     <!-- contacts/about -->
     <div id="contact" class="bg-light">
      <div class="container-fluid">
         <div class="col-md-8 m-auto text-center pt-5 pb-3 p-0">
              <h3><strong class="text-primary ">Some important FAQ</strong></h3>
              <p class="p-0">Need some help with joining or using SeekersLoby? Please, send a message to support@seerkerslobby.com 📨 and we’ll get back to you.🙂</p>
          </div>
        <div class="row">
          <div class="col-md-6 mx-md-auto">
             <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
        <div class="">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
            <h3 class="panel-title">
              <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                What is Seekerslobby?
              </a>
            </h3>
            </div>
            <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
            <div class="panel-body px-3 mb-4">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat cupiditate autem, recusandae quaerat tenetur et praesentium repellendus iure unde enim veritatis accusantium consequuntur amet quisquam error corrupti corporis odit aspernatur!</p>
            </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
            <h3 class="panel-title">
              <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                How do I apply for job?
              </a>
            </h3>
            </div>
            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
            <div class="panel-body px-3 mb-4">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat cupiditate autem, recusandae quaerat tenetur et praesentium repellendus iure unde enim veritatis accusantium consequuntur amet quisquam error corrupti corporis odit aspernatur!</p>
            </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
            <h3 class="panel-title">
              <a class="collapse6" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse1">
                How do i know i'm employed here?
              </a>
            </h3>
            </div>
            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
            <div class="panel-body px-3 mb-4">
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat cupiditate autem, recusandae quaerat tenetur et praesentium repellendus iure unde enim veritatis accusantium consequuntur amet quisquam error corrupti corporis odit aspernatur!</p>

            </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
            <h3 class="panel-title">
              <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse1">
                How can I employ job seekers?
              </a>
            </h3>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
            <div class="panel-body px-3 mb-4">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat cupiditate autem, recusandae quaerat tenetur et praesentium repellendus iure unde enim veritatis accusantium consequuntur amet quisquam error corrupti corporis odit aspernatur!</p>

            </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading5">
            <h3 class="panel-title">
              <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
               How can i post jobs?
              </a>
            </h3>
            </div>
            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
            <div class="panel-body px-3 mb-4">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat cupiditate autem, recusandae quaerat tenetur et praesentium repellendus iure unde enim veritatis accusantium consequuntur amet quisquam error corrupti corporis odit aspernatur!</p>
  </div>
            </div>
          </div>

          </div>

        </div>
      </section>
          </div>
        <div class="col-md-4 p-2 m-md-auto">
            <form action="" class="border border-primary p-lg-4 p-2 rounded-x">
              <h4><strong class="text-primary ">Have any questions?</strong></h4>
              <br>
              <div class="form-group">
                <label for="email" class="bg-light">Email</label>
                <input type="text" class="form-control p-3 rounded-x" name="email" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text d-none text-muted">Help text</small>
              </div>
              <div class="form-group">
                <label for="subject" class="bg-light">Subject</label>
                <input type="text" class="form-control p-3 rounded-x" name="subject" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text d-none text-muted">Help text</small>
              </div>
              <div class="form-group">
                <label for="message" class="bg-light">Message</label>
                <textarea type="text" class="form-control p-3 rounded-x" rows="5" name="message" id="" aria-describedby="helpId" placeholder=""></textarea>
                <small id="helpId" class="form-text d-none text-muted">Help text</small>
              </div>
              <div class="form-group">
                <button class="btn btn-primary text-white rounded-x shadow">Send <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
     </div>

     <!-- ournumber -->
     <div id="our-numbers">
       <h2 class="text-center text-white"><b>
         Seekerslobby in number
         </b></h2>
          <div class="container-fluid padtop">
          <div class="row m-0">
            <div class="col-md-6 col-lg-2 text-center mx-auto">
              <div class="img">
                <img src="~assets/images/users.png" alt="">
              </div>
              <p class="smartfont p-2 text-white">
                <b> 30,000+</b> <br>
                <small>Users</small>
              </p>
          </div>
            <div class="col-md-6 col-lg-2 text-center mx-auto">
              <div class="img">
                <img src="~assets/images/employers.png" alt="">
              </div>
              <p class="smartfont p-2 text-white">
                <b> 9,000+</b> <br>
                <small>Employers</small>
              </p>
          </div>
            <div class="col-md-6 col-lg-2 text-center mx-auto">
              <div class="img">
                <img src="~assets/images/categories.png" alt="">
              </div>
              <p class="smartfont p-2 text-white">
                 <br>
                <small>Categories</small>
              </p>
          </div>
            <div class="col-md-6 col-lg-2 text-center mx-auto">
              <div class="img">
                <img src="~assets/images/verifiedtasks.png" alt="">
                <img src="~assets/images/badge.png" class="badgeImg" alt="">
              </div>
              <p class="smartfont p-2 text-white">
                <b> 180,000+</b> <br>
                <small>Verifed tasks</small>
              </p>
          </div>
            <div class="col-md-6 col-lg-2 text-center mx-auto">
              <div class="img">
                <img src="~assets/images/paidout.png" alt="">
              </div>
              <p class="smartfont p-2 text-white">
                <b> 746,200+</b> <br>
                <small>Paid out</small>
              </p>
          </div>

          </div>
        </div>
     </div>
  </div>
</template>

<script>
export default {
auth:"guest",
}
</script>
<style >
.searchbtn2{
 background: rgba(244, 120, 6, 0.08) !important;
}
.badgeImg{
  position: absolute;
  margin-top: 26px !important;;
  margin-left: -22px !important;;
  /* margin-bottom:40px ; */
}
</style>
