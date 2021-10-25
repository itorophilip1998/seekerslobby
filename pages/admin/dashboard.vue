<template>
  <div>

     <div class="main row m-0">
       <div class="col-md-3 col-lg-2  p-0 border bg-white sidebar">
          <div class=" pt-2 px-2">
              <a class="navbar-brand font-weight-bold text-muted" href="/">Admin</a>
              <button class="fa btn btn-white d-md-none btn-sm fa-sign-out text-muted float-right" aria-hidden="true">Logout</button>

          </div>
              <hr class="p-0 mt-1">
                <ul class="p-0 m-0" >
                  <li @click="listFunc(item)" :class="($route.path==item.url)?'listF':''" v-for="(item, index) in loads" :key="index"><i :class="`${item.icon} mr-md-2`" aria-hidden="true"></i>
                  <span class="name d-md-inline d-none">{{item.name}}</span> </li>
                </ul>
                <button class="btn bg-white d-md-block d-none w-100 text-left p-2 text-muted "><i class="fa fa-sign-out mr-md-2`" aria-hidden="true"></i>
                  <span class="name ">Logout</span> </button>
       </div>

       <div class="col-md-9 col-lg-10 mx-auto  py-md-4 pt-1 px-0">
         <input type="text" class="form-control col-md-8 mx-auto p-3" placeholder="Search...">
         <div class="link-display jumbotron p-2 mt-1 mx-md-1">
            <i :class="`${items.icon} mr-md-2`" aria-hidden="true"></i><span class="font-weight-bold text-capitalize"> {{ (items.name)? items.name : $route.path.slice(7) }}</span> <small class="float-right">{{ (items.url) ? items.url: $route.path }}</small>
         </div>

        <div class="row m-0 p-2 ">
           <div class="col-md-3 my-2" v-for="(item, index) in loads" :key="index">
             <div class="card border-primary link zoom " >
           <div class="card-body">
             <h4 class="card-title">27 users </h4>
             <p class="card-text">
           <i :class="`${item.icon} text-muted   mr-md-2`" aria-hidden="true"></i>
               {{item.name}}</p>
           </div>
         </div>
           </div>
        </div>

       </div>
     </div>
  </div>
</template>
<script>
export default {
  auth:"guest",
  data() {
    return {
      items:{},
      loads:[
        {
         name:"Dashboard",
         url:"/admin/dashboard",
         icon:"fa fa-dashboard"
        },
        {
         name:"Contacts",
         url:"/admin/contacts",
         icon:"fa fa-phone"
        },
        {
         name:"Jobs",
         url:"/admin/jobs",
         icon:"fa fa-newspaper-o"
        },
        {
         name:"Employers",
         url:"/admin/employers",
         icon:"fa fa-users"
        },
        {
         name:"Jobseekers",
         url:"/admin/jobseekers",
         icon:"fa fa-user"
        },
        {
         name:"Chats",
         url:"/chats",
         icon:"fa fa-comment-o"
        },
      ]
    }
  },
  methods: {
    listFunc(item){
      this.items=item;
      this.$router.push(item.url)


    }
  },
}
</script>
<style scoped>
  .sidebar{
    height: 100vh !important;

  }
  li{
    padding:10px;
    color:var(--secondary);
    cursor:pointer;
  }
  li:hover,li:focus,.listF{
   background:var(--primary);
   color:var(--white)
  }
  li:hover,li:focus{
   background:var(--secondary);
   color:whitesmoke
  }


  /* @media queries */
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) and (max-width: 768px)  {
   .sidebar{
    height: 18vh !important;
    border:none !important;

  }
  li{
    display: inline;
    text-align: center !important;
    margin:10px auto !important;
    padding:5px  15px !important;
  }
  ul{
    text-align: center !important;
   /* border-bottom:1px solid whitesmoke !important; */
  }
  .listF{
   border-bottom:3px solid var(--primary) !important;
   /* color:var(--white); */
   background:white !important;
   color:var(--primary);
  }
  li:hover,li:focus{
   border-bottom:3px solid var(--secondary) !important;
   /* color:var(--white); */
   background:white !important;
   color:var(--secondary);
  }

}
</style>
