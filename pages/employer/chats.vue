<template>
  <div class="mainpage">
    <employerheader></employerheader>
    <main class=" px-0 bg-white   p-0">
      <div class="row m-0 fullscreen">
        <div class="col-lg-3 col-md-4    leftwing ">
            <div class="form-group px-4">
              <input type="text"   class="form-control rounded-5 pl-4 " name="" id="" aria-describedby="helpId" placeholder="Search contact">
              <i class="fa fa-search text-muted" aria-hidden="true"></i>
            </div>

            <ul class="nav nav-pills mb-3 text-center border-bottom" id="pills-tab" role="tablist">
            <li class="nav-item active mx-auto">
              <a class="nav-link  p-0" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Active</a>
            </li>
            <li class="nav-item mx-auto">
              <a class="nav-link p-0" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Unread(0)</a>
            </li>
            <li class="nav-item mx-auto">
              <a class="nav-link p-0" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Archived</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
               <div class="chats p-0">
                  <ul class="p-0">
                    <li class="chat-head">
                      <div class="avataC">
                        <img src="~assets/images/avata.png" class="avataI"  alt="">
                        <div class="online"></div>
                        </div>
                        <div class="chat-details">
                          <h6 class="strong m-0">mathew Balogun</h6>
                          <p class="small m-0">hello I got your a message....
                          </p>

                        </div>
                        <small class="chat-time">3 days ago</small>
                         <div class="dropdown">
              <button class="btn bg-transparent dropbtn fa fa-ellipsis-v" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  </button>
              <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">Mark as Read</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Archive</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Mute</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Block</a>
              </div>
            </div>
                    </li>
                    <li class="chat-head">
                      <div class="avataC">
                        <img src="~assets/images/avata.png" class="avataI"  alt="">
                        <div class="online"></div>
                        </div>
                        <div class="chat-details">
                          <h6 class="strong m-0">mathew Balogun</h6>
                          <p class="small m-0">hello I got your a message....</p>
                        </div>
                        <small class="chat-time">3 days ago</small>
                    </li>
                    <li class="chat-head">
                      <div class="avataC">
                        <img src="~assets/images/avata.png" class="avataI"  alt="">
                        <div class="online"></div>
                        </div>
                        <div class="chat-details">
                          <h6 class="strong m-0">mathew Balogun</h6>
                          <p class="small m-0">hello I got your a message....</p>
                        </div>
                        <small class="chat-time">3 days ago</small>
                    </li>
                  </ul>
               </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="chats p-0">
                  <ul class="p-0">
                    <li class="chat-head">
                      <div class="avataC">
                        <img src="~assets/images/avata.png" class="avataI"  alt="">
                        <div class="online"></div>
                        </div>
                        <div class="chat-details">
                          <h6 class="strong m-0">mathew Balogun</h6>
                          <p class="small m-0">hello I got your a message...
                          </p>

                        </div>
                        <small class="chat-time">3 days ago</small>
                    </li>

                  </ul>
               </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <div class="chats p-0">
                  <ul class="p-0">
                    <li class="chat-head">
                      <div class="avataC">
                        <img src="~assets/images/avata.png" class="avataI"  alt="">
                        <div class="online"></div>
                        </div>
                        <div class="chat-details">
                          <h6 class="strong m-0">mathew Balogun</h6>
                          <p class="small m-0">hello I got your a message....</p>
                        </div>
                        <small class="chat-time">3 days ago</small>
                    </li>
                  </ul>
               </div>
            </div>
          </div>
        </div>

        <div class="col-md-5 col-lg-6 centerwing px-0">
             <div class="chats p-0">
                  <ul class="p-0">
                    <li class="chat-head bg-light shadow-x ">
                      <div class="avataC">
                        <img src="~assets/images/avata.png" class="avataI"  alt="">
                        <div class="online"></div>
                        </div>
                        <div class="chat-details">
                          <h6 class="strong m-0">mathew Balogun</h6>
                          <p class="small m-0">247 message(s)</p>
                        </div>
                    </li>

                  </ul>
                  <div class="chatboby ">
                    <div class="friend-chat">
                      Hi! This easy local job came in and they are looking for a freelancer to conduct a site visit and arrange a form in Owerri:
                      https://www.freelance r.com/projects /photography/Site-Visit-Owerri-Nigeria/
