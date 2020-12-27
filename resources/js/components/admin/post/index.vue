<template>
    <div>
            <section class="content pt-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="card-header">
                  <p class="text-right">
                <router-link to="/admin/post-create" class="btn btn-primary">
                <span>Add post</span>
                </router-link>
                  </p>
   
            </div>
              
              
 
        
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th width="10%">Sl No</th>
                    <th width="10%">user</th>
                      <th width="10%">Category</th>
                      <th width="20%">Tilte</th>
                      <th width="20%">Description</th>
                      <th width="10%">Photo</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
               <tr v-for="(post, index) in getallPost.data" :key="post.id">
                     <td>{{ index+1 }}</td>
                   <td v-if="post.admin">{{post.admin.name}}</td>
                     <td v-if="post.category">{{post.category.cat_name}}</td>
                    <td>{{ post.title |sortlength(15,"...")}}</td>
                         <!-- <td v-html=post.description></td> -->
                         
                    <td>{{ post.description |sortlength(25,"...") }}</td>
                    <td> <img :src="'/uploadImage/'+post.photo" class="img" alt="Blog photo" width="40" height="50"></td>
                    <td>
                  
<router-link :to="`/admin/post-edit/${post.id}`" class="btn btn-info color-white">Edit</router-link>
<button class="btn btn-danger" @click.prevent= "deletePost(post.id)">Delete</button>

                         
                    </td>
                  </tr>
                  </tbody>
              </table>
<el-pagination       
    background
    @current-change="handleCurrentChange"
    :current-page.sync="currentPage"
    :page-size="getallPost.per_page"
    layout="prev, pager, next"
    :total="getallPost.total">
</el-pagination>
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
            data(){
          return{
            currentPage:1,
          }
        },
  mounted(){
     this.$store.dispatch("allPost",this.currentPage);
  },
  computed:{

    getallPost(){
     return this.$store.getters.getPost;
    }
  },
  methods:{
                handleCurrentChange(){
 this.$store.dispatch('allPost',this.currentPage);
},
     ourImage(img){
                return "uploadimage/"+img;
            },

deletePost(id){
  axios.get('/post/'+id)
     .then((response)=>{
       this.$store.dispatch("allPost")
       toast.fire({
         icon:'success',
         title:'Post deleted successfully'
       })
     })
}
  }
}
</script>

<style scoped>

</style>