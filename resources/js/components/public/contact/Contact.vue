
<template>
   <div>
  <div class="site-content section-padding inner-padding">
    <div class="post-content" >
<h2 style="text-align:center">Get in touch with us by filling <strong>contact form below</strong></h2>
          <div class="contactForm">
            <!-- general form elements -->
            

               <form role="form" enctype="multipart/form-data" @submit.prevent=" userMessage()">
  <div class="formpadding">

    <hr>
        
    <input type="text" placeholder="Enter title" name="name" v-model="form.name"
    :class="{ 'is-invalid': form.errors.has('name') }">
    <has-error :form="form" field="name"></has-error>

    
    <input type="text" placeholder="Enter email" name="email" v-model="form.email"
    :class="{ 'is-invalid': form.errors.has('email') }">
    <has-error :form="form" field="email"></has-error>

   
    <input type="text" placeholder="Enter subject" name="name" v-model="form.subject"
    :class="{ 'is-invalid': form.errors.has('name') }">
    <has-error :form="form" field="name"></has-error>

         
                  <textarea style="width:100%;"  v-model="form.message" rows="12" data-rule="required"  
                  placeholder="Message" :class="{ 'is-invalid': form.errors.has('message') }" ></textarea>
                     <has-error :form="form" field="message"></has-error>





    


    <button type="submit" class="registerbtn">Submit</button>
  </div>


</form>
              
     </div>

    </div>


    <BlogSidebar/>

 
  </div>
 
   </div>
</template>

<script>
 import BlogSidebar from "../blog/BlogSidebar"
export default {
    name:"Contact",
    data(){
        return{
            form:new Form({
                name:'',
                email:'',
                subject:'',
                message:'',
            })
        }
    },
        components:{
          BlogSidebar,
        },

    methods:{
            userMessage(){
                this.form.post('/userMessage')
                    .then((response)=>{
                        
              this.form.name='',
               this.form.email='',
                this.form.subject='',
                this.form.message='',
                      toast.fire({
            icon: 'success',
            title: 'Message sent '
            })

       
                    })
                    .catch(()=>{

                    })
            }
    }

}
</script>

<style scoped>
</style>



