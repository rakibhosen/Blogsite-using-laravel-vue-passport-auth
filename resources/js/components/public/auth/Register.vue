<template>
    <div>
       
          <!-- left column -->
          <div class="registerForm">
            <!-- general form elements -->
            

               <form role="form" enctype="multipart/form-data" @submit.prevent="RegisterUser()">
  <div class="formpadding">
    <h2 style="text-align:center">User Registration</h2>

    <hr>
        <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter title" name="name" v-model="form.name"
    :class="{ 'is-invalid': form.errors.has('name') }">
    <has-error :form="form" field="name"></has-error>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" v-model="form.email"
    :class="{ 'is-invalid': form.errors.has('email') }">
    <has-error :form="form" field="email"></has-error>

    <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter password" name="password" v-model="form.password"
    :class="{ 'is-invalid': form.errors.has('password') }">
    <has-error :form="form" field="password"></has-error>



    
    <hr>

    <button type="submit" class="registerbtn">Register</button>
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
     name:"Register",
     data(){
         return{
             form : new Form({
                 name:'',
                 email:'',
                 password:'',
                 
             })

         }
     },


     methods:{
         RegisterUser(){
         this.form.post('/registerUser')
         .then((response)=>{
            this.$router.push('/userLogin');
            toast.fire({
            icon: 'success',
            title: 'Registration Completed'
            })

         })
         .catch(()=>{

         })
     }
     }
 }
</script>

<style scoped>


/* @import'~bootstrap/dist/css/bootstrap.css' */
</style>