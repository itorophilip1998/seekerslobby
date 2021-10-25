<template>
  <div class="auth mainpage  p-lg-4 row m-0">
    <div class=" col-lg-5 bg-white authpage p-0 text-justify signupage ">
<!-- i need this -->
     <div class="form">
        <header class="pl-3 pt-3 pb-0 px-2">

        <button class="btn mb-3 text-primary btn-white shadow-x rounded-x  bg-white">Update Profile</button>
        <nuxt-link to="/jobseeker/dashboard"  class="btn mb-3 text-white float-right  btn-secondary shadow rounded-x  ">Skip</nuxt-link>
  <!-- <nuxt-link to="/jobseeker/dashboard" class="text-primary float-right text-underline"><i class="fa fa-home" aria-hidden="true"></i> </nuxt-link> -->

      <div class="multipages row  border-bottom pb-2 mb-3   m-0 px-2">
        <div class="col-8 p-0 text-center">
          <small>Profile setup 35%</small>
           <div class="progress " style="height:6px">
             <div class="progress-bar bg-primary" role="progressbar" style="width: 35%; font-size:9px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
         </div>
        </div>
         <small class="col-4 text-right"> {{page}} of 7 </small>
       </div>
      </header>


      <!-- page1 -->
      <div class="page1"  v-if="page==1">
       <h5 class="m-0 pl-3">
       Bio Data
      </h5>
       <div class="row m-0 bg-white">
         <div class="col-lg-6">
           <!-- firstname -->
           <div class="form-group mt-2">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="First Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-lg-6 mt-2">
           <!-- lastname -->
           <div class="form-group">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Last Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-12 mt-2">
           <div class="form-group">
             <input type="text" class="form-control border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="User Name">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-12 mt-2">
           <div class="form-group">
             <vue-country-code    @onSelect="onSelect"   :preferredCountries="['ng']"> </vue-country-code>
             <input type="text" class="form-control border-secondary rounded-x p-2 phoneInput " name="" id="" aria-describedby="emailHelpId" placeholder="Phone Number">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
          <div class="col-12 mt-2">
           <div class="form-group">
          <country-select v-model="country" :countryName='countryName'   :country="country" topCountry="NG"  class="form-control border-secondary rounded-x " />
            </div>
           </div>

          <div class="col-12 mt-2">
           <div class="form-group">
             <region-select v-model="region" :regionName="regionName" :defaultRegion='regionNames' :countryName='countryName'   :country="country"  :region="region" class="form-control border-secondary rounded-x "  />
             </div>
           </div>

         <div class="col-12 mt-2 border-top">
           <div class="form-group">
             <small id="emailHelpId" class="form-text text-muted ">Date Of Birth</small>
             <input type="date" class="form-control  border-secondary rounded-x  p-2" name="" id="" aria-describedby="emailHelpId" placeholder="">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>

         <div class="col-12 mt-2">
        <!-- <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white">Skip</button> -->
        <button type="button" @click="pageFunc(2)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Next</button>

         </div>

       </div>

       </div>

       <!-- page2 -->
   <div class="page2" v-if="page==2">

       <div class="row m-0  bg-white">
         <div class="col-12">
        <div class="row m-0 text-center text-md-left">
          <div class="col-md-4 ">
                <img src="~assets/images/defaultavata.png" class="defaultavata rounded-circle shadow-x p-2" alt="">
          </div>
          <div class="col-md-8 mt-2">
            <button class="btn mb-3 text-primary btn-white shadow-x rounded-x  bg-white">Upload Photo</button>
            <small class="py-0 d-block">Upload an image not larger than 5MB for all file types. (.jpg .png .bmp .gif)</small>
          </div>
        </div>

         </div>
         <div class="col-lg-6">
           <div class="form-group mt-2">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Professional Headline">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-lg-6 mt-2">
           <div class="form-group">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Highest Qualification">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>

         <div class="col-lg-6">
           <div class="form-group mt-2">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Current Job Function">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-lg-6 mt-2">
           <div class="form-group">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Preferred Job Function">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>

         <div class="col-lg-6">
           <div class="form-group mt-2">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Preferred Job Location">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-lg-6 mt-2">
           <div class="form-group">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Years of Experience">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>

         <div class="col-lg-6  mt-2">
           <div class="form-group">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Work Type">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>
         <div class="col-lg-6 mt-2">
           <div class="form-group">
             <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Salary Expectation(Naira)">
             <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
           </div>
         </div>

         <div class="col-12 mt-2  p-0">
            <div class="form-check d-block">
              <small class="form-check-label">
                <input class="t" type="checkbox" name="" id="" > Display my profile to potential employers
              </small>
            </div>
         </div>
         <div class="col-12 mt-2 ">
          <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white"  @click="pageFunc(1)">Back</button>
        <button type="button" @click="pageFunc(3)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Next</button>

         </div>

       </div>

       </div>


        <!-- page3 -->
   <div class="page3" v-if="page==3">
    <h5 class="m-0 pl-3 mb-2">
      Education
     </h5>
    <div class="row m-0  bg-white">
      <div class="col-12">
        <textarea class="form-control" id="" cols="30" rows="10"
        placeholder="List your educational qualifications here.. "
        ></textarea>
      </div>


      <div class="col-12 mt-4 ">
        <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white"  @click="pageFunc(2)">Back</button>
     <button type="button" @click="pageFunc(4)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Next</button>

      </div>

    </div>

    </div>


        <!-- page4 -->
   <div class="page4" v-if="page==4">
    <h5 class="m-0 pl-3 mb-2">
      About Me
     </h5>
    <div class="row m-0  bg-white">
      <div class="col-12">
        <textarea class="form-control" id="" cols="30" rows="10"
        placeholder="Use this space to show clients that you have the skills and experience they are looking for. "
        ></textarea>
      </div>


      <div class="col-12 mt-4 ">
        <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white"  @click="pageFunc(3)">Back</button>
        <button type="button" @click="pageFunc(5)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Next</button>

      </div>

    </div>

    </div>

        <!-- page5 -->
   <div class="page5" v-if="page==5">
    <h5 class="m-0 pl-3 mb-2">
      Work Experience
     </h5>
    <div class="row m-0  bg-white">
      <div class="col-12">
        <textarea class="form-control" id="" cols="30" rows="10"
        placeholder="Use this space to show clients that you have the skills and experience they are looking for. "
        ></textarea>
      </div>
      <div class="col-12 mt-2  p-0">
        <div class="form-check ">
          <small class="form-check-label">
            <input class="t" type="checkbox" name="" id="" > I have no work experience
          </small>
        </div>
     </div>

      <div class="col-12 mt-4 ">
        <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white"  @click="pageFunc(4)">Back</button>
     <button type="button" @click="pageFunc(6)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Next</button>

      </div>

    </div>

    </div>

        <!-- page6 -->
   <div class="page6" v-if="page==6">
    <h5 class="m-0 pl-3 mb-2">
      Language Skills
       </h5>
    <div class="row m-0  bg-white">
      <div class="col-12">
        <textarea class="form-control" id="" cols="30" rows="10"
        placeholder="Do you speak more than one language? Let your employers know."
        ></textarea>
      </div>


      <div class="col-12 mt-4 ">
     <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white"  @click="pageFunc(5)">Back</button>
     <button type="button" @click="pageFunc(7)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Next</button>

      </div>

    </div>

    </div>

        <!-- page7 -->
   <div class="page7" v-if="page==7">
    <h5 class="m-0 pl-3 mb-2">
      Upload CV
     </h5>
    <div class="row m-0  bg-white">
      <div class="col-11 mx-auto border rounded-lg p-2">
        <small>Upload and save your CV to our system.</small>
        <div class="uploads p-1">
          <div class="form-group mt-2">
            <input type="text" class="form-control border-secondary rounded-x p-2 " name="" id="" aria-describedby="emailHelpId" placeholder="Title">
            <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
            <button class="btn bg-light shadow rounded-x mt-2">Choose File</button>
            <small class="d-block p-2">Upload a CV not larger than 10MB for all file types. (.pdf .doc .docx .rtf)</small>
            <div class="col-12 mt-4 ">
              <button class="btn mb-4  btn-light shadow-x rounded-x bg-white">Cancel</button>
              <button type="button" @click="updateprofileFunc()" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Upload</button>

               </div>
          </div>
        </div>
      </div>


      <div class="col-12 mt-4 ">
        <button class="btn mb-4 text-primary btn-white shadow-x rounded-x bg-white"  @click="pageFunc(6)">Back</button>
     <button type="button" @click="pageFunc(5)" class="btn mb-4 btn-primary  shadow rounded-x float-right bg-white">Update</button>

      </div>

    </div>

    </div>
      </div>
    </div>
  </div>