Kindly place a bid if you are interested slightly smiling face emoji.
                      <div class="time  small text-muted text-left">
                            3hours ago
                       </div>
                    </div>

                    <div class="my-chat shadow-sm">
                      Hi! This easy local job

                      <div class="time  small text-muted text-right">
                        1min ago
                    </div>
                    </div>
                    <div class="my-chat shadow-sm">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam temporibus quidem fugit, distinctio dolorem rem quaerat laborum, ullam velit molestias corporis asperiores sapiente nihil nobis accusamus et? Dolorem, consequuntur esse?

                      <div class="time  small text-muted text-right">
                        1min ago
                    </div>
                    </div>
                  </div>
               </div>
               <div class="myinputbox col-md-5 col-lg-6 ">

                 <input type="text" class="chatinput form-control" placeholder="Type here ....">
                 <div class="icons">
                      <img src="~assets/images/smile.png"  class="mr-lg-2 link"  alt="">
                      <img src="~assets/images/attachment.png"  class="mr-lg-3 link"  alt="">
                    <button class="senbtn btn rounded-5 btn-sm px-3"> Send </button>

                 </div>
               </div>
        </div>
        <div class="col-md-3 rightwing ">
            <div class="header text-center mb-3">
                      <img src="~assets/images/avata.png"  class="avata2"  alt="">
            </div>
            <div class="info-container px-2">
              <div class="info p-2 shadow-sm border rounded-x mb-2">
                <div class="info-header  ">
                    <small>Full name</small>
                     <i class="fa fa-pencil float-right link text-primary" aria-hidden="true"></i>
                </div>
                <div class="info-body">
                     <h6 class=" m-0">mathew Balogun</h6>
                </div>
              </div>
              <div class="info p-2 border shadow-sm rounded-x mb-2">
                <div class="info-header  ">
                    <small>Location</small>
                     <i class="fa fa-pencil float-right link text-primary" aria-hidden="true"></i>
                </div>
                <div class="info-body">
                     <h6 class="m-0 span">34 ajapa road, Apapa, Lagos, Nigeria</h6>
                </div>
              </div>
              <div class="info p-2 border shadow-sm rounded-x mb-2">
                <div class="info-header  ">
                    <small>Location</small>
                     <i class="fa fa-pencil float-right link text-primary" aria-hidden="true"></i>
                </div>
                <div class="info-body">
                     <h6 class="m-0 span">34 ajapa road, Apapa, Lagos, Nigeria</h6>
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

<style scoped >
.leftwing{
    border-right:2px solid rgb(214, 211, 211) !important;
    padding:40px 2px  !important;
  }
  .rightwing{
    border-left:2px solid rgb(214, 211, 211) !important;
    padding:40px 2px  !important;
  }
  .centerwing{
    /* border-left:1px solid rgb(214, 211, 211); */
    padding:20px 2px !important ;
  }
.icons{
    position: absolute;
  top:18px;
  right:20px;
}
.senbtn{
  background: rgba(252, 202, 143, 0.6);
  font-size:14px;
  color:rgba(0, 0, 0, 0.719);
}

.chatinput{
  background: white;
border: 0.5px solid rgb(214,211,211);
border-radius: 5px;
/* width:99%; */
color:rgb(88, 86, 86) !important;
padding:10px;
}
.myinputbox{
  position:fixed;
  bottom:0px;
  padding:10px 5px ;
  background: white;
  width:100%;
  z-index: 2;
   text-align:center;
   border-right:2px solid rgb(214, 211, 211);
}
.chat-time{
  font-size:12px;
}
.friend-chat{
max-width: 80%;
margin-left: 10px;
background: #FCCA8F;
border-radius: 10px;
padding: 4px;
font-size: 14px;
margin-top:10px;
box-sizing: border-box;
border-top-left-radius: 0px;


}
.my-chat{
max-width: 80%;
float:right;
margin-right: 10px;
background:rgba(252, 202, 143, 0.2);
border-radius: 10px;
padding: 4px;
font-size: 14px;
margin-top:10px;
box-sizing: border-box;
border-top-right-radius: 0px;
border: 0.5px solid rgb(238, 223, 223);


}

.info-header {
  color:grey;
 font-size:13px;
}
.avata2{
  width:100px;
  height:100px;
  border-radius: 50%;
  border:5px solid whitesmoke;
  box-shadow:0px 0px 5px silver;
  background:white;
}
.fullscreen{
   min-height:92vh;

}
.chat-time{
  position: absolute;
    right: 4px;
    margin-top:3px;
    font-size: 9px;
    color:grey;
}
.online{
  position: absolute;
  width:8px;
  height:8px;
  border-radius: 50%;
  left:38px;
  top:35px;
background: #4CAF50;
}
 .chat-details{
  position: absolute;
    left: 74px;
    margin-top:8px;
    /* background:whitesmoke; */
}
  .avataC{
    position: absolute;
    left: 15px;
    margin-top:5px;
    background:white;
    padding:3px;
    border-radius:50%;
    /* box-shadow: 3px 4px 6px whitesmoke; */
    border:1px solid rgb(233, 230, 230);
  }
  .avataI{
    width:40px;
    height:40px;
  }
.chat-head{
  border-top:1px  solid rgb(233, 230, 230);
  /* border-bottom:1px  solid rgb(233, 230, 230); */
  height:60px;
  cursor: pointer;
  /* margin-top:3px; */
}
.chat-head:focus,.chat-head:hover{
  background: rgba(252, 202, 143, 0.6);

}
.fa-search{
  /* top: 5px; */
   color: rgba(0, 0, 0, 0.4) !important;
  top:50px;
  left:34px;
  position: absolute;
}
::placeholder,input{
  color: rgba(0, 0, 0, 0.4) !important;
}

.nav-link {
    width: 80px !important;
}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color:var(--primary) !important;
    background-color: white !important;
}
.dropbtn{
    position: absolute;
    right: 2px;
    top: 23px;
}
@media only screen and (max-width: 600px) and (max-width: 768px)  {
  .leftwing{
    padding:0px 2px !important;
    border:none !important;
  }
  .rightwing{
    padding:0px 2px !important;
    border:none !important;

  }
  .centerwing{
    padding:20px 2px !important;
  }

  .fa-search{
    top:10px !important;
  }
  .myinputbox{
   border-right:0px solid rgb(214, 211, 211) !important;
}
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
   margin-top:50px;
   padding-top:20px;
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
