<template>
    <div>
            <div class="row pt-5">
          <!-- left column -->
          <div class="col-md-10 offset-md-1">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
         <form role="form" enctype="multipart/form-data" @submit.prevent="updatePost()">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                          <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" 
                        id="exampleInputEmail1" placeholder="Enter title" v-model="form.title"
                      :class="{ 'is-invalid': form.errors.has('title') }">
                        <has-error :form="form" field="cat_name"></has-error>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Category</label>
                          <select class="form-control" :class="{'is-invalid':form.errors.has('cat_id')}" v-model="form.cat_id">

              <option disabled value="">Select One</option>
              <option :value="category.id" v-for="category in getallCategory"> {{category.cat_name}}</option>
    
                          </select>
                         
                      </div>
                    </div>
                  </div>

                    <div class="row">

                      
                    <div class="col-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea class="form-control"  v-model="form.description"
                            :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                          <has-error :form="form" field="description"></has-error>
                      </div>
                    </div>


                          <div class="col-6">
                                <div class="form-group">
                              <label for="exampleInputEmail1">Image</label>
                                <input @change = "changePhoto($event)" name="photo" type="file" :class="{ 'is-invalid': form.errors.has('photo') }">
                                    <img :src="form.photo" alt="" width="80" height="80">
                                    <has-error :form="form" field="photo"></has-error>
                            </div>
                          </div>
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
     name:"Edit",
          data(){
         return{
             form : new Form({
                 title:'',
                 description:'',
                 photo:'photo.png',
                 cat_id:'',
                 
             })

         }
     },
     mounted(){
        this.$store.dispatch("allCategory")
         axios.get(`/editpost/${this.$route.params.postid}`)
         .then((response)=>{
             this.form.fill(response.data.post);
         })
     },

        computed:{
            getallCategory(){
                return this.$store.getters.getCategory
            }
        },
     methods:{
                          changePhoto(event){
                let file = event.target.files[0];

                 if(file.size>2048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.photo = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }

            },
  updatePost(){
    this.form.post(`/editpost/${this.$route.params.postid}`)
                   .then((response)=>{
                        this.$router.push('/admin/post-list')

            toast.fire({
            icon: 'success',
            title: 'Post updated successfully'
            })

                    })
  }

     }
 }
</script>

<style scoped>

</style>