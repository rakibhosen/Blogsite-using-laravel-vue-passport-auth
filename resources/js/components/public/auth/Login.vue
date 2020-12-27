<template>
    <div>
       
          <!-- left column -->
          <div class="registerForm">
            <!-- general form elements -->
            

               <form role="form" @submit.prevent="LoginUser()">
  <div class="formpadding">
    <h2 style="text-align:center">User Login</h2>

    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" v-model="form.email"
    :class="{ 'is-invalid': form.errors.has('email') }">
    <has-error :form="form" field="email"></has-error>

    <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter password" name="password" v-model="form.password"
    :class="{ 'is-invalid': form.errors.has('password') }">
    <has-error :form="form" field="password"></has-error>
    {{ this.form.error }}



    
    <hr>

    <button type="submit" class="registerbtn">Login</button>
  </div>

  <div class="formpadding signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
              
     </div>
    </div>
</template>

<script>
 export default {
     name:"Login",
     data(){
         return{
             form : new Form({
            
                 email:'',
                 password:'',
                 error:''
                 
             })

         }
     },


     methods:{
        LoginUser(){
         this.form.post('/userloggin')
         .then((response)=>{

           if(!response.data.success==true){
              this.form.error = 'Please provice valid email and password'
           }else{
           console.log(response.data)
            this.$router.push('/userprofile');
            toast.fire({
            icon: 'success',
            title: 'login success'
            })
           }


         })
         .catch(()=>{

         })
     }
     },
     watch:{
$route(to,from){
this.$router.push('/userprofile');
 }
}
 }
</script>

<style scoped>


/* @import'~bootstrap/dist/css/bootstrap.css' */
</style>