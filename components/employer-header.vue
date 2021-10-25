<template>
  <div>
    <header>
       <nav class="navbar   navbar-expand-xl navbar-light shadow-sm nabBg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand font-weight-bold text-muted" href="/">SeekersLobby</a>
        <button class="navbar-toggler d-xl-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mx-auto mt-2 mt-xl-0 text-left text-xl-center">
            <li class="nav-item">
              <nuxt-link class="nav-link " to="/employer/dashboard">Dashboard </nuxt-link>
            </li>
            <li class="nav-item "> 
              <nuxt-link class="nav-link  " to="/employer/post-jobs"> 
               Post Jobs</nuxt-link>
            </li> 
            <li class="nav-item">
              <nuxt-link class="nav-link" to="/employer/jobs">Available Jobs</nuxt-link>
            </li>
            <li class="nav-item pr-2">
              <a class="nav-link" href="/employer/applications">Applications</a> 
            </li>
            <li class="nav-item pr-2">
              <a class="nav-link" href="/chats">Chats</a> 
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 pl-2 bg-transparent border-left border-secondary  ">
            <div class="avatar mr-1 mt-2">
            <img src="~assets/images/avatar.png" class="w-100" alt="">
            </div>
            <small> Christabel Ikemefuna</small>
            <nuxt-link to="/employer/profile" class="update font-weight-bold text-primary"> Update Profi<u>le</u></nuxt-link>
          </form>
        </div>
      </div>
    </nav>
    </header>
  </div>
</template>

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