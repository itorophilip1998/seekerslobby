<template>
  <div>
   <mainHeader  v-if="callLinks()" />
    <Nuxt />
    <back-to-top bottom="180px" right="5px">
  <button type="button" class="btn btn-primary rounded-x px-3 py-2  btn-to-top"><i class="fa fa-chevron-up"></i></button>
</back-to-top>


  <mainFooter v-if="$route.path=='/'" />
  </div>
</template>

<script>
import mainHeader from './header'
import mainFooter from './footer'
export default {
  components:{
    mainHeader,
    mainFooter,
  },
  methods: {
    callLinks()
    {
      if(
        this.$route.path=="/employer/profile"
       || this.$route.path=="/signup" ||
        this.$route.path=="/forgot-password"
       || this.$route.path=="/signup" ||
        this.$route.path=="/signin"
       || this.$route.path=="/signup" ||
        this.$route.path=="/terms"){
         return false
      }else{
        return true
      }
    }
  },

}
</script>
