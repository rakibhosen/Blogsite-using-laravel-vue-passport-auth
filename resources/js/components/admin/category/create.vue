<template>
    <div>
            <div class="row pt-5">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
      
                 <form role="form" @submit.prevent="addCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" 
                    id="category" placeholder="Category name" v-model="form.cat_name"
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
     name:"Create",
     data(){
         return{
             form : new Form({
                 cat_name:'',
             })

         }
     },
     methods:{
     addCategory(){
         this.form.post('/add-category')
         .then((response)=>{
            this.$router.push('/admin/category-list');
            toast.fire({
            icon: 'success',
            title: 'Category inserted successfully'
            })

         })
         .catch(()=>{

         })
     }
     }
 }
</script>