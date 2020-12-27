<template>
    <div>
            <div class="row pt-5">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add about</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
      
                 <form role="form" @submit.prevent="addAbout()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="about">about</label>
                                          <textarea class="form-control"  v-model="form.about_us"
                            :class="{ 'is-invalid': form.errors.has('about_us') }"></textarea>
                  </div>
                  
                </div>


                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            <!-- /.card -->
    </div>
</template>

<script>
 export default {
     name:"Create",
     data(){
         return{
             form : new Form({
                 about_us:'',
             })

         }
     },
     methods:{
     addAbout(){
         this.form.post('/add-about')
         .then((response)=>{
            this.$router.push('/admin/about-list');
            toast.fire({
            icon: 'success',
            title: 'about inserted successfully'
            })

         })
         .catch(()=>{

         })
     }
     }
 }
</script>