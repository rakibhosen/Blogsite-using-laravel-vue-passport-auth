<template>
    <div>
            <section class="content pt-5">
      <div class="row">
        <div class="col-8 offset-2">
          <div class="card">
                <div class="card-header">
                  <p class="text-right">
                <router-link to="/admin/category-create" class="btn btn-primary">
                <span>Add Category</span>
                </router-link>
                  </p>
   
            </div>
              
              
 
        
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Name</th>
                    <th>date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="(category,index) in getallCategory" :key="category.id">
                    <td>{{ index+1 }}</td>
                    <td>{{category.cat_name}}</td>
                       <td>{{category.created_at | timeFormat }}</td>
                    <td>
                     <router-link :to="`/admin/category-edit/${category.id}`" class="btn btn-info">Edit</router-link>
                       <button class="btn btn-danger" @click.prevent="deleteCategory(category.id)">Delete</button>
                    </td>
                  </tr>
                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
          </div>

        </section>

    </div>
</template>

<script>
export default {
  name:"List",
  mounted(){
     this.$store.dispatch("allCategory");
  },
  computed:{

    getallCategory(){
     return this.$store.getters.getCategory;
    }
  },
  methods:{

deleteCategory(id){
  axios.get('/category/'+id)
      .then((response)=>{
   this.$store.dispatch("allCategory")
           toast.fire({
            icon: 'success',
            title: 'Category deleted successfully'
            })
      });
}
  }
}
</script>