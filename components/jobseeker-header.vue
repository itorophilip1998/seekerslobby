<template>
  <div>
    <header>
       <nav class="navbar   navbar-expand-xl navbar-light shadow-sm nabBg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand font-weight-bold text-muted" href="/">SeekersLobby</a>
        <button v-if="is_bar ==true" @click="is_bar =false" class="navbar-toggler d-xl-none border-0 text-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span>
        </button>
        <button v-if="is_bar ==false" @click="is_bar =true" class="navbar-toggler d-xl-none border-0 text-dark"  type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-close"></span>

        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mx-auto mt-2 mt-xl-0 text-left text-xl-center">
            <li class="nav-item">
              <nuxt-link class="nav-link " to="/jobseeker/dashboard">Dashboard </nuxt-link>
            </li>
            <li class="nav-item ">
              <nuxt-link class="nav-link  " to="/jobseeker/dashboard#find-jobs">
               Find Jobs</nuxt-link>
            </li>
            <li class="nav-item">
              <nuxt-link class="nav-link" to="/jobseeker/dashboard#jobs">Available Jobs</nuxt-link>
            </li>
            <li class="nav-item pr-2">
              <nuxt-link class="nav-link" to="/jobseeker/dashboard#applications">Applications</nuxt-link>
            </li>
            <li class="nav-item pr-2">
              <nuxt-link class="nav-link" to="/chats">Chats</nuxt-link>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 pl-2 bg-transparent border-left border-secondary  ">
            <div class="avatar mr-1 mt-2 link">
            <a  href='/jobseeker/dashboard#profile' class="d-none d-md-block">
               <img src="~assets/images/avatar.png"   class="w-100" alt="">
            </a>
            <nuxt-link  to='/jobseeker/profiles/itoro' class="d-md-none ">
               <img src="~assets/images/avatar.png"   class="w-100" alt="">
            </nuxt-link>
            </div>
            <a  href='/jobseeker/dashboard#profile' class="d-none d-md-block">
                 <small class="link text-dark" > Christabel Ikemefuna</small>
            </a>
            <nuxt-link  to='/jobseeker/profiles/itoro' class="d-md-none ">
                  <small class="link text-dark" > Christabel Ikemefuna</small>
            </nuxt-link>
            <nuxt-link to="/jobseeker/profile?page=1" class="update font-weight-bold text-primary"> Update Profi<u>le</u></nuxt-link>
          </form>
        </div>
      </div>
    </nav>
    </header>
  </div>
</template>
<script>
export default {
  data() {
    return {
      is_bar:true,
    }
  },
  methods: {
    moveMe(){
      this.$router.push('/jobseeker/dashboard#profile')
    }
  },
}
</script>

<style scoped>
 i.fa{
   font-size: 20px;
 }
 .nabBg{
   background: #FCCA8F;
 }
  .nav-link{
  width: 150px;
}
.update{
  position:absolute;
  margin-top:33px;
  margin-left:45px;
}
.update:hover{
 color:var(--primary) !important
}
</style>