</template>

<script>
import Password from 'vue-password-strength-meter';
import terms from '@/components/terms.vue';
import VueCountryCode from 'vue-country-code';
export default {
  components:{
        VueCountryCode,
        Password,
        terms
    },
    auth:'guest',
  data() {
    return {
      passwordCheckData:false,
      page:1,
      location:{
        city:"",
        country:"",
      },
      // country regions
      country: '',
      region: '',
    regionName:true,
    countryName:true,
    regionNames:'',

    }
  },
  created(){
    // this.$router.push({ path: '/jobseeker/profile', query: { page: 1 }})
    this.page=this.$route.query.page;

  },

 methods: {
   selectcountry(country)
            {
                try {
                    this.regionNames=country
                    this.location.country=country
                } catch (error) {
                    console.log(error)

                }
            },
            selectregion(region)
            {
               try {
                this.location.city=region
               } catch (error) {
                console.log(error)

               }
            },
            onSelect({name, iso2, dialCode}) {
               try {
                this.dialCode=`+${dialCode}`;
                 console.log(name, iso2,dialCode)

               } catch (error) {
                    console.log(error)
               }
          },
   pageFunc(data){
       this.page=data;
       this.$router.push({ path: '/jobseeker/profile', query: { page: data }})
   },
   updateprofileFunc(data){
       this.page=data;
       this.$router.push({ path: '/jobseeker/profile', query: { page: data }})
   }
 }
}
</script>

<style scoped>
.phoneInput{
  padding-left:70px !important;
}
a:hover{color:var(--primary) !important;
/* text-decoration: underline !important; */
}

.signupage{
  min-height:90vh;
}
.mainpage{
  min-height:100vh !important;
}
.defaultavata{
  height:100px;
  width:100px;
}
input{
  border:1px solid grey !important;
}
.rounded-x{
  border-radius: 6px;
}
.rounded-4{
  border-radius: 4px;
}
</style>
