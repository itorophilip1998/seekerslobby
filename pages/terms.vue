<template>
  <div class="terms py-3"> 
    <terms></terms>
  </div>
</template>

<script> 
import Password from 'vue-password-strength-meter'
import terms from '@/components/terms.vue'
export default {
  components:{
        Password,
        terms
    },
    auth:'guest',
  data() {
    return {
      passwordCheckData:false,
    }
  },
 methods: {
   passwordCheck(data){
             if (data=="show") {
                 this.passwordCheckData=!this.passwordCheckData;
                 this.$refs.password.type="text"
             }
             else{
                this.passwordCheckData=!this.passwordCheckData;
                this.$refs.password.type="password"
             }
        }
 }
} 
</script>

<style scoped>
/* .bgtxt{
  font-size:13px
} */
  .googlelogo{
    width:23px;
  }
  .rounded-4{
    border: 1px solid rgba(0, 0, 0, 0.65);
    border-radius: 4px;
  }
  div>hr{
    border: 1px solid rgba(0, 0, 0, 0.2);
  }
  i.fa{
    position:absolute;
  /* margin-top: -30px; */
    right: 36px;
  }
  a:focus,a:hover{
   color:var(--primary) !important;
   /* background:var(--primary) !important; */

 }
.terms{
  background: rgba(92, 72, 50, 0.6);
   /* margin-top: -30px; */
  /* z-index: 0 !important; */

}



</style>