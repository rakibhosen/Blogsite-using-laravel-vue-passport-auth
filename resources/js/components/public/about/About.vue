<template>
    <div>


    <!-- end header -->
    <section class="about section-padding inner-padding">
<h2 style="text-align:center;font-size:35px;text-transform:uppercase">About Us</h2>
<p v-for="(about, index) in AboutUs" :key="about.id" >
{{ about.about_us }}
</p>

    </section>


  </div>



</template>

<script>
import 'bootstrap'
export default {
    name:"About",

      mounted(){
     this.$store.dispatch('AboutUs');
  },


computed:{
  AboutUs(){
  return this.$store.getters.AboutUs
  },

},
}
</script>
<style scoped>

</style>