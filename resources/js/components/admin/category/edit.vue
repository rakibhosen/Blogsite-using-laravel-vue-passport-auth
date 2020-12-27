<template>
    <div>
            <div class="row pt-5">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="updateCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input type="text" class="form-control" 
                    id="exampleInputEmail1" placeholder="Enter email" v-model="form.cat_name"
                   :class="{ 'is-invalid': form.errors.has('cat_name') }">
                     <has-error :form="form" field="cat_name"></has-error>
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
     mounted(){
         axios.get(`/editcategory/${this.$route.params.categoryid}`)
         .then((response)=>{
             this.form.fill(response.data.category);
         })
     },
     data(){
         return{
             form : new Form({
                 cat_name:'',
             })

         }
     },
     methods:{
  updateCategory(){
    this.form.post(`/editcategory/${this.$route.params.categoryid}`)
                   .then((response)=>{
                        this.$router.push('/category-list')

            toast.fire({
            icon: 'success',
            title: 'Category inserted successfully'
            })

                    })
  }
     }
 }
</script>