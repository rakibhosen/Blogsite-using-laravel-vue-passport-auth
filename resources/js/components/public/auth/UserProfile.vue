<template>
    <div>

        <div class="flex-container">
  <div>
 <!-- <div class="card" v-if="AuthUser">
<img :src="`https://www.seekpng.com/png/detail/73-730482_existing-user-default-avatar.png`" height="200px" width="300px">
  <h1 >{{AuthUser.name}}</h1>
  <p class="title">{{AuthUser.Email}}</p>



</div> -->

<div class="cardd" v-if="AuthUser">
  <img :src="`https://www.seekpng.com/png/detail/73-730482_existing-user-default-avatar.png`" width="100%">
  <div class="container_card">
    <h4><b>{{AuthUser.name}}</b></h4>
    <p>{{AuthUser.email}}</p>
  </div>
</div>
             <div class="card" v-else>
   <p>Please Login First
      <router-link to="/userLogin" style="color:red">Login</router-link>
   </p>



</div>
  </div>


</div>

    </div>
</template>

<script>
 export default {
    name:"UserProfile",

      mounted(){
      this.$store.dispatch('AuthUser');
  },

  computed:{
    AuthUser(){
    return this.$store.getters.AuthUser
    },
  }, 



 }
 
</script>

<style scoped>

</style>